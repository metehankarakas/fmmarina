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


## GitHub'a yüklerken hata alırsanız

En yaygın sebep: `.env` dosyasındaki gerçek `IG_ACCESS_TOKEN` değerinin yanlışlıkla commit edilmesi.
GitHub secret scanning bunu bloklayabilir.

Bu repo artık `.env*` dosyalarını `.gitignore` ile dışarıda bırakır (`.env.example` hariç).

### Güvenli akış

1. Sadece örnek dosyayı kopyalayın:

```bash
cp .env.example .env
```

2. Gerçek token'ı sadece local `.env` içinde tutun (commit etmeyin).

3. Eğer daha önce token commit ettiyseniz:
   - dosyadan silmek yetmez, git geçmişinden de temizlemek gerekir
   - token'ı Meta tarafında mutlaka yenileyin (revoke/rotate)

### Hızlı kontrol

```bash
git status
git check-ignore -v .env
```

`.env` dosyası ignore ediliyorsa GitHub'a push sırasında secret kaynaklı hata alma olasılığı ciddi düşer.
