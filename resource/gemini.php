<?php
$api_key = 'AIzaSyA-12yPK7Ffujmo0Acx0irYsi2U0Vi-jJ4'; // Ganti dengan API key milikmu
$message = $_POST['message'] ?? '';

$data = [
  'contents' => [
    [
      'parts' => [
        ['text' => $message]
      ]
    ]
  ]
];

$url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . $api_key;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Content-Type: application/json'
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'Gagal mendapatkan respon.';
echo nl2br(htmlspecialchars($reply));
