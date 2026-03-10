const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = Number(process.env.PORT || 4173);
const HOST = '0.0.0.0';
const IG_ACCESS_TOKEN = process.env.IG_ACCESS_TOKEN;
const IG_LIMIT = Number(process.env.IG_LIMIT || 12);

const MIME_TYPES = {
  '.html': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'application/javascript; charset=utf-8',
  '.json': 'application/json; charset=utf-8',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.webp': 'image/webp',
  '.svg': 'image/svg+xml'
};

let cache = {
  data: null,
  fetchedAt: 0
};

async function getInstagramMedia() {
  const now = Date.now();
  const cacheMs = Number(process.env.IG_CACHE_MS || 5 * 60 * 1000);
  if (cache.data && now - cache.fetchedAt < cacheMs) {
    return cache.data;
  }

  if (!IG_ACCESS_TOKEN) {
    throw new Error('IG_ACCESS_TOKEN env değişkeni eksik.');
  }

  const params = new URLSearchParams({
    fields: 'id,caption,media_type,media_url,thumbnail_url,permalink,timestamp',
    limit: String(IG_LIMIT),
    access_token: IG_ACCESS_TOKEN
  });

  const url = `https://graph.instagram.com/me/media?${params.toString()}`;
  const response = await fetch(url);
  if (!response.ok) {
    const details = await response.text();
    throw new Error(`Instagram API hatası (${response.status}): ${details}`);
  }

  const data = await response.json();
  cache = { data, fetchedAt: now };
  return data;
}

function sendJson(res, code, payload) {
  res.writeHead(code, { 'Content-Type': 'application/json; charset=utf-8' });
  res.end(JSON.stringify(payload));
}

function serveStaticFile(req, res) {
  const reqPath = req.url === '/' ? '/index.html' : req.url;
  const safePath = path.normalize(reqPath).replace(/^\/+/, '');
  const filePath = path.join(process.cwd(), safePath);

  if (!filePath.startsWith(process.cwd())) {
    res.writeHead(403);
    res.end('Forbidden');
    return;
  }

  fs.readFile(filePath, (err, content) => {
    if (err) {
      res.writeHead(404);
      res.end('Not Found');
      return;
    }

    const ext = path.extname(filePath).toLowerCase();
    res.writeHead(200, { 'Content-Type': MIME_TYPES[ext] || 'application/octet-stream' });
    res.end(content);
  });
}

const server = http.createServer(async (req, res) => {
  if (req.url === '/api/instagram-media') {
    try {
      const data = await getInstagramMedia();
      return sendJson(res, 200, data);
    } catch (error) {
      return sendJson(res, 502, {
        error: 'Instagram akışı alınamadı.',
        details: error.message
      });
    }
  }

  return serveStaticFile(req, res);
});

server.listen(PORT, HOST, () => {
  console.log(`FM Marina server running at http://${HOST}:${PORT}`);
});
