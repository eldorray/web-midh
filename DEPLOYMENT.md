# Laravel Deployment ke Hostinger Shared Hosting

## 📋 Langkah-langkah Deploy

### 1. **Persiapan File**

Pastikan file-file berikut sudah siap:
- ✅ `.htaccess-root` - Untuk redirect ke folder public
- ✅ `deploy.sh` - Script deployment otomatis
- ✅ Assets sudah di-build (`npm run build`)

### 2. **Struktur Folder di Hostinger**

```
public_html/
├── .htaccess          (dari .htaccess-root)
├── public/            (isi dari folder public Laravel)
│   ├── index.php
│   ├── assets/
│   ├── build/
│   └── storage/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
└── composer.json
```

### 3. **Upload ke Hosting**

#### Via File Manager Hostinger:
1. Login ke hPanel Hostinger
2. Buka **File Manager**
3. Upload semua file project ke `public_html/`
4. **PENTING**: Pindahkan isi folder `public/` ke `public_html/`
5. Copy file `.htaccess-root` ke `public_html/.htaccess`

#### Via FTP (FileZilla):
1. Download FileZilla
2. Connect dengan kredensial FTP dari Hostinger
3. Upload semua file ke `public_html/`

### 4. **Setup Database**

1. Login ke hPanel → **MySQL Databases**
2. Create New Database:
   - Database name: `u123456789_webmidh`
   - Database user: `u123456789_admin`
   - Password: (buat password kuat)
3. Note down kredensial ini untuk `.env`

### 5. **Konfigurasi .env**

Edit file `.env` di server (via File Manager atau FTP):

```env
APP_NAME="MI Daarul Hikmah"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://yourdomain.com

LOG_CHANNEL=stack
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u123456789_webmidh
DB_USERNAME=u123456789_admin
DB_PASSWORD=your_database_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

### 6. **Set Permissions** (Via SSH atau File Manager)

Jika punya akses SSH:
```bash
cd public_html
chmod -R 755 storage bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

Via File Manager:
- Klik kanan folder `storage` → Permissions → 775
- Klik kanan folder `bootstrap/cache` → Permissions → 775

### 7. **Install Dependencies** (Via SSH)

Jika Hostinger support SSH dan Composer:

```bash
cd public_html
composer install --optimize-autoloader --no-dev
```

**Jika tidak ada Composer di hosting:**
- Upload folder `vendor/` dari local (yang sudah di-install)
- Atau jalankan `composer install` di local, lalu upload

### 8. **Run Deployment Script** (Via SSH)

```bash
cd public_html
chmod +x deploy.sh
./deploy.sh
```

**Atau jalankan manual via SSH:**

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 9. **Setup .htaccess di Root**

Pastikan file `public_html/.htaccess` berisi:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### 10. **Verifikasi**

1. Buka `https://yourdomain.com`
2. Test semua fitur:
   - Homepage
   - PPDB form
   - Blog
   - Admin panel
3. Check error log di `storage/logs/laravel.log`

---

## 🔧 Troubleshooting

### Error: "500 Internal Server Error"

**Solusi:**
1. Check permissions: `chmod -R 755 storage bootstrap/cache`
2. Check `.env` file ada dan valid
3. Check `storage/logs/laravel.log` untuk error details
4. Pastikan `APP_KEY` sudah di-generate

### Error: "Route not found" atau CSS tidak load

**Solusi:**
1. Pastikan `.htaccess` di root sudah benar
2. Clear cache: `php artisan cache:clear`
3. Rebuild cache: `php artisan config:cache`

### Error: Database Connection Failed

**Solusi:**
1. Verify database credentials di `.env`
2. Pastikan database user punya akses ke database
3. Test connection via phpMyAdmin

### Error: Storage symlink not working

**Solusi:**
```bash
# Delete symlink lama
rm public/storage

# Create new symlink
php artisan storage:link
```

### Error: Composer dependencies missing

**Solusi:**
- Upload folder `vendor/` dari local
- Atau gunakan Composer di local: `composer install --no-dev`

---

## 📝 Checklist Deployment

- [ ] Build assets production (`npm run build`)
- [ ] Update `.env` dengan setting production
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Upload semua file ke hosting
- [ ] Setup database di Hostinger
- [ ] Update database credentials di `.env`
- [ ] Set permissions (755/775)
- [ ] Run migrations
- [ ] Create storage symlink
- [ ] Cache config/routes/views
- [ ] Test website
- [ ] Setup SSL certificate (Let's Encrypt via hPanel)
- [ ] Test PPDB form
- [ ] Test file uploads
- [ ] Test admin dashboard

---

## 🔐 Security Tips

1. ✅ **Gunakan HTTPS** - Aktifkan SSL di Hostinger (gratis)
2. ✅ **Set APP_DEBUG=false** di production
3. ✅ **Gunakan strong password** untuk database
4. ✅ **Backup database** secara berkala
5. ✅ **Update Laravel** dan dependencies secara rutin
6. ✅ **Monitor error logs** di `storage/logs/`

---

## 📞 Support

Jika ada masalah:
1. Check Hostinger Knowledge Base
2. Contact Hostinger Support (24/7)
3. Check Laravel Logs: `storage/logs/laravel.log`

---

**Good luck with your deployment! 🚀**
