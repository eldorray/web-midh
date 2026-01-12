
System Informasi Manajemen Sekolah / RDM Hub yang dikembangkan untuk MI Darul Huffazh. Aplikasi ini mencakup manajemen akademik, kepegawaian, perpustakaan, dan sarana prasarana.

## 🚀 Fitur Utama

-   **Manajemen Pengguna**: Sistem autentikasi dan otorisasi untuk Admin, Guru, dan Staff.
-   **Akademik**: Pengelolaan data siswa, rapor, dan nilai.
-   **Kepegawaian (HR)**:
    -   Manajemen Guru dan Staff.
    -   Payroll & Laporan Gaji (Tahfidz).
    -   Absensi & Cuti.
-   **Perpustakaan**: Manajemen koleksi buku, anggota, dan sirkulasi peminjaman.
-   **Sarana Prasarana (E-Sarpras)**: Manajemen inventaris sekolah.
-   **Fitur Utilitas**:
    -   Import Data User via Excel.
    -   Generasi Laporan PDF.

## 📋 Persyaratan Sistem

Pastikan sistem Anda memenuhi persyaratan berikut sebelum memulai:

-   **PHP**: ^8.2
-   **Composer**: Terinstal
-   **Node.js & NPM**: Terinstal
-   **Database**: MySQL / MariaDB

## 🛠 Panduan Instalasi (Clone)

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan proyek ini di komputer lokal:

### 1. Clone Repository

Unduh source code dari GitHub:

```bash
git clone https://github.com/eldorray/web-midh.git
cd web-midh
```

### 2. Install Dependensi

Install library PHP (via Composer) dan JavaScript (via NPM):

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

Salin file konfigurasi `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Buka file `.env` dengan text editor Anda dan sesuaikan konfigurasi database:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Key & Link Storage

Generate application key Laravel dan buat symbolic link untuk storage:

```bash
php artisan key:generate
php artisan storage:link
```

### 5. Setup Database

Jalankan migrasi database. Gunakan flag `--seed` jika Anda ingin mengisi database dengan data awal (seeder):

```bash
php artisan migrate --seed
```

### 6. Build Aset Frontend

Kompilasi aset CSS dan JS menggunakan Vite:

```bash
npm run build
```

## 💻 Cara Menjalankan Aplikasi

Untuk lingkungan pengembangan (development), Anda bisa menggunakan command berikut:

```bash
php artisan serve
```

Akses aplikasi melalui browser di [http://localhost:8000](http://localhost:8000).

---

**Catatan**: Jika Anda menggunakan **Laravel Herd** atau **Valet**, Anda cukup membuka folder proyek di browser sesuai dengan domain `project.test` yang dikonfigurasi.
