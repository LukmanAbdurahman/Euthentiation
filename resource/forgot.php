<?php
require 'db.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'] ?? '';
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  if ($stmt->fetch()) {
    $message = "Link reset telah dikirim (simulasi).";
  } else {
    $message = "Email tidak ditemukan.";
  }
}
?>
<!DOCTYPE html>
<html>
<head><title>Lupa Password</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body><div class="container mt-5">
<div class="row justify-content-center"><div class="col-md-6"><h3>Lupa Password</h3>
<?php if ($message): ?><div class="alert alert-info"><?= $message ?></div><?php endif; ?>
<form method="POST"><div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
<button class="btn btn-primary w-100">Kirim Link Reset</button></form>
<a href="login.php">Kembali ke login</a></div></div></div></body></html>