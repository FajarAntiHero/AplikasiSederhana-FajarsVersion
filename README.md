# Aplikasi CRUD Sederhana

Aplikasi ini merupakan aplikasi berbasis web yang dibuat dengan PHP dan MySQL untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data pengguna.

## Fitur
1. **Menampilkan Data** - Menampilkan daftar pengguna yang tersimpan dalam database.
2. **Menambahkan Data** - Memungkinkan pengguna untuk menambahkan data baru ke dalam database.
3. **Mengedit Data** - Memungkinkan pengguna untuk memperbarui data yang sudah ada.
4. **Menghapus Data** - Memungkinkan pengguna untuk menghapus data dari database.

## Teknologi yang Digunakan
- **PHP** (Server-side scripting language)
- **MySQL** (Database management system)
- **Bootstrap 5** (Frontend framework untuk tampilan yang responsif)
- **HTML, CSS, JavaScript** (Markup dan styling)

## Struktur Folder
```
|-- index.php
|-- config.php
|-- Src/
|   |-- style.css
|   |-- script.js
```

## Instalasi dan Penggunaan

### 1. Clone Repository
```bash
git clone https://github.com/FajarAntiHero/AplikasiSederhana-FajarsVersion.git
```

### 2. Buat Database
Buat database di MySQL dengan nama `crud_db` dan jalankan query berikut untuk membuat tabel `users`:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    kontak VARCHAR(50) NOT NULL,
    alamat TEXT NOT NULL
);
```

### 3. Konfigurasi Database
Buka file `config.php` dan sesuaikan kredensial database sesuai dengan server lokal:
```php
$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'crud_db';
```

### 4. Jalankan Aplikasi
Pastikan server Apache dan MySQL aktif, lalu buka browser dan akses:
```
http://localhost/path-ke-proyek/index.php
```

## Cara Penggunaan
1. **Menambahkan Data**
   - Klik tombol "Tambahkan Data".
   - Isi form dengan nama, kelas, kontak, dan alamat.
   - Klik "Tambahkan Data" untuk menyimpan.

2. **Mengedit Data**
   - Klik tombol "Edit" pada baris data yang ingin diperbarui.
   - Form akan muncul dengan data yang bisa diubah.
   - Klik "Perbarui Data" untuk menyimpan perubahan.

3. **Menghapus Data**
   - Klik tombol "Delete".
   - Konfirmasi penghapusan.
   - Data akan terhapus dari database.

## Lisensi
Proyek ini bersifat open-source dan dapat digunakan serta dimodifikasi sesuai kebutuhan.

## Kontributor
- **Nama:** Fajar Maulana
- **GitHub:** [FajarAntiHero](https://github.com/FajarAntiHero)

