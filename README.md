# 💬 Web Chatbot Project with Authentication & Software Testing

## 📌 Deskripsi Proyek

Proyek ini merupakan **Web Chatbot** interaktif berbasis web yang dilengkapi dengan fitur **autentikasi pengguna**, seperti **Login**, **Register**, dan **Lupa Password**, serta fitur utama berupa **Chatbot berbasis AI sederhana**. Selain itu, proyek ini telah melalui tahap **pengujian perangkat lunak** secara menyeluruh, mencakup **Black Box Testing**, **White Box Testing**, dan **Grey Box Testing**.

---

## 👥 Partisipan Proyek

| Nama                          | Peran                |
|-------------------------------|----------------------|
| Muhammad Lukman Abdurahman    | 👨‍💻 Developer         |
| Yusup Supriyanto              | 🧪 Black Box Tester  |
| Zidan Fajar Abdillah          | ⚙️ White Box Tester  |
| Muhammad Rasyid Shidiq        | 🧩 Grey Box Tester   |

---

## 🚀 Fitur Utama

- ✅ **Login**: Autentikasi aman menggunakan email & password.
- 🆕 **Register**: Registrasi pengguna baru dengan validasi data.
- 🔁 **Lupa Password**: Fitur reset password dengan konfirmasi email.
- 🤖 **Chatbot**: Interaksi tanya-jawab sederhana melalui AI.
- 🔒 **Keamanan**: Terdapat validasi input dan perlindungan terhadap SQL Injection.
- 🔍 **Middleware**: Proteksi akses API untuk mencegah penyalahgunaan.

---

## 🧪 Pengujian Software

### 🔲 1. Black Box Testing (Fungsionalitas)

- Pengujian dilakukan tanpa melihat kode sumber.
- Fokus pada input/output sistem:
  - Validasi login dan register.
  - Respons chatbot terhadap input pengguna.
  - Fungsi lupa password.

### ⚪ 2. White Box Testing (Struktur Kode)

- Pengujian logika backend dan alur kode.
- Fokus pada:
  - Validasi logika fungsi autentikasi.
  - Alur percakapan chatbot.
  - Unit test menggunakan alat bantu debugging.

### 🔳 3. Grey Box Testing (Integrasi & Keamanan)

- Pengujian dengan pemahaman parsial terhadap struktur sistem.
- Fokus pada:
  - Integrasi antar modul.
  - Middleware dan endpoint API.
  - Simulasi potensi eksploitasi (SQL injection, brute force).

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP / Laravel
- **Frontend**: HTML, CSS (Bootstrap), JavaScript
- **Database**: MySQL
- **Testing Tools**: Manual Testing, Postman, Xdebug
---

## 📂 Struktur Direktori Utama

```
├── public/
├── resources/
│   ├── views/
│   └── css/
├── routes/
├── tests/
│   ├── blackbox/
│   ├── whitebox/
│   └── greybox/
├── .env
├── composer.json
└── README.md
```

---

## ⚙️ Cara Menjalankan Proyek

1. **Clone** repositori:
   ```bash
   git clone https://github.com/LukmanAbdurahman/chatbot-project.git
   ```

2. **Masuk ke direktori proyek**:
   ```bash
   cd chatbot-project
   ```

3. **Install dependensi Composer**:
   ```bash
   composer install
   ```

4. **Jalankan server Laravel**:
   ```bash
   php artisan serve
   ```

---

## 📊 Hasil Uji & Dokumentasi

- Dokumentasi hasil pengujian tersedia di folder `tests/`.
- Mencakup:
  - Studi kasus pengguna.
  - Screenshot hasil uji.
  - Catatan debugging dan validasi.

---

## 📃 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## 📞 Kontak

Untuk pertanyaan atau kontribusi, silakan hubungi:  
📧 **lukman.abdurahman@email.com**  
🔗 GitHub: [@username](https://github.com/LukmanAbdurahman)
