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
├── javascript/          (buttons.js)
├── images/
├── languages/           (linux-wp-theme.pot)
├── style.css            (tema header)
├── functions.php        (ana tema fonksiyonları)
├── header.php / footer.php
├── index.php / single.php / page.php / archive.php / search.php / 404.php
├── comments.php / comments-popup.php
├── menu.php / news_menu.php
├── sidebar.php / bottom_area.php
└── news.php / image.php / links.php / archives.php
```

Template-parts klasörü yok; parçalar doğrudan `include`/`get_template_part` benzeri include ile çağrılıyor.

## 3. functions.php Özeti

- `add_theme_support`: title-tag, html5, automatic-feed-links, align-wide, wp-block-styles,
  responsive-embeds, editor-styles, menus, post-thumbnails (120×120, `linux-entry-thumb`)
- `wp_enqueue_scripts` ile jQuery, `javascript/buttons.js`, `css/blocks.css` yükleniyor
- İki widget alanı: `sidebar-1` (şu an hiçbir şablonda gösterilmiyor), `sidebar-2` (footer,
  `bottom_area.php` üzerinden)
- İki menü konumu: `menu` (TR), `menu_en` (EN)
- `load_theme_textdomain( 'linux-wp-theme', .../languages )`; `style.css`'de `Text Domain`/
  `Domain Path` başlıkları tanımlı
- `links.php`'nin kullandığı `wp_list_bookmarks()` çalışabilsin diye
  `pre_option_link_manager_enabled` filtresiyle Bağlantı Yöneticisi yeniden etkinleştirilmiş
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
| search.php | Arama sonuçları |
| 404.php | Basit hata sayfası |
| archives.php | `Template Name: Arşivler` — aylık/kategori arşiv listesi (sayfa şablonu olarak atanabilir) |
| links.php | `Template Name: Bağlantılar` — `wp_list_bookmarks()` (sayfa şablonu olarak atanabilir) |

## 5. CSS/JS Mimarisi

- Build sistemi yok (SASS/Webpack/Gulp yok), doğrudan CSS/JS dosyaları
- `css/main.css`: CSS variables, flexbox layout, responsive
- `css/menu.css`: mobil menü düzeltmeleri (flex-wrap, dropdown position)
- `css/blocks.css`, `css/editor.css`: Gutenberg desteği

## 6. Son Commit Geçmişi (özet)

- fix: mobil menü ve banner düzeltmeleri
- Constrain images on single content pages
- Separate homepage post listings
- Respect excerpt setting on homepage
- Respect WordPress homepage post count
- Restore dropdown menus and enlarge navigation
- feat: Gutenberg blok desteği ekle
- modernize: HTML5, CSS variables, flexbox, wp_enqueue_scripts

## 7. Diğer Gözlemler

- Genel olarak `esc_html`, `esc_attr`, `esc_url`, `get_option`, `bloginfo`, `wp_nav_menu`,
  `dynamic_sidebar` gibi güvenli WP API'leri doğru kullanılıyor.
- Tüm kullanıcıya görünür metinler `linux-wp-theme` text domain'i ile `__()`/`_e()`/
  `esc_html__()`/`esc_attr__()` üzerinden geçiriliyor; `languages/linux-wp-theme.pot` şablonu
  mevcut.
- Accessibility: dropdown menüler `:focus-within` kullanıyor (eski tarayıcı desteği yok),
  bazı butonlar `<a>` etiketiyle yapılmış.
- Performans: CSS variables + flexbox modern ve hafif.
