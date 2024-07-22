<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravelku

Laravelku adalah aplikasi web berbasis Laravel yang dirancang untuk mempermudah pengelolaan data kelas, siswa, dan guru. Proyek ini mencakup berbagai fitur untuk manajemen data dan penyaringan.

## Fitur Utama

1. **Buat Aplikasi yang Memiliki Fitur Login dan Logout**: Implementasi autentikasi pengguna untuk mengakses dan mengelola aplikasi.
2. **Buat Fitur Manage Siswa (CRUD)**: Tambah, edit, hapus, dan tampilkan data siswa.
3. **Buat Fitur Manage Kelas (CRUD)**: Tambah, edit, hapus, dan tampilkan data kelas.
4. **Buat Fitur Manage Guru (CRUD)**: Tambah, edit, hapus, dan tampilkan data guru.
5. **Munculkan List Siswa Berdasarkan Kelasnya**: Tampilkan daftar siswa yang terdaftar di setiap kelas.
6. **Munculkan List Guru Berdasarkan Kelasnya**: Tampilkan daftar guru yang ditugaskan pada setiap kelas.
7. **Munculkan List Siswa, Kelas, dan Guru**: Tampilkan daftar lengkap siswa, kelas, dan guru dalam satu tampilan.

## Halaman Aplikasi

### Halaman Login

- **Login menggunakan**:
  - Email: `admin@gmail.com`
  - Password: `password`

### Halaman Home

- **Selamat datang**: Menampilkan pesan selamat datang untuk `$user`.
- **Keterangan Login**: Menampilkan informasi login sebagai `$role`.

### Halaman About

- Berisi informasi sederhana mengenai website.

### Halaman Siswa

- **Fitur CRUD Siswa**: Tambah, edit, hapus, dan tampilkan data siswa.
- **Unique NIS**: Setiap siswa memiliki NIS yang unik dan tidak boleh sama.
- **Filter by Kelas**: Fitur untuk menyaring siswa berdasarkan kelas.

### Halaman Guru

- **Fitur CRUD Guru**: Tambah, edit, hapus, dan tampilkan data guru.
- **Unique NIP**: Setiap guru memiliki NIP yang unik dan tidak boleh sama.
- **Filter by Kelas**: Fitur untuk menyaring guru berdasarkan kelas yang mereka wali.

### Halaman Kelas

- **Fitur CRUD Kelas**: Tambah, edit, hapus, dan tampilkan data kelas.
- **Unique Nama Kelas**: Setiap nama kelas harus unik dan tidak boleh sama.
- **Fitur Search**: Fitur pencarian untuk menemukan kelas dengan mudah.

### Halaman Laporan

- **Menampilkan Data**: Terdapat seluruh data mengenai siswa, kelas, dan guru yang berelasi.
- **Scenario**:
  - **Siswa & Kelas**:
    - Setiap siswa memiliki 1 kelas.
    - Setiap kelas memiliki banyak siswa.
  - **Guru & Kelas**:
    - Setiap kelas memiliki 1 guru/wali kelas.
    - Setiap guru bisa menjadi wali kelas untuk lebih dari 1 kelas.

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

- **Menambahkan Data**: Gunakan antarmuka pengguna untuk menambahkan data siswa, kelas, dan guru.
- **Menyaring Data**: Gunakan fitur filter untuk menyaring data berdasarkan kelas dan menampilkan hasil yang relevan.
- **Melihat Data**: Data ditampilkan dalam tabel dengan kemampuan pencarian dan penyaringan.

## Kontribusi

Kami menyambut baik kontribusi dari komunitas. Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau laporkan masalah melalui [issues](https://github.com/username/laravelku/issues).

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT).
