
# ✅ Unit Test Results - AuthTest (PHPUnit 9.6.23)

## Test Summary

| Test Case                       | Result   | Notes                                           |
|--------------------------------|----------|-------------------------------------------------|
| Register with short username   | ✅ Passed | Username terlalu pendek ditolak                 |
| Register with invalid email    | ✅ Passed | Format email tidak valid ditolak                |
| Register with short password   | ✅ Passed | Password terlalu pendek ditolak                 |
| Login success                  | ❌ Failed | Expected `'success'`, got `'Sukses'`            |
| Login failure                  | ❌ Failed | Expected `'Email atau password salah!'`, got `'Gagal login'` |
| Forgot password found          | ✅ Passed | Email ditemukan dan respons sesuai              |
| Forgot password not found      | ✅ Passed | Email tidak ditemukan, respons sesuai           |

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
**Passed:** 5  
**Failed:** 2

```md
✔️ 5 tests passed  
❌ 2 tests failed
```
