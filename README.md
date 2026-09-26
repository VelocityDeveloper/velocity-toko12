Velocity Child Theme Paket Toko Online Toko 12
=================
[toko12.velocitydeveloper.com](https://toko12.velocitydeveloper.com/)

Child Theme for the Velocity System WordPress theme.

### Required
Theme Velocity versi 2.7.0 keatas, [Download](https://github.com/VelocityDeveloper/velocity/releases)

### Required Plugins
**VD Store**, [Download](https://github.com/Velocity-Developer/vd-store/releases) — produk `store_product`,
kategori `store_product_cat`, merek `brand`. Sejak 1.1.0 tema tidak lagi memakai plugin Velocity Toko
maupun Kirki.

Integrasi VD Store ada di `inc/vd-store.php`, `css/vd-store.css`, dan template override di folder
`vd-store/` (arsip, kategori, merek, detail produk). Bar atas (warna tema): kontak, profil, keranjang,
pencarian produk. Header: logo (Site Identity), menu utama bergaya tab, dan **Second Menu** (lokasi
menu kedua, latar warna tema).

### Beranda
Beranda = `index.php` (Settings > Reading: tulisan terbaru), tanpa sidebar: carousel produk (kategori dari
Customizer > Velocity Toko 12 > Slider Produk Home; kosong = semua produk), judul situs, 8 produk terbaru +
tombol "Produk lainnya", artikel terbaru.

### Widget
Shortcode untuk widget Teks (susunan demo, dibaca installer lewat `velocity_tema_widget_sidebar()` dan
`velocity_tema_widget_footer()`):

- Sidebar: tidak ada (demo tanpa sidebar)
- Footer (latar warna tema): `[toko12_produk_terbaru jumlah="5"]`, `[toko12_bank]`, `[toko12_ekspedisi]`, `[toko12_kontak]`
- Lainnya: `[toko12_kategori]`, `[toko12_cari_produk]`, `[toko12_best_seller jumlah="5"]`, `[toko12_testimoni jumlah="5"]`, `[toko12_info_terbaru]`, `[toko12_sosmed]`, `[toko12_facebook url="…"]`

### Halaman
Template **Velocity Toko Pricelist** (`page-pricelist.php`): tabel semua produk + tombol Cetak.
Halaman Katalog & Profil Saya VD Store (`page_catalog`/`page_profile`, `[wp_store_catalog]`/`[wp_store_profile]`) selalu tanpa sidebar.

### Customizer
Appearance > Customize > **Velocity Toko 12**: Warna (utama, sekunder), Popup Sambutan (aktif/nonaktif +
isi HTML, tampil sekali sehari per pengunjung), Font (judul & teks), Slider Produk Home (kategori carousel).
Logo & gambar header: Site Identity / Header Image. Latar website: Background tema induk. Warna teks/link:
Theme Colors tema induk.

### Usage
Simply download the zip and upload the zip (velocity-toko12.zip) under your WordPress dashboard at Appearance > Themes. Or extract and upload via FTP at wp-content/themes/.
