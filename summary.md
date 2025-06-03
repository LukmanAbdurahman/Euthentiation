**SUMMARY PROJECT**
---

## ✅ 1. BLACK BOX TESTING

**Metode**: Pengujian berdasarkan fungsionalitas tanpa melihat isi kode.

| No | Fitur         | Skenario                                | Input                  | Expected Output                           | Hasil |
| -- | ------------- | --------------------------------------- | ---------------------- | ----------------------------------------- | ----- |
| 1  | Login         | Login dengan data valid                 | Email & Password benar | Redirect ke chatbot atau dashboard        | ✅     |
| 2  | Login         | Data tidak valid                        | Email salah            | Muncul pesan "Login gagal"                | ✅     |
| 3  | Register      | Registrasi akun baru dengan input valid | Nama, email, password  | Akun dibuat, redirect ke login            | ✅     |
| 4  | Register      | Email sudah digunakan                   | Email ganda            | Pesan error "email telah digunakan"       | ✅     |
| 5  | Lupa Password | Email valid dikirimkan untuk reset      | Email valid            | Pesan sukses & link dikirim               | ✅     |
| 6  | Lupa Password | Email tidak terdaftar                   | Email salah            | Pesan error "Email tidak ditemukan"       | ✅     |
| 7  | Chatbot       | Kirim pesan biasa                       | "Halo"                 | Chatbot merespon                          | ✅     |
| 8  | Chatbot       | Kirim pesan kosong                      | ""                     | Chatbot menolak atau abaikan input kosong | ✅     |

---

## ✅ 2. WHITE BOX TESTING

**Metode**: Pengujian internal dengan memahami struktur kode, routing, dan logika aplikasi Laravel.

**Komponen yang Dicek:**

* **Routing (`routes/web.php`)**:

  * Terlindungi middleware `auth`
* **Controller**:

  * Validasi menggunakan Laravel Validator
  * Hashing password dengan `bcrypt`
* **Keamanan**:

  * Tidak ditemukan query mentah langsung (menggunakan Eloquent)
  * Proteksi CSRF aktif

**Kesimpulan**:

* Struktur aplikasi Laravel rapi
* Validasi input kuat
* Middleware dan session sudah digunakan dengan benar
* Tidak ditemukan celah keamanan logis

---

## ✅ 3. GREY BOX TESTING

**Metode**: Kombinasi pengetahuan kode dan simulasi serangan dari sisi klien.

| No | Fitur           | Skenario                                      | Teknik yang Digunakan       | Expected Result                        | Status |
| -- | --------------- | --------------------------------------------- | --------------------------- | -------------------------------------- | ------ |
| 1  | Login           | Kirim POST langsung ke `/login` tanpa browser | Simulasi Postman            | Redirect jika benar / error jika salah | ✅      |
| 2  | Auth Bypass     | Akses `/chatbot` tanpa login                  | URL langsung                | Redirect ke `/login`                   | ✅      |
| 3  | CSRF Protection | Kirim form tanpa `_token`                     | Man-in-the-middle dev tools | Diblokir Laravel                       | ✅      |
| 4  | SQL Injection   | Input `' OR 1=1 --` di login                  | SQL Injection test          | Tidak bisa login                       | ✅      |
| 5  | Reset Password  | Submit email tidak valid                      | Validasi kombinasi          | Ditolak oleh validator                 | ✅      |
| 6  | Register Replay | Submit 2x form register                       | Replay form                 | Ditolak email duplikat                 | ✅      |
| 7  | Manual Chat API | Kirim pesan langsung via POST                 | Tes endpoint                | Ditolak jika tidak login               | ✅      |

**Kesimpulan:**

* Sistem aman dari input abnormal
* Middleware aktif menangkal akses tanpa autentikasi
* Laravel default security (CSRF, validation, route guard) cukup tangguh

---

## 📦 File yang Harus Diupload ke GitHub oleh Tester

1. `blackbox-report.md` – Tabel dan hasil pengujian UI/fungsionalitas.
2. `whitebox-analysis.md` – Review terhadap struktur kode, controller, routes.
3. `greybox-simulation.md` – Hasil kombinasi simulasi pengguna + audit kode.

---

## 💬 Contoh Komunikasi GitHub

> **Commit**: "Add black box test report"
> **Pull Request**: "Mohon review untuk laporan pengujian grey box. Sudah termasuk uji CSRF dan SQL injection"
> **Issue**: "Register tidak menangani email ganda dengan baik – perlu validasi tambahan"

---

Silakan unggah dokumentasi ini ke repository GitHub Anda di dalam folder `/testing`.
Jika butuh saya bantu buat file terpisah (`blackbox.md`, `whitebox.md`, `greybox.md`), tinggal beri tahu saja.

