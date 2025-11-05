// ---------- Footer Scroll Hide/Show ----------
let lastScrollY = window.scrollY;
const footer = document.getElementById("footer");

window.addEventListener("scroll", () => {
  if (window.scrollY > lastScrollY) {
    // Scrolling down → show footer
    footer.classList.add("show");
  } else {
    // Scrolling up → hide footer
    footer.classList.remove("show");
  }
  lastScrollY = window.scrollY;
});

// ---------- Toggle Chat Window ----------
function toggleChat() {
  const chatContainer = document.getElementById("chatContainer");
  chatContainer.style.display =
    chatContainer.style.display === "none" || chatContainer.style.display === ""
      ? "flex"
      : "none";
}

// ---------- Chatbot Functionality ----------
function scrollToBottom() {
  const chatBody = document.getElementById('chat-body');
  chatBody.scrollTo({ top: chatBody.scrollHeight, behavior: 'smooth' });
}

document.getElementById('chatForm').addEventListener('submit', function (event) {
  event.preventDefault();

  const messageInput = document.getElementById('message');
  const message = messageInput.value.trim();
  const chatBody = document.getElementById('chat-body');

  if (message === "") return;

  // Display user's message
  const userMessage = document.createElement('div');
  userMessage.classList.add('chat-message', 'user');
  userMessage.innerText = message;
  chatBody.appendChild(userMessage);

  // Send message to PHP backend (chat.php)
  fetch('chat.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
  body: new URLSearchParams({ message })
})
  .then(response => response.text())  // <-- CHANGED from .json()
  .then(data => {
    const botMessage = document.createElement('div');
    botMessage.classList.add('chat-message', 'bot');
    botMessage.innerText = data;
    chatBody.appendChild(botMessage);
    scrollToBottom();
  })
    .catch(error => {
      console.error('Error:', error);
      const errorMessage = document.createElement('div');
      errorMessage.classList.add('chat-message', 'bot');
      errorMessage.innerText = "⚠️ Unable to connect to chatbot.";
      chatBody.appendChild(errorMessage);
    });

  // Clear input
  messageInput.value = '';
});


// ---------- Faculty Search ----------
const facultySearch = document.getElementById("facultySearch");
if (facultySearch) {
  facultySearch.addEventListener("input", function () {
    const searchValue = this.value.toLowerCase();
    document.querySelectorAll(".faculty-card").forEach((card) => {
      const text = card.textContent.toLowerCase();
      card.style.display = text.includes(searchValue) ? "block" : "none";
    });
  });
}

/* ---------- Faculty tap-to-flip for mobile (add near your existing faculty logic) ---------- */
document.querySelectorAll('.faculty-card').forEach(card => {
  // allow tap to flip on touch devices
  card.addEventListener('click', (e) => {
    const inner = card.querySelector('.faculty-inner');
    if (!inner) return;
    inner.classList.toggle('is-flipped');
  });
});

/* ---------- Ensure chat autoscroll when opening chat and after receiving bot reply ---------- */
function scrollToBottom() {
  const chatBody = document.getElementById('chat-body');
  if (!chatBody) return;
  // short delay ensures new element has rendered
  setTimeout(() => chatBody.scrollTo({ top: chatBody.scrollHeight, behavior: 'smooth' }), 40);
}

// call scrollToBottom() after you append user message and after appending bot message
// and also call when chat is toggled open:
function toggleChat() {
  const chatContainer = document.getElementById('chatContainer');
  chatContainer.style.display =
    chatContainer.style.display === "none" || chatContainer.style.display === ""
      ? "flex"
      : "none";
  if (chatContainer.style.display === 'flex') scrollToBottom();
}

