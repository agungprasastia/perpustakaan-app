# 📚 Sistem Informasi Perpustakaan Sederhana (PHP Native)

Ini adalah proyek sistem informasi perpustakaan sederhana yang dibangun menggunakan **PHP Native** (tanpa *framework*) dan database **MySQL**. Aplikasi ini mengimplementasikan fungsionalitas CRUD (Create, Read, Update, Delete) dasar untuk mengelola data perpustakaan.

## ✨ Fitur Utama

-   **Manajemen Buku**: CRUD (Tambah, Lihat, Edit, Hapus) data buku.
-   **Manajemen Anggota**: CRUD (Tambah, Lihat, Edit, Hapus) data anggota.
-   **Manajemen Transaksi**:
    -   Proses peminjaman buku.
    -   Proses pengembalian buku.
-   **Riwayat**: Melihat riwayat semua transaksi peminjaman (aktif dan selesai).
-   **Struktur Modular**: Kode diorganisir ke dalam modul (`anggota`, `buku`, `peminjaman`) agar mudah dikelola.

## ⚙️ Teknologi yang Digunakan

-   **Frontend**: HTML & CSS (Sederhana)
-   **Backend**: PHP Native
-   **Database**: MySQL
-   **Server Lokal**: Laragon

## 🚀 Cara Instalasi dan Menjalankan (Laragon)

Untuk menjalankan proyek ini di komputer lokal Anda menggunakan Laragon, ikuti langkah-langkah berikut:

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/agungprasastia/perpustakaan-app.git](https://github.com/agungprasastia/perpustakaan-app.git)
    ```

2.  **Pindahkan ke Folder `www`**
    -   Pindahkan folder `perpustakaan-app` ke dalam direktori `www` di instalasi Laragon Anda. (Biasanya di `C:/laragon/www/`)

3.  **Setup Database**
    -   Pastikan Laragon Anda berjalan (klik "Start All").
    -   Buka **phpMyAdmin** melalui dashboard Laragon (atau klik tombol "Database").
    -   Buat database baru dengan nama `db_perpustakaan`.
    -   Impor *file* SQL (jika Anda memilikinya) atau buat tabel berikut: `anggota`, `buku`, dan `peminjaman`.

4.  **Buat File Koneksi (PENTING)**
    -   Proyek ini menggunakan `.gitignore` untuk mengabaikan *file* `koneksi.php`, jadi Anda harus membuatnya secara manual.
    -   Buka folder `config/`.
    -   Buat *file* baru bernama **`koneksi.php`**.
    -   Isi dengan kode koneksi Anda:
    ```php
    <?php
    $host = 'localhost'; 
    $user = 'root';  
    $pass = ''; // Password root Laragon biasanya kosong secara default        
    $db   = 'db_perpustakaan';

    $koneksi = mysqli_connect($host, $user, $pass, $db);

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    } 
    ?>
    ```

5.  **Jalankan Aplikasi**
    -   Laragon secara otomatis membuat URL "Pretty" untuk Anda.
    -   Buka *browser* Anda dan akses: `http://perpustakaan-app.test`
    -   *(Jika URL tersebut tidak berfungsi, pastikan Anda me-restart Laragon setelah memindahkan folder proyek)*

## 📁 Struktur Folder Proyek

Struktur proyek ini diatur berdasarkan fungsi untuk memisahkan logika (PHP) dari aset (CSS) dan konfigurasi.

```text
perpustakaan-app/
│
├── .gitignore           # Memberi tahu Git file apa yang harus diabaikan
├── README.md            # File ini, dokumentasi proyek
├── index.php            # Halaman utama (Menampilkan daftar buku)
│
├── assets/
│   └── css/             # Folder untuk semua file styling
│       └── style.css
│
├── config/
│   └── koneksi.php      # <-- PENTING: File ini diabaikan oleh .gitignore
│                        # (Anda harus membuatnya secara manual sesuai petunjuk instalasi)
│
└── modules/               # Folder utama untuk semua logika bisnis
    ├── anggota/         # Semua file PHP untuk fitur Anggota
    ├── buku/            # Semua file PHP untuk fitur Buku
    └── peminjaman/      # Semua file PHP untuk fitur Peminjaman