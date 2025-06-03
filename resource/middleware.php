<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$limit = 10;
$interval = 60;
if (!isset($_SESSION['requests'])) $_SESSION['requests'] = [];
$_SESSION['requests'] = array_filter($_SESSION['requests'], fn($t) => $t > time() - $interval);
if (count($_SESSION['requests']) >= $limit) {
  http_response_code(429);
  echo "⚠️ Terlalu banyak permintaan. Silakan coba lagi nanti.";
  exit;
}
$_SESSION['requests'][] = time();
?>