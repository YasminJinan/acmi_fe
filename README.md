

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

## ✨ Fitur Utama

- 📦 **Katalog Produk Mitra** — Menampilkan produk dan profil mitra secara publik
- 📰 **Portal Berita** — Sistem publikasi berita dan artikel organisasi
- 📝 **Inbound Form Pendaftaran** — Form pendaftaran kemitraan online yang terintegrasi
- 📊 **Dashboard & Visualisasi Data** — Insight dan manajemen data internal
- 🤝 **Sistem CRM** — Pengelolaan pendaftaran dan data mitra
- ⚙️ **Content Management System** — Kelola konten tanpa perlu menyentuh kode program

---

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
