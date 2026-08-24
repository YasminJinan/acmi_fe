

<h1 align="center">ACMI Site</h1>

<p align="center">
  Platform digital terintegrasi untuk <strong>Asosiasi CEO Mastermind Indonesia (ACMI)</strong>,<br>
  terdiri dari website publik dan CMS Dashboard untuk admin internal.
</p>

---

## 📖 Tentang Project

Platform ini dibangun untuk menyelesaikan dua permasalahan utama ACMI:

- Pengelolaan data yang masih dilakukan secara **manual**
- Belum adanya **media publikasi bisnis yang terpusat**

Solusinya berupa sistem terintegrasi yang mencakup **CMS Dashboard** untuk admin internal dan **website publik** untuk pengguna eksternal.

---

## ✨ Fitur Lengkap Sistem (Web Portal & CMS)

Platform ACMI terbagi menjadi dua ekosistem utama: **Web Portal Publik (`acmi_fe`)** untuk pengguna/pengunjung dan **CMS Dashboard (`acmi_db`)** untuk admin internal.

---

### 🌐 1. Fitur Web Portal Publik (`acmi_fe`)

Website portal utama yang dapat diakses oleh publik, calon anggota, dan mitra bisnis:

| Fitur | Deskripsi |
| :--- | :--- |
| 🌍 **Multi-Language (Bilingual ID/EN)** | Dukungan penuh 2 bahasa (Indonesia & Inggris) dengan sistem routing terstruktur (`/id/*` dan `/en/*`), dynamic slug, dan auto language switch di header navigasi. |
| 👑 **Executive Hero & Branding** | Tampilan visual modern bertema dark/light mode, animasi interaktif, tipografi elegan (Poppins & Serif), dan direct CTA ke pendaftaran keanggotaan. |
| 🏛️ **Profil Dewan Pengurus (Board)** | Halaman profil jajaran Board of Directors ACMI, visi-misi organisasi, nilai inti kepemimpinan, dan tombol pendaftaran kemitraan. |
| 🛍️ **Katalog Produk & Layanan Mitra** | Menampilkan etalase layanan dan produk eksklusif ekosistem ACMI (`/id/produk` & `/en/products`) lengkap dengan halaman detail per produk. |
| 📰 **Portal Artikel & Berita (OnTopic)** | Pusat wawasan bisnis, artikel kepemimpinan, dan berita kegiatan ACMI dengan fitur filter kategori, pagination, serta halaman detail yang responsif. |
| 📅 **Agenda & Exclusive Events** | Halaman daftar kegiatan, workshop, roundtable, dan summit tahunan khusus CEO dengan detail jadwal dan status pendaftaran. |
| 📸 **Galeri Dokumentasi Interaktif** | Dokumentasi foto kegiatan ACMI dengan tampilan grid responsif, filter kategori album, dan tampilan lightbox interaktif. |
| 📝 **Formulir Pendaftaran VIP (Inbound Join)** | Formulir aplikasi keanggotaan online (`/id/gabung` & `/en/join`) yang otomatis terhubung dan tersinkronisasi ke database CMS internal. |
| 👥 **Profil Manajemen & Sekretariat** | Informasi jajaran manajerial pengelola harian komunitas dan profil sekretariat ACMI (`/id/manajer` & `/en/manager`). |
| ❓ **FAQ Interaktif** | Bagian tanya jawab interaktif bertema akordion seputar syarat gabung, proses seleksi kurasi, dan keuntungan anggota. |
| 📸 **Integrasi Instagram Feed** | Menampilkan postingan media sosial Instagram resmi ACMI secara real-time via API proxy. |
| 🤝 **Sponsor Banner & Tracking Interaktif** | Carousel logo mitra/sponsor terintegrasi dengan pelacakan analitik tayangan (*impression*) dan klik banner (`sponsor-tracking.js`). |
| 🚀 **SEO & Schema JSON-LD Teroptimasi** | Dilengkapi Schema.org JSON-LD, OpenGraph tags, dynamic hreflang alternate, canonical links, dan sitemap XML otomatis (`/sitemap.xml`). |
| 🌓 **Dark & Light Mode Switcher** | Pengatur tema gelap dan terang dengan transisi halus berbasis Alpine.js dan Tailwind CSS yang menyimpan preferensi pengguna. |

---

### 🗄️ 2. Fitur CMS Dashboard Admin (`acmi_db`)

Dashboard internal untuk admin mengelola seluruh data, konten, dan pendaftaran:

| Fitur | Deskripsi |
| :--- | :--- |
| 🔐 **Autentikasi & Keamanan Admin** | Sistem login terproteksi (`/signin`) dengan enkripsi password dan manajemen session admin internal. |
| 📊 **Dashboard & Visualisasi Data** | Ringkasan statistik performa website, jumlah pendaftaran masuk (inbound), total artikel, layanan aktif, dan data interaksi sponsor. |
| ✍️ **Manajemen Artikel & Berita** | CRUD (Create, Read, Update, Delete) artikel berita lengkap dengan Rich Text Editor, upload featured image, auto slug generator, dan status publikasi. |
| 🏷️ **Manajemen Kategori Artikel** | Pengelompokan kategori topik artikel untuk mempermudah pencarian dan filter di website publik. |
| 📦 **Manajemen Produk & Layanan** | Pengelolaan katalog produk/jasa mitra, upload foto produk, deskripsi layanan, dan pengaturan slug. |
| 🗓️ **Manajemen Agenda & Event** | Pengaturan jadwal kegiatan, tanggal acara, lokasi/link virtual, daftar pembicara, dan status registrasi. |
| 🖼️ **Manajemen Galeri Media** | Pengunggahan dan pengelompokan dokumentasi foto/kegiatan ACMI ke dalam album galeri. |
| 📥 **Manajemen Inbound Leads & Pendaftar** | Sistem CRM untuk meninjau data pendaftaran keanggotaan baru, validasi profil bisnis, data kontak, dan proses kurasi status. |
| 🎖️ **Manajemen Mitra & Sponsor** | Pengaturan logo partner, banner sponsor, penentuan tiering level, URL rujukan, serta pemantauan statistik klik & impresi. |
| 💬 **Manajemen FAQ & Testimonial** | Pengelolaan daftar pertanyaan umum (Q&A) dan ulasan testimoni para CEO secara dinamis tanpa perlu mengubah kode program. |
| 🔌 **Engine Public RESTful API** | Layanan endpoint API terpusat (`/api/public/*`) berkecepatan tinggi dengan format JSON standar untuk menyuplai data ke frontend secara real-time. |

## 🛠️ Tech Stack

| Layer | Teknologi |
|-------|-----------|
| Backend Framework | Laravel |
| Frontend Styling | Tailwind CSS |
| Database | MySQL |
| API | RESTful API |
| API Testing | Postman |

---

## 👥 Tim Pengembang

| Nama | Role |
|------|------|
| Nael Muna | Full Stack Developer |
| Yasmin Jinan | Frontend Developer |
| Nisrina Asad | Backend Developer |
| Azka Syakirah | Backend Developer |

---

## 🎯 Target Pengguna

| Pengguna | Akses |
|----------|-------|
| **Admin Internal** | CMS Dashboard — mengelola data, konten, dan validasi inbound |
| **Pengguna Eksternal** | Website Publik — melihat produk, berita, dan mendaftar kemitraan |

---

## ⚙️ Instalasi & Setup

### Prasyarat

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/username/acmi-project.git
cd acmi-project

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Setup environment
cp .env.example .env
php artisan key:generate

# 5. Konfigurasi database di file .env
DB_DATABASE=acmi
DB_USERNAME=root
DB_PASSWORD=

# 6. Jalankan migrasi dan seeder
php artisan migrate
php artisan db:seed

# 7. Jalankan development server
npm run dev
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

---

## 🗂️ Struktur Database

Tabel utama yang digunakan dalam sistem:

| Tabel | Keterangan |
|-------|------------|
| `users` | Data pengguna dan admin |
| `products` | Katalog produk mitra |
| `posts` | Konten berita dan artikel |
| `inbounds` | Data pendaftaran kemitraan yang masuk |

---

## 🎨 Desain UI/UX

Proses desain dilakukan melalui dua tahap menggunakan **Figma**:

1. **Low-Fidelity** — Menyusun struktur layout dan user flow dasar
2. **High-Fidelity** — Desain final bertema modern yang menyesuaikan identitas visual ACMI

---

## 🔧 Tools & Kolaborasi

| Kategori | Tools |
|----------|-------|
| UI Design | Figma |
| Version Control | GitHub |
| Komunikasi Tim | WhatsApp |
| Project Management | Lark |
| API Testing | Postman |
| AI Assistance | ChatGPT, Claude, Gemini |

---

## 🗓️ Timeline Pengembangan

| Periode | Kegiatan |
|---------|----------|
| Awal Februari 2026 | Analisis kebutuhan klien |
| Akhir Februari 2026 | Perancangan UI/UX |
| Maret — Mei 2026 | Development & Testing sistem |
| Mei 2026 | Presentasi dan pengujian (Ujikom) |

---

## 🚀 Rencana Pengembangan Selanjutnya

- [ ] **Analytics Dashboard** — Insight dan laporan performa platform
- [ ] **Membership System** — Sistem keanggotaan terintegrasi
- [ ] **SEO Testing** — Pengaplikasian SEO Testing
- [ ] **Next Role CMS** — Role selain SuperAdmin
- [ ] **Cloud Deployment** — Meningkatkan performa dan skalabilitas sistem


<p align="center">Dikembangkan dengan ❤️ oleh <strong>Breyole Teamt</strong> — RPL 2026</p>
