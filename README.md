<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravelku

Laravelku adalah aplikasi web berbasis Laravel yang dirancang untuk mempermudah pengelolaan data kelas, siswa, dan guru. Proyek ini mencakup berbagai fitur untuk manajemen data dan penyaringan.

## Fitur Utama

- **Manajemen Kelas**: Kelola data kelas dengan mudah.
- **Pengelolaan Siswa**: Tambah, edit, dan hapus data siswa.
- **Pengelolaan Guru**: Atur data guru dan hubungkan dengan kelas.
- **Filter Data**: Filter data berdasarkan kelas dan tampilkan hasil yang relevan.
- **Integrasi DataTables**: Tampilkan data dengan fitur pencarian dan penyaringan.

## Prerequisites

Sebelum memulai, pastikan Anda telah menginstal:

- PHP >= 8.0
- Composer
- MySQL atau database lainnya yang didukung

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan Laravelku:

1. **Kloning Repositori**

    ```bash
    git clone https://github.com/username/laravelku.git
    ```

2. **Masuk ke Direktori Proyek**

    ```bash
    cd laravelku
    ```

3. **Instal Dependensi**

    ```bash
    composer install
    ```

4. **Salin File Konfigurasi**

    Salin file `.env.example` menjadi `.env`:

    ```bash
    cp .env.example .env
    ```

5. **Generate Key Aplikasi**

    ```bash
    php artisan key:generate
    ```

6. **Konfigurasi Database**

    Edit file `.env` dan atur pengaturan database Anda:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database
    DB_USERNAME=nama_pengguna
    DB_PASSWORD=kata_sandi
    ```

7. **Jalankan Migrasi Database**

    ```bash
    php artisan migrate
    ```

8. **Seed Database (Opsional)**

    Jika Anda ingin mengisi database dengan data contoh:

    ```bash
    php artisan db:seed
    ```

9. **Jalankan Server**

    ```bash
    php artisan serve
    ```

    Akses aplikasi di [http://localhost:8000](http://localhost:8000).

## Panduan Penggunaan

- **Menambahkan Data**: Gunakan antarmuka pengguna untuk menambahkan data kelas, siswa, dan guru.
- **Menyaring Data**: Gunakan fitur filter untuk menyaring data berdasarkan kelas.
- **Melihat Data**: Data ditampilkan dalam tabel dengan kemampuan pencarian dan penyaringan.

## Kontribusi

Kami menyambut baik kontribusi dari komunitas. Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau laporkan masalah melalui [issues](https://github.com/username/laravelku/issues).

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).

---

