PHPUnit 9.6.23 by Sebastian Bergmann and contributors.

Auth
 Γ£ö Register with short username
 Γ£ö Register with invalid email
 Γ£ö Register with short password
 Γ£ÿ Login success
   Γöé
   Γöé Failed asserting that two strings are equal.
   Γöé --- Expected
   Γöé +++ Actual
   Γöé @@ @@
   Γöé -'success'
   Γöé +'Sukses'
   Γöé
   Γöé C:\xampp\htdocs\chatbotv2\tes\AuthTest.php:41
   Γöé

 Γ£ÿ Login failure
   Γöé
   Γöé Failed asserting that two strings are equal.
   Γöé --- Expected
   Γöé +++ Actual
   Γöé @@ @@
   Γöé -'Email atau password salah!'
   Γöé +'Gagal login'
   Γöé
   Γöé C:\xampp\htdocs\chatbotv2\tes\AuthTest.php:52
   Γöé

 Γ£ö Forgot password found
 Γ£ö Forgot password not found

Time: 00:00.232, Memory: 6.00 MB

Summary of non-successful tests:

Auth
 Γ£ÿ Login success
   Γöé
   Γöé Failed asserting that two strings are equal.
   Γöé --- Expected
   Γöé +++ Actual
   Γöé @@ @@
   Γöé -'success'
   Γöé +'Sukses'
   Γöé
   Γöé C:\xampp\htdocs\chatbotv2\tes\AuthTest.php:41
   Γöé

 Γ£ÿ Login failure
   Γöé
   Γöé Failed asserting that two strings are equal.
   Γöé --- Expected
   Γöé +++ Actual
   Γöé @@ @@
   Γöé -'Email atau password salah!'
   Γöé +'Gagal login'
   Γöé
   Γöé C:\xampp\htdocs\chatbotv2\tes\AuthTest.php:52
   Γöé

FAILURES!
Tests: 7, Assertions: 7, Failures: 2.

