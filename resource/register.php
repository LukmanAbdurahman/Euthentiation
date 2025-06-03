<?php
require 'db.php';
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = trim($_POST['username'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (strlen($username) < 3) {
    $message = "Username minimal 3 karakter!";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Email tidak valid!";
  } elseif (strlen($password) < 6) {
    $message = "Password minimal 6 karakter!";
  } else {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    try {
      $stmt->execute([$username, $email, $hash]);
      header("Location: login.php");
      exit;
    } catch (PDOException $e) {
      if ($e->errorInfo[1] == 1062) {
        $message = "Email atau username sudah terdaftar!";
      } else {
        $message = "Terjadi kesalahan, coba lagi.";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register - Sistem Kami</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#343541] min-h-screen flex items-center justify-center text-white">

  <div class="w-full max-w-md bg-[#202123] p-8 rounded-lg shadow-lg">
    <div class="flex flex-col items-center mb-6">
      <img src="logo.png" alt="Logo" class="w-28 h-auto mb-4">
      <h2 class="text-2xl font-bold">Buat Akun Baru</h2>
    </div>

    <?php if (!empty($message)): ?>
      <div class="bg-yellow-500 text-black text-sm p-3 mb-4 rounded">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block font-semibold mb-1">Username</label>
        <input type="text" name="username" required
               class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" required
               class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div>
        <label class="block font-semibold mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full px-4 py-2 rounded bg-gray-800 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <button type="submit"
              class="w-full bg-green-600 hover:bg-green-700 transition-colors py-2 rounded font-semibold">
        Daftar
      </button>
    </form>

    <div class="mt-4 text-center text-sm">
      <a href="login.php" class="text-blue-400 hover:underline">Sudah punya akun? Login di sini</a>
    </div>
  </div>

</body>
</html>
