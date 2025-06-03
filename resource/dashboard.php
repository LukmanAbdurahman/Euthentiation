<!DOCTYPE html>
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
    body {
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .typing-dots::after {
      content: '';
      display: inline-block;
      animation: dots 1.5s steps(3, end) infinite;
    }

    @keyframes dots {
      0% { content: ''; }
      33% { content: '.'; }
      66% { content: '..'; }
      100% { content: '...'; }
    }
  </style>
</head>
<body class="bg-[#202123] text-white min-h-screen flex flex-col">
  <!-- Header -->
  <header class="flex items-center justify-between px-4 py-3 border-b border-gray-700">
    <div class="flex items-center space-x-2">
        <span>ChatBot</span>
    </div>
    <nav class="flex items-center space-x-3">
      <button 
        class="bg-white text-black text-sm font-normal rounded-full px-4 py-1 hover:bg-gray-200 focus:outline-none"
        onclick="window.location.href='login.php'"
        >Log Out</button>
    </nav>
  </header>

  <!-- Chat container -->
  <main class="flex-1 overflow-y-auto px-10 py-6 " id="chat-box"></main>

  <!-- Input area -->
  <form class="flex items-center justify-between px-8 py-4 border-t border-gray-700 max-w-4xl mx-auto w-full" autocomplete="off" id="chat-form">
    <input
      id="message"
      type="text"
      placeholder="Ask Anything"
      class="flex-1 bg-[#343541] rounded-lg text-white text-sm px-4 py-3 placeholder-gray-400 focus:outline-none"
    />
    <button
      type="submit"
      aria-label="Send"
      class="ml-4 bg-white text-black rounded-full p-3 hover:bg-gray-200 transition-colors"
    >
      <svg
        stroke="currentColor"
        fill="none"
        stroke-width="2"
        viewBox="0 0 24 24"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="h-5 w-5"
        xmlns="http://www.w3.org/2000/svg"
      >
        <line x1="22" y1="2" x2="11" y2="13"></line>
        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
      </svg>
    </button>
  </form>

  <script>
    const form = document.getElementById('chat-form');
    const messageInput = document.getElementById('message');
    const chatBox = document.getElementById('chat-box');
    let typingIndicator;

    function appendMessage(sender, text) {
  const bubble = document.createElement('div');
  bubble.classList.add('mb-4', 'flex', sender === 'user' ? 'justify-end' : 'justify-start');

  const bubbleClass =
    sender === 'user'
      ? 'max-w-fit bg-[#343541] rounded-br-none'
      : 'w-[80%] bg-[#202123] rounded-bl-none';

  bubble.innerHTML = `
    <div class="${bubbleClass} px-4 py-3 rounded-xl text-white text-sm leading-relaxed">
      ${text}
    </div>
  `;

  chatBox.appendChild(bubble);
  chatBox.scrollTop = chatBox.scrollHeight;
}


    function showTyping() {
      typingIndicator = document.createElement('div');
      typingIndicator.classList.add('mb-4', 'flex', 'justify-start');
      typingIndicator.innerHTML = `
        <div class="max-w-md px-4 py-3 rounded-xl bg-[#444654] text-white text-sm leading-relaxed">
          <span class="typing-dots">Mengetik</span>
        </div>
      `;
      chatBox.appendChild(typingIndicator);
      chatBox.scrollTop = chatBox.scrollHeight;
    }

    function removeTyping() {
      if (typingIndicator) {
        typingIndicator.remove();
        typingIndicator = null;
      }
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const userMessage = messageInput.value.trim();
      if (!userMessage) return;

      appendMessage('user', userMessage);
      messageInput.value = '';

      showTyping(); // tampilkan loading mengetik

      const formData = new FormData();
      formData.append('message', userMessage);

      try {
        const response = await fetch('gemini.php', {
          method: 'POST',
          body: formData
        });

        const reply = await response.text();
        removeTyping(); // hapus efek loading
        appendMessage('bot', reply);
      } catch (error) {
        removeTyping();
        appendMessage('bot', '⚠️ Terjadi kesalahan saat memuat jawaban.');
      }
    });
  </script>
</body>
</html>
