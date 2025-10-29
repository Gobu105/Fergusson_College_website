<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fergusson College</title>
  <link rel="stylesheet" href="script/styles.css">
  <script src="script/script.js" defer></script>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="images/logo.png" alt="Dept Logo">
    </div>
    <nav>
      <a href="index.php#home">Home</a>
      <a href="index.php#about-section">About</a>
      <a href="index.php#courses">Courses</a>
      <a href="index.php#faculty">Faculty</a>
      <a href="index.php#labs">Infrastructure</a>
      <a href="index.php#events">Events</a>
      <a href="index.php#reviews">Reviews</a>
    </nav>
  </header>
  <main>
    <section>
      <h2>Courses Offered</h2>
      <p>We offer the following undergraduate and postgraduate programs:</p><br>
      <ul>
        <li>Bachelor of Computer Science (BSc.Cs)</li>
        <li>Master of Computer Science (MSc.CS)</li>
        <li>Bachelor of Computer Application Science (BSc.CA)</li>
        <li>Master of Computer Application (MSC.CA)</li>
      </ul>
    </section>
  </main>


  <!-- Floating Chat Button -->
  <button class="chat-btn" onclick="toggleChat()">
    <span class="chat-icon">💬</span>
  </button>

  <!-- Chat Section -->
  <!-- chat.html -->
  <div class="chat-container" id="chatContainer">
    <div class="chat-header">
      Chat with Us
    </div>
    <div class="chat-body" id="chat-body">
      <!-- Initially show login form -->
      <div id="authSection">
        <h3>Login</h3>
        <div class="auth-container" id="loginForm">
          <input type="text" id="loginRno" placeholder="Registration Number" required>
          <input type="password" id="loginPassword" placeholder="Password" required>
          <button onclick="login()">Login</button>
          <p>Don't have an account? <a href="#" onclick="showRegister()">Register</a></p>
        </div>

        <div class="auth-container" id="registerForm" style="display: none;">
          <h3>Register</h3>
          <input type="text" id="registerRno" placeholder="Registration Number (10 digits)" pattern="\d{10}" required>
          <input type="text" id="registerFirstName" placeholder="First Name" required>
          <input type="text" id="registerLastName" placeholder="Last Name" required>
          <input type="password" id="registerPassword" placeholder="Password" required>
          <button onclick="register()">Register</button>
          <p>Already have an account? <a href="#" onclick="showLogin()">Login</a></p>
        </div>
      </div>

      <!-- Chat messages will be appended here after login -->
      <div id="chatSection" style="display: none;">
        <div class="chat-message">Hello! How can we help you?</div>
      </div>
    </div>

    <div class="chat-footer" id="chatFooter" style="display: none;">
      <form id="chatForm" style="display: flex; width: 100%;">
        <input type="text" name="message" id="message" placeholder="Type a message..." autocomplete="off">
        <button type="submit">Send</button>
      </form>
    </div>
  </div>


  <script src="script.js"></script> <!-- Link to JavaScript file -->
</body>

</html>
