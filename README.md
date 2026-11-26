# ReadTrack — Development (`dev`)

Repository pengembangan aplikasi web proyek mata kuliah Rekayasa Perangkat Lunak (RPL) berbasis **PHP Native** dan **MySQL** dengan pola arsitektur **MVC**.

> **Penting:** Branch `dev` ini khusus untuk pengerjaan kode aplikasi. **Jangan melakukan Merge atau Pull Request dari `dev` ke `master`** agar dokumen pengumpulan Tugas 1–10 di `master` tetap aman.

---

## Struktur Folder

```text
├── app/
│   ├── config/          # Konfigurasi database (gunakan config.example.php sebagai acuan)
│   ├── controllers/     # Logika pemrosesan request & alur aplikasi
│   ├── models/          # Query SQL & manipulasi data tabel
│   └── views/           # Antarmuka pengguna (HTML/PHP)
├── public/              # Root folder publik yang diakses browser
│   ├── assets/          # File statis (css/, js/, img/)
│   └── index.php        # Entry point / routing utama
├── database/            # File export skema database (.sql)
└── .gitignore           # Daftar file lokal yang diabaikan Git
```

---

## Cara Setup di Laptop Lokal

1. **Tarik branch `dev` dari GitHub:**
   ```bash
   git fetch origin
   git checkout dev
   git pull origin dev
   ```
2. **Atur koneksi database lokal:**
   * Duplikat file `app/config/config.example.php` dan ubah namanya menjadi **`config.php`** di folder yang sama.
   * Sesuaikan `host`, `username`, `password`, dan `nama_database` sesuai pengaturan MySQL di laptop masing-masing *(file `config.php` otomatis diabaikan Git sehingga tidak bentrok)*.
3. **Import database:**
   * Nyalakan service **MySQL** di XAMPP atau Laragon.
   * Buat database baru di phpMyAdmin, lalu import file dari folder `database/`.
4. **Jalankan aplikasi:**
   * **Via Terminal VS Code (tanpa perlu pindah ke `htdocs`/`www`):**
     ```bash
     php -S localhost:8000 -t public
     ```
     Akses di browser melalui `http://localhost:8000`.
   * **Via XAMPP / Laragon:** Akses melalui `http://localhost/<nama-folder>/public`.

---

## Aturan Kerja Tim (Git Workflow)

* **Sebelum mulai ngoding:** Pastikan terminal berada di branch `dev` dan tarik pembaruan terbaru terlebih dahulu:
  ```bash
  git checkout dev
  git pull origin dev
  ```
* **Setelah selesai mengerjakan fitur/perbaikan:**
  ```bash
  git add .
  git commit -m "feat: deskripsi singkat perubahan"
  git push origin dev
  ```
* **Perubahan tabel database:** Setiap kali menambah atau mengubah struktur tabel di MySQL, wajib *export* ulang file `.sql` ke folder `database/` dan kabari rekan tim agar langsung di-import ulang.
* **Hindari edit file yang sama bersamaan:** Koordinasikan bagian file yang sedang dikerjakan (Frontend di `views/` & `assets/`, Backend di `models/` & `controllers/`) untuk meminimalkan *merge conflict*.
