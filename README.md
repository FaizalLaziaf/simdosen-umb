# SIM Dosen UM Bengkulu
Demo hosting: https://simdosentgs.gt.tc/
Web PHP native + MySQL (database `simdosen`) + REST API.

## Instalasi (InfinityFree)
1. Buat database di MySQL Databases, lalu import `sql/simdosen.sql` via phpMyAdmin (pilih database dulu).
2. Salin `config/db.example.php` menjadi `config/db.local.php` dan isi kredensial (file ini di-gitignore).
3. Upload semua file ke `htdocs/`.

Akun demo: admin/admin123, operator/operator123, viewer/viewer123 (segera ganti).

## RBAC
admin: semua | operator: CRUD dosen + laporan | viewer: lihat dosen + laporan

## API (header `X-API-KEY`)
- (alternatif: tambahkan `?api_key=...` di URL)
- `POST /api/auth.php` body JSON `{"username","password"}` -> api_key
- `GET /api/dosen.php` (opsional `?q=` / `?id=`), `POST`, `PUT ?id=`, `DELETE ?id=` (tulis: admin/operator)
- `GET /api/master.php?t=jabatan_fungsional` (tabel: jabatan_fungsional, kepangkatan, pendidikan, rumpun_ilmu, status_serdos, status_pegawai, ikatan_kerja, status_aktivitas, penempatan, fakultas, prodi)

Contoh: `curl -H "X-API-KEY: <key>" https://domain-anda/api/dosen.php`
