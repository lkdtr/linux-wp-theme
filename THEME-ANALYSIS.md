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

Bu bölüm, kritik sorunlar çözüldükçe güncellenecektir.
