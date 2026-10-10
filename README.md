# Inventory Laravel

Aplikasi Inventory berbasis web yang dibuat menggunakan framework Laravel dan database MySQL. Aplikasi ini digunakan untuk mengelola data produk dan kategori produk.

## Fitur Aplikasi

- Menampilkan daftar produk.
- Menambahkan produk baru.
- Melihat detail produk.
- Mengedit data produk.
- Menghapus produk.
- Mencari produk berdasarkan kata kunci.
- Memfilter produk berdasarkan kategori.
- Mengurutkan data produk.
- Memvalidasi input sebelum data disimpan.
- Mengelola kategori produk.

## Teknologi

- PHP
- Laravel
- MySQL
- Blade Template
- HTML dan CSS

## Arsitektur MVC

Project ini menggunakan pola arsitektur Model-View-Controller (MVC).

- **Model:** `Product.php` dan `Category.php` mengelola data serta interaksi dengan database.
- **View:** Folder `resources/views/products/` berisi halaman antarmuka yang menggunakan Blade Template.
- **Controller:** `ProductController.php` menangani permintaan pengguna, validasi, dan proses CRUD produk.

## Persyaratan

- PHP dan Composer
- MySQL melalui XAMPP
- Git
- Browser web

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/ulfialuv/inventory-laravel.git
cd inventory-laravel
```

### 2. Instal Dependensi

```bash
composer install
```

### 3. Siapkan File Environment

```bash
copy .env.example .env
```

### 4. Buat Database

Jalankan MySQL melalui XAMPP, kemudian buat database bernama `inventory_laravel` melalui phpMyAdmin.

Sesuaikan konfigurasi database dalam file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Jalankan Migration dan Seeder

```bash
php artisan migrate:fresh --seed
```

**Perhatian:** Perintah `migrate:fresh` menghapus tabel yang ada di database sebelum membuat ulang tabel. Gunakan hanya jika data lama boleh dihapus.

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Buka alamat berikut di browser:

http://127.0.0.1:8000

## Database

Struktur database dibuat menggunakan migration Laravel. Seeder digunakan untuk mengisi data awal kategori dan produk.

## Pengembang

Project ini dibuat untuk memenuhi tugas perkuliahan.

