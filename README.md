<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
Laravelku
Laravelku adalah sebuah proyek web berbasis Laravel yang dirancang untuk mempermudah pengelolaan data kelas, siswa, dan guru. Dokumentasi ini akan memandu Anda melalui proses instalasi dan konfigurasi proyek ini.

Fitur Utama
Manajemen Kelas: Kelola data kelas dengan mudah.
Pengelolaan Siswa: Tambah, edit, dan hapus data siswa.
Pengelolaan Guru: Atur data guru dan hubungkan dengan kelas.
Filter Data: Filter data berdasarkan kelas dan tampilkan hasil yang relevan.
DataTables Integration: Gunakan DataTables untuk menampilkan data dengan fitur pencarian dan penyaringan.
Prerequisites
Sebelum memulai, pastikan Anda telah menginstal:

PHP >= 8.0
Composer
MySQL atau database lainnya yang didukung
Instalasi
Ikuti langkah-langkah berikut untuk menginstal dan menjalankan Laravelku:

Kloning Repositori

bash
Copy code
git clone https://github.com/username/laravelku.git
Masuk ke Direktori Proyek

bash
Copy code
cd laravelku
Instal Dependensi

bash
Copy code
composer install
Salin File Konfigurasi

Salin file .env.example menjadi .env:

bash
Copy code
cp .env.example .env
Generate Key Aplikasi

bash
Copy code
php artisan key:generate
Konfigurasi Database

Edit file .env dan atur pengaturan database Anda:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=nama_pengguna
DB_PASSWORD=kata_sandi
Jalankan Migrasi Database

bash
Copy code
php artisan migrate
Seed Database (Opsional)

Jika Anda ingin mengisi database dengan data contoh:

bash
Copy code
php artisan db:seed
Jalankan Server

bash
Copy code
php artisan serve
Akses aplikasi di http://localhost:8000.

Panduan Penggunaan
Menambahkan Data: Gunakan antarmuka pengguna untuk menambahkan data kelas, siswa, dan guru.
Menyaring Data: Gunakan fitur filter untuk menyaring data berdasarkan kelas.
Melihat Data: Data ditampilkan dalam tabel dengan kemampuan pencarian dan penyaringan.