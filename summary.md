**SUMMARY PROJECT**
---

## ✅ 1. BLACK BOX TESTING

**Metode**: Pengujian berdasarkan fungsionalitas tanpa melihat isi kode.

| No | Fitur         | Skenario                                | Input                  | Expected Output                           | Hasil |
| -- | ------------- | --------------------------------------- | ---------------------- | ----------------------------------------- | ----- |
| 1  | Login         | Login dengan data valid                 | Email & Password benar | Redirect ke chatbot atau dashboard        | ✅     |
| 2  | Login         | Data tidak valid                        | Email salah            | Muncul pesan "Email dan Password Salah"                | ✅     |
| 3  | Login         | Data tidak valid                        | Password salah            | Muncul pesan "Email dan Password Salah"                | ✅     |
| 4  | Login         | Login dengan data kosong                 | Form tidak di isi | Muncul pesan keharusan mengisi form       | ✅     |
| 5  | Register      | Registrasi akun baru dengan input valid | Nama, email, password  | Akun dibuat, redirect ke login            | ✅     |
| 6  | Register      | Email sudah digunakan                   | Email ganda            | Pesan error "email telah digunakan"       | ✅     |
| 7  | Register      | Registrasi dengan data kosong            | Form tidak di isi | Muncul pesan keharusan mengisi form       | ✅     |
| 8  | Lupa Password | Email valid dikirimkan untuk reset      | Email valid            | Pesan sukses & link dikirim               | ✅     |
| 9  | Lupa Password | Email tidak terdaftar                   | Email salah            | Pesan error "Email tidak ditemukan"       | ✅     |
| 10  | Chatbot       | Kirim pesan biasa                       | "Halo"                 | Chatbot merespon                          | ✅     |
| 11  | Chatbot       | Kirim pesan kosong                      | ""                     | Chatbot menolak atau abaikan input kosong | ✅     |
| 12 | Logout         | Klik button "Logout"              | Klik                   | Muncul verifikasi & Redirect ke landing page            | X     |
---

## ✅ 2. WHITE BOX TESTING

**Metode**: Pengujian internal dengan memahami struktur kode, dan unit testing.

## Total Tes
**9 tests**, **7 passed**, **2 failed**, **0 errors**

---

## Ringkasan Pengujian

### ✅ Auth Tests (7 total)

| Test Case                          | Status  | Keterangan                                     |
|-----------------------------------|---------|------------------------------------------------|
| Register with short username      | ✅ Pass | Validasi nama pengguna pendek berhasil         |
| Register with invalid email       | ✅ Pass | Validasi email tidak valid berhasil            |
| Register with short password      | ✅ Pass | Validasi password pendek berhasil              |
| Login success                     | ❌ Fail | Expected `'success'`, got `'Sukses'`           |
| Login failure                     | ❌ Fail | Expected `'Email atau password salah!'`, got `'Gagal login'` |
| Forgot password found             | ✅ Pass | Email ditemukan di sistem                      |
| Forgot password not found         | ✅ Pass | Email tidak ditemukan di sistem                |

---

### ✅ Chatbot Tests (2 total)

| Test Case          | Status  | Keterangan                                     |
|--------------------|---------|------------------------------------------------|
| Get reply success  | ✅ Pass | Mendapatkan jawaban dari chatbot        |
| Get reply failure  | ✅ Pass | Input kosong diabaikan      |

---
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

