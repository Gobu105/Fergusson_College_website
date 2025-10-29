// ---------- Footer Scroll Hide/Show ----------
let lastScrollY = window.scrollY;
const footer = document.getElementById('footer');

window.addEventListener('scroll', () => {
    if (window.scrollY > lastScrollY) {
        // Scrolling down → show footer
        footer.classList.add('show');
    } else {
        // Scrolling up → hide footer
        footer.classList.remove('show');
    }
    lastScrollY = window.scrollY;
})

// Toggle chat window
function toggleChat() {
    var chatContainer = document.getElementById('chatContainer');
    chatContainer.style.display = chatContainer.style.display === "none" || chatContainer.style.display === "" ? "flex" : "none";
}

// Show register form
function showRegister() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'flex';
}

// Show login form
function showLogin() {
    document.getElementById('registerForm').style.display = 'none';
    document.getElementById('loginForm').style.display = 'flex';
}

//L ogin function
function login() {
    var rno = document.getElementById('loginRno').value;
    var password = document.getElementById('loginPassword').value;

    // Send AJAX request to login.php
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'r_no': rno,
            'password': password
        })
    })
        .then(response => response.text())
        .then(data => {
            if (data.includes("Login successful")) {
                document.getElementById('authSection').style.display = 'none';
                document.getElementById('chatSection').style.display = 'block';
                document.getElementById('chatFooter').style.display = 'flex'; // Show chat input
                document.getElementById('message').focus();
            } else {
                alert(data); // Show the server response (error message)
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("An error occurred. Please try again.");
        });
}



// Register function
function register() {
    var rno = document.getElementById('registerRno').value;
    var firstName = document.getElementById('registerFirstName').value;
    var lastName = document.getElementById('registerLastName').value;
    var password = document.getElementById('registerPassword').value;

    // Send AJAX request to register.php
    fetch('register.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'r_no': rno,
            'firstname': firstName,
            'lastname': lastName,
            'password': password
        })
    })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show the server response
            if (data.includes("Registration successful")) {
                showLogin(); // Show the login form
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("An error occurred. Please try again.");
        });
}

// Prevent form submission from refreshing the page
// Modify chat form submission
document.getElementById('chatForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Stop the form from refreshing the page

    // Get the input message
    var messageInput = document.getElementById('message');
    var message = messageInput.value.trim(); // Trim leading/trailing whitespace

    if (message !== "") {
        // Add the user's message to the chat body
        var chatBody = document.getElementById('chat-body');
        var userMessage = document.createElement('div');
        userMessage.classList.add('chat-message', 'user');
        userMessage.innerText = message;
        chatBody.appendChild(userMessage);

        // Send the user's message to chat.php
        fetch('chat.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'message': message
            })
        })
            .then(response => response.text())
            .then(data => {
                // Add the chatbot's response to the chat body
                var botMessage = document.createElement('div');
                botMessage.classList.add('chat-message');
                botMessage.innerText = data;
                chatBody.appendChild(botMessage);

                // Auto-scroll to the bottom of the chat
                chatBody.scrollTop = chatBody.scrollHeight;
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while sending your message.");
            });

        // Clear the input field
        messageInput.value = '';
    }
});

document.getElementById('facultySearch').addEventListener('input', function() {
  const searchValue = this.value.toLowerCase();
  document.querySelectorAll('.faculty-card').forEach(card => {
    const text = card.textContent.toLowerCase();
    card.style.display = text.includes(searchValue) ? 'block' : 'none';
  });
});

