# linuxTema — Tema Analiz Raporu

Tarih: 2026-08-10

## 1. Genel Bilgi

- **Tema Adı:** linuxTema
- **Versiyon:** 0.4
- **Açıklama:** LKD web takımı tarafından linux.org.tr için yapılmış tema
- **Lisans:** GPLv3
- **Yazarlar:** Gökmen Görgen, Umuthan Uyan, Mehmet Nedim Şahin

## 2. Dizin Yapısı

```
├── css/                 (main.css, menu.css, blocks.css, editor.css, comments.css, news.css, rtl.css)
├── javascript/          (buttons.js, menu.js, jquery-1.4.2.min.js)
├── images/
├── cache/
├── style.css            (tema header)
├── functions.php        (ana tema fonksiyonları)
├── header.php / footer.php
├── index.php / single.php / page.php / archive.php / search.php / 404.php
├── comments.php / comments-popup.php
├── menu.php / news_menu.php
├── sidebar.php / bottom_area.php
├── news.php / news_inc.php / image.php / links.php / archives.php
└── simplepie.class.php   (RSS parser kütüphanesi)
```

Template-parts klasörü yok; parçalar doğrudan `include`/`get_template_part` benzeri include ile çağrılıyor.

## 3. functions.php Özeti

- `add_theme_support`: title-tag, html5, automatic-feed-links, align-wide, wp-block-styles,
  responsive-embeds, editor-styles, menus
- `wp_enqueue_scripts` ile jQuery, `javascript/buttons.js`, `css/blocks.css` yükleniyor
- İki widget alanı: `sidebar-1` (ana sayfa), `sidebar-2` (footer)
- İki menü konumu: `menu` (TR), `menu_en` (EN)
- Customizer, ACF entegrasyonu yok

## 4. Template Dosyaları

| Dosya | Not |
|---|---|
| header.php | Logo, Revive Adserver banner (iframe), favicon, menu include |
| footer.php | Firefox/WordPress logo, GPL linki, Quotes Collection eklentisi (esc_html kullanılmış) |
| index.php | Anasayfa: info kutusu + nav butonları + post listesi, excerpt ayarına saygılı |
| single.php | Tekil yazı, news_menu include |
| page.php | Basit sayfa şablonu |
| archive.php | Kategori/etiket/yazar/tarih arşivleri, dinamik başlık |
| search.php | Arama sonuçları, eski yapı |
| 404.php | Basit hata sayfası |

## 5. CSS/JS Mimarisi

- Build sistemi yok (SASS/Webpack/Gulp yok), doğrudan CSS/JS dosyaları
- `css/main.css`: CSS variables, flexbox layout, responsive
- `css/menu.css`: mobil menü düzeltmeleri (flex-wrap, dropdown position)
- `css/blocks.css`, `css/editor.css`: Gutenberg desteği
- `javascript/jquery-1.4.2.min.js`: 2012 tarihli, kullanılmıyor (WP jQuery yükleniyor), gereksiz

## 6. Son Commit Geçmişi (özet)

- fix: mobil menü ve banner düzeltmeleri
- Constrain images on single content pages
- Separate homepage post listings
- Respect excerpt setting on homepage
- Respect WordPress homepage post count
- Restore dropdown menus and enlarge navigation
- feat: Gutenberg blok desteği ekle
- modernize: HTML5, CSS variables, flexbox, wp_enqueue_scripts

## 7. Kritik Sorunlar

1. **Email header injection (`bottom_area.php`)** — `$_POST['email']` doğrudan `mail()` header'ına
   yazılıyor, nonce/CSRF koruması ve `sanitize_email()` kullanımı yok.
2. **Deprecated WordPress fonksiyonları:**
   - `query_posts()` → `news.php` (yerine `WP_Query`)
   - `get_userdatabylogin()` → `archive.php` (yerine `get_user_by()`)
   - `attribute_escape()` → `news_menu.php` (yerine `esc_attr()`)
3. **Sanitize edilmeyen input:** `$_GET['paged']` (archive.php), `$_SERVER` değerleri (news.php `curPageURL()`)
4. **Gereksiz eski dosya:** `javascript/jquery-1.4.2.min.js` (kullanılmıyor)
5. **i18n eksik:** Metinler hardcoded Türkçe, `.pot` dosyası yok

## 8. Diğer Gözlemler

- Genel olarak `esc_html`, `get_option`, `bloginfo`, `wp_nav_menu`, `dynamic_sidebar` gibi güvenli
  WP API'leri doğru kullanılmış.
- Accessibility: dropdown menüler `:focus-within` kullanıyor (eski tarayıcı desteği yok),
  bazı butonlar `<a>` etiketiyle yapılmış.
- Performans: CSS variables + flexbox modern ve hafif; `simplepie.class.php` (~380KB) tema
  içinde gömülü.

## 9. Yapılan Düzeltmeler

- **Email header injection (`bottom_area.php`)** — nonce (`wp_verify_nonce`) ve
  `sanitize_email()`/`is_email()` kontrolü eklendi. *(önceki oturumda giderilmiş)*
- **Deprecated fonksiyonlar** — `query_posts()` → `news.php`'de `WP_Query`'ye,
  `get_userdatabylogin()` → `archive.php`'de `get_user_by()`'a,
  `attribute_escape()` → `news_menu.php`'de `esc_attr()`'e çevrildi. *(önceki oturumda giderilmiş)*
- **`news_inc.php`**: kalan `query_posts()` çağrısı da ayrı bir `WP_Query` nesnesine
  çevrildi (global sorguyu bozmasın diye), `wp_reset_postdata()` eklendi.
- **`wp_footer()` hiç çağrılmıyordu** — `footer.php` içine eklendi. Bunun sonucu
  `wp_enqueue_script('linux-buttons', ..., true)` ile footer'a kaydedilen
  `javascript/buttons.js` hiçbir sayfada gerçekte basılmıyordu (buton hover efekti
  çalışmıyordu). Ayrıca admin bar ve `wp_footer` kancasına bağlanan eklentiler de
  etkileniyordu.
- **Kapanmayan `<body>`/`<html>` etiketleri** — `footer.php` bu etiketleri hiç
  kapatmıyordu; sadece `index.php` elle `</body></html>` ekliyordu, diğer tüm
  şablonlarda (`single.php`, `page.php`, `archive.php`, `search.php`, `404.php`,
  `news.php`) sayfa hiç kapanmıyordu. Kapanış artık merkezi olarak `footer.php`'de;
  `index.php`'deki elle eklenmiş tekrar kaldırıldı.
- **`index.php`**: prodüksiyonda unutulmuş `ini_set('error_reporting', E_ALL);`
  hata ayıklama satırı kaldırıldı (görüntüleme açıksa ziyaretçilere PHP
  uyarı/deprecation mesajı sızdırabilirdi).
- **`comments.php`**: parola korumalı yazı kontrolü elle `$_COOKIE[...]`
  karşılaştırması yapıyordu (çerez yoksa PHP "undefined array key" uyarısı
  veriyordu) → çekirdek `post_password_required()` ile değiştirildi. Yorum
  formundaki `$comment_author`, `$comment_author_email`, `$comment_author_url`,
  `$user_identity`, `$id` değerleri escape edilmeden basılıyordu → `esc_attr()`/
  `esc_html()` eklendi.
- **`comments-popup.php`**: aynı escape eksiklikleri giderildi; deprecated
  `attribute_escape($_SERVER['REQUEST_URI'])` → `esc_url( wp_unslash( $_SERVER['REQUEST_URI'] ) )`.
- **`search.php`**: sayfa `#orta`, `#sag`, `.temizle` gibi `css/main.css`'de hiç
  karşılığı olmayan id/class'lar kullanıyordu; bu yüzden arama sonuçları sayfası
  temada tamamen stilsiz/bozuk görünüyordu. Sayfa, sitenin geri kalanıyla aynı
  `#page` / `.wrapper` / `#content` / `#navigation` yapısına çevrildi.
- **`links.php`**: sayfada görünen başıboş "dadada" test metni kaldırıldı.
- **`javascript/menu.js`**: hiçbir yerde enqueue edilmiyordu ve mevcut
  `:focus-within` tabanlı CSS dropdown menüsünün yerini almış eski, sadece
  hover'a dayalı jQuery kodu — `jquery-1.4.2.min.js` ile aynı gerekçeyle
  kaldırıldı.

### Kalan / bilinçli olarak dokunulmayan noktalar

- `simplepie.class.php` üçüncü parti bir kütüphane (~380KB); içindeki
  `$_GET`/`$_SERVER` kullanımı ve PHP 8.4 "deprecated optional parametre"
  uyarısı kütüphanenin kendi koduna ait, tema tarafından üretilmedi.
- `archives.php` ve `links.php` dosyalarında `Template Name:` başlığı yok,
  dolayısıyla WP admin'de bir sayfaya şablon olarak atanamıyorlar; `links.php`
  ayrıca çekirdekten kaldırılmış Bağlantı Yöneticisi'ne (`wp_list_bookmarks()`)
  bağımlı. İkisi de şu an fiilen erişilemez durumda; bu bir tasarım/kapsam kararı
  gerektirdiğinden dokunulmadı.
- i18n (metinlerin `.pot` ile çevrilebilir hale getirilmesi) kapsamlı bir iş
  olduğundan bu geçişte ele alınmadı.
