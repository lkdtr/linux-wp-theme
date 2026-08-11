# linuxTema

[linux.org.tr](http://www.linux.org.tr) için Linux Kullanıcıları Derneği (LKD) web takımı
tarafından hazırlanmış WordPress temasıdır.

## Gereksinimler

- WordPress 5.0+ (Gutenberg blok desteği, `wp_nav_menu`, `dynamic_sidebar`)
- PHP 7.4+ (PHP 8.x ile test edilmiştir)

## Kurulum

1. Bu klasörü `wp-content/themes/` altına kopyalayın (veya `git clone` edin).
2. WordPress admin panelinden **Görünüm → Temalar** üzerinden temayı etkinleştirin.
3. **Görünüm → Menüler** üzerinden `menu` (Türkçe) ve `menu_en` (İngilizce) konumlarına
   birer menü atayın.
4. **Görünüm → Widget'lar** üzerinden `Footer Area` widget alanına istediğiniz widget'ları
   ekleyin (`Sidebar Area 1` şu an hiçbir şablonda kullanılmıyor).

## Özellikler

- HTML5 şablon desteği, responsive/flexbox tabanlı CSS (`css/main.css`), CSS variables
- Gutenberg blok desteği (`css/blocks.css`, `css/editor.css`)
- İki menü konumu: `menu` (TR), `menu_en` (EN) — bkz. `menu.php`
- İki widget alanı: `sidebar-1`, `sidebar-2` (footer, `bottom_area.php` üzerinden)
- Anasayfa yazı listesinde küçük (120×120) öne çıkan görsel (`post-thumbnails`)
- Duyuru listesi kayıt formu ve Google özel arama kutusu (`bottom_area.php`)
- Haberler için özel şablon (`news.php`, `Template Name: News`) ve arşiv/bağlantılar
  şablonları (`archives.php`, `links.php`)
- Çoklu dil desteği (i18n): tüm metinler `linux-wp-theme` text domain'i ile
  çevrilebilir durumda, `languages/linux-wp-theme.pot` şablonu mevcut

### Opsiyonel eklenti bağımlılığı

`news.php` içindeki haber özetleri, aktifse
[Content And Excerpt Word Limit](https://wordpress.org/extend/plugins/content-and-excerpt-word-limit/)
eklentisinin sağladığı `excerpt()` fonksiyonunu kullanır; eklenti aktif değilse
WordPress çekirdeğinin `wp_trim_words()` fonksiyonuna otomatik olarak düşer.

## Dizin Yapısı

```
├── css/                 Ana stil dosyaları (main.css, menu.css, blocks.css, ...)
├── javascript/          buttons.js (anasayfa buton hover efekti)
├── images/               Görseller
├── languages/            linux-wp-theme.pot (çeviri şablonu)
├── style.css              Tema başlığı + ana CSS import'ları
├── functions.php          Tema kurulumu (menüler, widget alanları, enqueue)
├── header.php / footer.php
├── index.php / single.php / page.php / archive.php / search.php / 404.php
├── comments.php / comments-popup.php
├── menu.php / news_menu.php
├── sidebar.php / bottom_area.php
└── news.php / image.php / links.php / archives.php
```

Şablon dosyalarının ayrıntılı açıklaması ve teknik analiz için
[THEME-ANALYSIS.md](THEME-ANALYSIS.md)'ye bakınız.

## Katkı

Tema ve PHP altyapısı LKD üyelerince hazırlanmıştır. İyileştirme veya hata bildirimi
için lütfen [uye.lkd.org.tr](http://uye.lkd.org.tr) üzerinden hata kaydı açınız,
ya da doğrudan bir pull request gönderin.

## Lisans

GPLv3

## Katkıda Bulunanlar

- Gökmen Görgen — gokmen.gorgen@linux.org.tr
- Umuthan Uyan — umuthan.uyan@linux.org.tr
- Mehmet Nedim Şahin — nedim.sahin@linux.org.tr
