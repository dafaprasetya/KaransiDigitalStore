# Jual Beli Pulsa, Token, dan Voucher Game

Website ini adalah platform jual beli pulsa, token listrik, dan voucher game yang dibangun menggunakan teknologi PHP Laravel untuk backend, Vue.js untuk frontend, dan Bootstrap untuk antarmuka pengguna. Proyek ini sudah terintegrasi dengan Midtrans sebagai gateway pembayaran, memungkinkan transaksi dilakukan dengan aman dan nyaman.

## Fitur

- Pembelian pulsa, token listrik, dan voucher game
- Otentikasi pengguna (login, register)
- Integrasi pembayaran dengan Midtrans
- Riwayat transaksi pengguna
- Dashboard admin untuk pengelolaan produk dan transaksi
- Antarmuka yang responsif menggunakan Bootstrap
- Notifikasi pembayaran dan status transaksi

## Teknologi yang Digunakan

- **Backend**: PHP Laravel
- **Frontend**: Vue.js
- **UI Framework**: Bootstrap
- **Payment Gateway**: Midtrans
- **Database**: MySQL

## Prasyarat

Pastikan Anda telah menginstal beberapa prasyarat berikut:

- PHP >= 8.0
- Composer
- Node.js dan npm
- MySQL
- Git

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek secara lokal:

1. **Clone repository**

   ```bash
   git clone https://github.com/username/repository.git
   cd repository
   ```
2. **Install dependencies**
   BackEnd:
   ```bash
   composer install
   ```
   FrontEnd:
   ```bash
   npm install
   npm run dev
   ```
3. Konfigurasi environment

   Salin file .env.example menjadi .env dan sesuaikan konfigurasi database, Midtrans, dan lainnya:
   ```bash
   cp .env.example .env
   ```
   Lalu, generate application key:
   ```bash
   php artisan key:generate
   ```
4. Migrasi dan seeder database

   Migrasikan dan isi database dengan data awal:
   ```bash
   php artisan migrate --seed
   ```
5. Menjalankan server

   Jalankan server Laravel:
   ```env
   php artisan serve
   ```
   Website dapat diakses di http://localhost:8000.
