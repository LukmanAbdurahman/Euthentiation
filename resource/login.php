<?php
require 'db.php';
session_start();
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['email'];
    header("Location: dashboard.php");
    exit;
  } else {
    $message = "Email atau password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistem Kami</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
    /* Custom font for the page */
    body {
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
  </style>
</head>
<body class="bg-[#343541] min-h-screen flex items-center justify-center">

  <div class="bg-[#202123] w-full max-w-md rounded-2xl shadow-lg p-8">
    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <img src="logo.png" alt="Logo" class="h-16">
    </div>

    <h2 class="text-center text-2xl font-bold text-white mb-6">Login ke Akun Anda</h2>

    <?php if (!empty($message)): ?>
      <div class="bg-red-100 text-red-700 text-sm px-4 py-3 rounded mb-4">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-white mb-1">Email</label>
        <input type="email" name="email" required
               class="w-full px-4 py-2 border rounded-md text-sm border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>
      <div>
        <label class="block text-sm font-medium text-white mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full px-4 py-2 border rounded-md text-sm border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500">
      </div>
      <button type="submit"
              class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-md text-sm font-medium transition duration-200">
        Login
      </button>
    </form>

    <div class="text-center text-sm text-gray-600 mt-4">
      <a href="forgot.php" class="hover:underline text-green-600">Lupa password?</a>
      <span class="mx-2">|</span>
      <a href="register.php" class="hover:underline text-green-600">Buat akun baru</a>
    </div>
  </div>

</body>
</html>
