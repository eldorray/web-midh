# Web Sekolah Universal (Web MIDH)

Sistem Informasi Manajemen Sekolah / RDM Hub universal yang dapat digunakan untuk berbagai jenjang pendidikan (SD, SMP, SMA, MI, MTs, MA, SMK, TK, RA). Aplikasi ini dikembangkan dengan arsitektur yang bersih dan dapat dikonfigurasi sesuai kebutuhan sekolah.

## 🚀 Fitur Utama

### Manajemen Konten

-   **Hero Banner**: Kelola banner halaman utama dengan dukungan gambar dan teks dinamis
-   **Blog & Berita**: Sistem blog lengkap dengan rich text editor, tags, dan kategori
-   **Profil Guru**: Tampilkan profil guru/pengajar dengan foto dan sosial media
-   **Visi Misi**: Halaman visi, misi, tujuan, dan sejarah sekolah

### PPDB Online (Penerimaan Peserta Didik Baru)

-   **Form Pendaftaran**: Form komprehensif dengan validasi data lengkap
-   **Cek Status**: Pendaftar dapat mengecek status pendaftaran via NIK/NISN
-   **Admin Dashboard**: Kelola pendaftar, approve/reject, dengan catatan admin
-   **Export Excel**: Download data pendaftar ke Excel
-   **Multi Jenjang**: Mendukung pendaftaran untuk berbagai jenjang pendidikan

### Pengaturan Sekolah

-   **Konfigurasi Dinamis**: Nama sekolah, jenjang, alamat, kontak, logo
-   **Identitas Sekolah**: NPSN, NSS, akreditasi, kepala sekolah
-   **PPDB Settings**: Buka/tutup pendaftaran, periode, persyaratan
-   **Sosial Media**: Integrasi dengan Facebook, Instagram, YouTube, dll

### Fitur Teknis

-   **Image Compression**: Otomatis kompres gambar ke format WebP (hemat storage ~80%)
-   **Soft Deletes**: Data penting tidak hilang saat dihapus
-   **Admin Middleware**: Proteksi route admin dengan otorisasi
-   **Clean Architecture**: Form Requests, Services, Enums untuk kode yang bersih

## 📋 Persyaratan Sistem

-   **PHP**: ^8.2
-   **Composer**: Terinstal
-   **Node.js & NPM**: Terinstal
-   **Database**: MySQL / MariaDB / SQLite
-   **GD Library atau Imagick**: Untuk kompresi gambar

## 🛠 Panduan Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/eldorray/web-midh.git
cd web-midh
```

### 2. Install Dependensi

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Link Storage

```bash
php artisan key:generate
php artisan storage:link
```

### 5. Setup Database

```bash
php artisan migrate --seed
```

### 6. Build Aset Frontend

```bash
npm run build
```

## 💻 Cara Menjalankan

### Development

```bash
php artisan serve
```

Akses aplikasi di [http://localhost:8000](http://localhost:8000)

### Dengan Vite Dev Server (Hot Reload)

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

## 👤 Akun Default

Setelah menjalankan seeder, akun admin default:

-   **Email**: admin@sekolah.test
-   **Password**: password

> ⚠️ **Penting**: Segera ubah password setelah login pertama!

## 🏫 Konfigurasi Jenjang Sekolah

Aplikasi mendukung jenjang berikut (dapat dikonfigurasi di `config/school.php`):

| Kode | Jenjang                         |
| ---- | ------------------------------- |
| sd   | Sekolah Dasar (SD)              |
| smp  | Sekolah Menengah Pertama (SMP)  |
| sma  | Sekolah Menengah Atas (SMA)     |
| smk  | Sekolah Menengah Kejuruan (SMK) |
| mi   | Madrasah Ibtidaiyah (MI)        |
| mts  | Madrasah Tsanawiyah (MTs)       |
| ma   | Madrasah Aliyah (MA)            |
| tk   | Taman Kanak-Kanak (TK)          |
| ra   | Raudhatul Athfal (RA)           |

## 📁 Struktur Proyek

```
app/
├── Enums/                 # Enum classes (RegistrationStatus)
├── Exports/               # Excel export classes
├── Http/
│   ├── Controllers/
│   │   ├── Admin/         # Admin controllers (PpdbController, SchoolSettingController)
│   │   └── ...            # Public controllers
│   ├── Middleware/        # AdminMiddleware
│   └── Requests/          # Form Request validation
├── Models/                # Eloquent models
└── Services/              # Service classes (FileUploadService)

config/
└── school.php             # School configuration (levels, religions, etc.)

database/
├── factories/             # Model factories for testing
└── migrations/            # Database migrations
```

## 🧪 Testing

Jalankan test suite:

```bash
php artisan test
```

Jalankan test tertentu:

```bash
php artisan test --filter=PpdbTest
php artisan test --filter=BlogTest
```

## 📝 API Endpoints

### Public

| Method | Endpoint       | Deskripsi              |
| ------ | -------------- | ---------------------- |
| GET    | `/ppdb`        | Halaman PPDB           |
| POST   | `/ppdb/check`  | Cek status pendaftaran |
| GET    | `/ppdb/daftar` | Form pendaftaran       |
| POST   | `/ppdb/daftar` | Submit pendaftaran     |

### Admin (Requires Authentication + is_admin)

| Method | Endpoint                   | Deskripsi          |
| ------ | -------------------------- | ------------------ |
| GET    | `/admin/ppdb`              | List pendaftar     |
| POST   | `/admin/ppdb/{id}/approve` | Terima pendaftar   |
| POST   | `/admin/ppdb/{id}/reject`  | Tolak pendaftar    |
| GET    | `/admin/settings`          | Pengaturan sekolah |

## 🔧 Fitur Image Compression

Semua upload gambar otomatis dikompres menggunakan Intervention Image:

-   Format output: **WebP**
-   Kualitas default: **80%**
-   Max width: **1920px** (menjaga aspect ratio)

Konfigurasi dapat diubah di `config/school.php`:

```php
'image' => [
    'quality' => 80,
    'max_width' => 1920,
    'format' => 'webp',
],
```

## 🚀 Deployment

Lihat [DEPLOYMENT.md](DEPLOYMENT.md) untuk panduan deployment ke production.

## 📄 License

MIT License - Silakan gunakan dan modifikasi sesuai kebutuhan.

---

**Dibuat dengan ❤️ untuk pendidikan Indonesia**
