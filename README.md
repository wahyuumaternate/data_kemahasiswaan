
# 🎓 Data Kemahasiswaan

Repositori ini berisi sistem informasi **Data Kemahasiswaan** berbasis Laravel. Digunakan untuk mengelola data mahasiswa secara efisien dan terstruktur.

---

## 📌 Fitur Utama

- Manajemen data mahasiswa
- CRUD data dengan Laravel
- Relasi antar tabel
- Validasi dan autentikasi (jika tersedia)
- Penyimpanan file dan akses publik

---

## 📦 Persyaratan Sistem

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:

- PHP >= 8.1  
- Composer  
- MySQL / MariaDB  
- Node.js & NPM *(jika menggunakan frontend build seperti Vite / Laravel Mix)*

---

## 🚀 Cara Jalankan Proyek

### 1. Cara Membuka Terminal Proyek

Terminal adalah jendela perintah (command line) tempat menjalankan perintah Laravel.

#### Windows:
- Buka **Command Prompt** atau **PowerShell**
- Atau buka **VS Code** → `Terminal > New Terminal`

#### Mac / Linux:
- Buka aplikasi **Terminal**
- Atau buka **VS Code** → `Terminal > New Terminal`

Masuk ke folder proyek:
```bash
cd path/ke/folder/proyekmu
````

Contoh:

```bash
cd C:\xampp\htdocs\data_kemahasiswaan
```

atau

```bash
cd ~/data_kemahasiswaan
```

---

### 2. Clone Repository

```bash
git clone https://github.com/wahyuumaternate/data_kemahasiswaan.git
cd data_kemahasiswaan
```

---

### 3. Install Dependency PHP

```bash
composer install
```

---

### 4. Salin File `.env`

```bash
cp .env.example .env
```

---

### 5. Generate Application Key

```bash
php artisan key:generate
```

---

### 6. Atur Konfigurasi Database

Edit file `.env` dan sesuaikan:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=data_kemahasiswaan
DB_USERNAME=root
DB_PASSWORD=
```

> Pastikan database `data_kemahasiswaan` sudah dibuat di phpMyAdmin atau MySQL.

---

### 7. Buat Storage Link

```bash
php artisan storage:link
```

---

### 8. Jalankan Server Laravel

```bash
php artisan serve
```

Akses aplikasi di browser:

```
http://127.0.0.1:8000
```

---

## ⚙️ Opsional: Jalankan Frontend (Jika Ada)

```bash
npm install
npm run dev
```

---

## ❗ Troubleshooting

* **Masalah permission (Linux/Mac):**

```bash
sudo chmod -R 775 storage bootstrap/cache
```

* **Error database:**
  Pastikan database sudah dibuat dan konfigurasi `.env` benar.

---

## 📬 Kontak

Untuk pertanyaan dan saran:

* Email: [example@domain.com](mailto:example@domain.com)
* GitHub: [@wahyuumaternate](https://github.com/wahyuumaternate)

---


