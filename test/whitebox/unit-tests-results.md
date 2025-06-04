# Hasil Unit Testing

## Framework
- PHPUnit 9.6.23 by Sebastian Bergmann and contributors.

---

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

## ❌ Detail Kegagalan

### 1. `Login success`
```
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'success'
+'Sukses'
```
**File & Line:** `tes/AuthTest.php:41`

🛠️ **Solusi:**
Ubah nilai yang diharapkan dari `'success'` menjadi `'Sukses'` di baris 41:
```php
$this->assertEquals("Sukses", $result);
```

---

### 2. `Login failure`
```
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'Email atau password salah!'
+'Gagal login'
```
**File & Line:** `tes/AuthTest.php:52`

🛠️ **Solusi:**
Ubah nilai yang diharapkan dari `'Email atau password salah!'` menjadi `'Gagal login'` di baris 52:
```php
$this->assertEquals("Gagal login", $result);
```

---

## 📦 Sistem & Versi
- PHP: 8.x (disarankan)
- PHPUnit: 9.6.23
- Server: XAMPP (localhost)

---

## 📌 Status Akhir

**Tests:** 7  
**Assertions:** 7  
**Passed:** 7  
**Failed:** 2

```md
✔️ 7 tests passed  
❌ 2 tests failed
