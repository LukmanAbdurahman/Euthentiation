<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ChatGPT Clone</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <style>
    /* Custom font for the page */
    body {
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
  </style>
</head>
<body class="bg-[#202123] text-white min-h-screen flex flex-col">
  <main class="flex-grow flex flex-col items-center justify-center px-4 text-center max-w-4xl mx-auto">
    <h1 class="text-white text-lg font-medium mb-6">Halo, Ada yang bisa saya bantu?</h1>
    <nav class="flex items-center space-x-3">
      <button
        onclick="window.location.href='login.php'"
        class="bg-black text-white font-semibold text-sm rounded-full px-4 py-1 border border-white hover:bg-white hover:text-black focus:outline-none"
      >
        Log in
      </button>
      <button
        onclick="window.location.href='register.php'"
        class="bg-black text-white font-semibold text-sm rounded-full px-4 py-1 border border-white hover:bg-white hover:text-black focus:outline-none"
      >
        Sign up
      </button>
    </nav>
  </main>

  <footer class="text-center text-xs text-gray-400 py-4 px-4 border-t border-gray-700 max-w-4xl mx-auto">
    This website made with love.
  </footer>
</body>
</html>