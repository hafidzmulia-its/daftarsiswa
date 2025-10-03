# Daftar Siswa - CRUD PHP Native

Aplikasi CRUD (Create, Read, Update, Delete) sederhana untuk mengelola data siswa menggunakan PHP Native dan MySQL. Proyek ini dibuat untuk memperkuat fundamental dalam pengembangan web.

## Fitur

- ✅ **Create**: Tambah data siswa baru
- ✅ **Read**: Tampilkan daftar semua siswa
- ✅ **Update**: Edit data siswa yang sudah ada
- ✅ **Delete**: Hapus data siswa
- 🎨 Desain UI yang responsive dan modern
- 🔒 Sanitasi input untuk keamanan dasar

## Teknologi yang Digunakan

- PHP Native (tanpa framework)
- MySQL Database
- HTML5 & CSS3
- JavaScript (untuk konfirmasi delete)

## Struktur Database

**Tabel: siswa**
- `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
- `nama` (VARCHAR 100) - Nama lengkap siswa
- `nis` (VARCHAR 20, UNIQUE) - Nomor Induk Siswa
- `kelas` (VARCHAR 20) - Kelas siswa
- `jurusan` (VARCHAR 50) - Jurusan siswa
- `email` (VARCHAR 100) - Email siswa
- `created_at` (TIMESTAMP) - Waktu pembuatan record
- `updated_at` (TIMESTAMP) - Waktu update record

## Instalasi

### Prasyarat
- PHP 7.0 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web Server (Apache/Nginx) atau XAMPP/WAMP/MAMP

### Langkah-langkah Instalasi

1. **Clone repository ini**
   ```bash
   git clone https://github.com/hafidzmulia-its/daftarsiswa.git
   cd daftarsiswa
   ```

2. **Setup Database**
   - Buka phpMyAdmin atau MySQL client
   - Import file `database.sql` atau jalankan perintah SQL di dalamnya
   - Database `daftarsiswa` akan otomatis terbuat beserta tabel dan data sample

3. **Konfigurasi Database**
   - Buka file `config.php`
   - Sesuaikan kredensial database jika diperlukan:
     ```php
     $servername = "localhost";
     $username = "root";      // sesuaikan dengan username MySQL Anda
     $password = "";          // sesuaikan dengan password MySQL Anda
     $dbname = "daftarsiswa";
     ```

4. **Jalankan Aplikasi**
   - Jika menggunakan XAMPP/WAMP/MAMP:
     - Copy folder project ke `htdocs` (XAMPP) atau `www` (WAMP)
     - Akses di browser: `http://localhost/daftarsiswa`
   
   - Jika menggunakan PHP Built-in Server:
     ```bash
     php -S localhost:8000
     ```
     - Akses di browser: `http://localhost:8000`

## Cara Penggunaan

### Melihat Daftar Siswa
- Buka halaman utama (`index.php`)
- Semua data siswa akan ditampilkan dalam bentuk tabel

### Menambah Siswa Baru
1. Klik tombol "Tambah Siswa Baru"
2. Isi form dengan data siswa
3. Klik tombol "Simpan"

### Mengedit Data Siswa
1. Klik tombol "Edit" pada siswa yang ingin diubah
2. Ubah data yang diperlukan
3. Klik tombol "Update"

### Menghapus Data Siswa
1. Klik tombol "Hapus" pada siswa yang ingin dihapus
2. Konfirmasi penghapusan data
3. Data akan terhapus dari database

## File Structure

```
daftarsiswa/
├── config.php          # Konfigurasi koneksi database
├── database.sql        # Script SQL untuk setup database
├── index.php           # Halaman utama (Read)
├── tambah.php          # Halaman tambah siswa (Create)
├── ubah.php            # Halaman edit siswa (Update)
├── hapus.php           # Script hapus siswa (Delete)
├── style.css           # File CSS untuk styling
└── README.md           # Dokumentasi
```

## Pembelajaran

Proyek ini mencakup konsep-konsep fundamental web development:
- **PHP Dasar**: Variabel, kondisi, perulangan
- **Database MySQL**: CRUD operations, SQL queries
- **MySQLi**: Koneksi database, prepared statements dasar
- **HTML Forms**: Input handling, form validation
- **CSS**: Styling, responsive design, flexbox
- **Security**: Input sanitasi dengan `mysqli_real_escape_string()`
- **UX**: Alert messages, confirmation dialogs

## Pengembangan Lebih Lanjut

Beberapa fitur yang bisa ditambahkan:
- [ ] Pagination untuk daftar siswa
- [ ] Fitur pencarian dan filter
- [ ] Export data ke Excel/PDF
- [ ] Upload foto siswa
- [ ] Login/Authentication system
- [ ] Validasi form yang lebih kompleks
- [ ] Menggunakan Prepared Statements untuk keamanan lebih baik
- [ ] Ajax untuk operasi tanpa reload halaman

## Lisensi

MIT License - Bebas digunakan untuk belajar dan pengembangan

## Kontribusi

Kontribusi selalu terbuka! Silakan buat pull request atau laporkan issue jika menemukan bug.

## Kontak

Hafidz Mulia - [@hafidzmulia-its](https://github.com/hafidzmulia-its)