# FM Marina Website

Bu sürümde Instagram işletme profilindeki içerikler otomatik olarak **Instagram Graph API** üzerinden çekilir.

## Kurulum

1. Meta/Instagram tarafında `instagram_basic` izni olan long-lived token alın.
2. Ortam değişkenini tanımlayın:

```bash
export IG_ACCESS_TOKEN='YOUR_LONG_LIVED_TOKEN'
```

İsteğe bağlı:

- `IG_LIMIT` (varsayılan: `12`)
- `IG_CACHE_MS` (varsayılan: `300000`)
- `PORT` (varsayılan: `4173`)

3. Sunucuyu başlatın:

```bash
npm start
```

4. Siteyi açın: `http://localhost:4173`

## API

- `GET /api/instagram-media`
  - Instagram Graph API'den medya listesini alır.
  - Yanıt formatı: `{ data: [...] }`

> Not: Token yoksa endpoint 502 döner ve sayfada kullanıcıya hata durumu gösterilir.
