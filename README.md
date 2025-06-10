
# 🚀 Tutorial Menjalankan Proyek Laravel

Panduan singkat untuk menyiapkan dan menjalankan proyek Laravel setelah proses cloning atau ekstraksi selesai.

---

## 📦 Persiapan

Pastikan Anda telah menginstall:
- PHP >= 8.1
- Composer
- MySQL / MariaDB (atau database lainnya)
- Node.js & NPM (jika proyek menggunakan frontend build tools)

---

## ⚙️ Langkah-langkah Menjalankan Proyek

### 1. Clone Repository (jika belum)
```bash
git clone https://github.com/nama-user/nama-project.git
cd nama-project
```

### 2. Install Dependency PHP
```bash
composer install
```

### 3. Salin File `.env`
```bash
cp .env.example .env
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Atur Konfigurasi Database
Edit file `.env` dan sesuaikan bagian berikut:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migrasi Database (Opsional: + Seeder)
```bash
php artisan migrate --seed
```

### 7. Buat Storage Link
```bash
php artisan storage:link
```

### 8. Jalankan Server Lokal
```bash
php artisan serve
```

Server akan berjalan di:
```
http://127.0.0.1:8000
```

---

## 🛠️ Tambahan (Opsional)

### Install Dependency Frontend (jika menggunakan Vite atau Laravel Mix)
```bash
npm install
npm run dev
```

---

## 🧼 Troubleshooting

- **Masalah permission (Linux/Mac)**  
  Jalankan:
  ```bash
  sudo chmod -R 775 storage bootstrap/cache
  ```

- **Error saat migrasi**  
  Pastikan database sudah dibuat dan konfigurasi `.env` benar.

---

## 📬 Kontak

Untuk pertanyaan atau bantuan lebih lanjut, silakan hubungi:
- Email: example@domain.com
- GitHub: [@nama-user](https://github.com/nama-user)
