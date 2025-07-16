# ⚡ WattsUp
**WattsUp** adalah aplikasi berbasis web untuk pencatatan penggunaan, penagihan, dan pembayaran listrik **pascabayar**. Aplikasi ini dikembangkan menggunakan PHP dengan framework **CodeIgniter 3**, serta dirancang dengan UI modern menggunakan template **AdmitKit**.


## 📌 Fitur Utama

- 🔐 Login multi-level (Admin, Petugas, Pelanggan)
- 👤 Manajemen Data Pelanggan
- ⚡ Input Penggunaan Listrik (meter awal–akhir)
- 💡 Hitung Tagihan Otomatis berdasarkan tarif per kWh
- 💳 Riwayat & Data Pembayaran
- 🔍 Pencarian & Sorting Tabel
- 📅 Filter Bulan & Tahun
- 📊 Laporan Tagihan dan Pembayaran


## 🖥️ Persyaratan Sistem

- **PHP** v8.1+
- **MySQL** v15.1 (MariaDB 10.x)
- **XAMPP**
- **Web Browser** modern (Chrome, Firefox)


## 💻 Teknologi yang Digunakan

1. **PHP** - Backend language
2. **CodeIgniter 3.1.13** - PHP Framework
3. **MySQL** - Database server
4. **JavaScript** - Interaktifitas client-side
5. **AdminKit** - Dashboard UI template
6. **Bootstrap 5** - UI framework


## 🧩 ERD & Database
Terdapat 7 tabel utama:
1. penggunaan
2. tagihan
3. pembayaran
4. pelanggan
5. user
6. tarif
7. level
