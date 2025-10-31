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
document.getElementById("chatForm").addEventListener("submit", function (event) {
  event.preventDefault();

  const messageInput = document.getElementById("message");
  const message = messageInput.value.trim();
  const chatBody = document.getElementById("chat-body");

  if (message === "") return;

  // Display user's message
  const userMessage = document.createElement("div");
  userMessage.classList.add("chat-message", "user");
  userMessage.innerText = message;
  chatBody.appendChild(userMessage);

  // Add temporary "typing..." message
  const typingMessage = document.createElement("div");
  typingMessage.classList.add("chat-message");
  typingMessage.innerText = "🤖 Typing...";
  chatBody.appendChild(typingMessage);

  // Send message to PHP backend (chat.php)
  fetch("chat.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: new URLSearchParams({ message }),
  })
    .then((response) => response.json())
    .then((data) => {
      // Remove typing message
      typingMessage.remove();

      // Display bot's reply
      const botMessage = document.createElement("div");
      botMessage.classList.add("chat-message");
      botMessage.innerText =
        data.reply || data.response || "⚠️ No reply from chatbot.";
      chatBody.appendChild(botMessage);

      // Auto-scroll to bottom
      chatBody.scrollTop = chatBody.scrollHeight;
    })
    .catch((error) => {
      console.error("Error:", error);
      typingMessage.remove();
      const errorMessage = document.createElement("div");
      errorMessage.classList.add("chat-message");
      errorMessage.innerText = "⚠️ Unable to connect to chatbot.";
      chatBody.appendChild(errorMessage);
    });

  // Clear input
  messageInput.value = "";
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

