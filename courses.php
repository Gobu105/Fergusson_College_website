<?php
$type = isset($_GET['type']) ? $_GET['type'] : 'all';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fergusson College</title>
  <link rel="stylesheet" href="script/styles.css" />
  <script src="script/script.js" defer></script>

  <style>
    html,body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      height:100%;
      display:flex;
      flex-direction:column;	
      background: #fafafa;
      color: #222;
    }

    main {
      padding: 3rem 1.5rem;
      text-align: center;
      max-width: 1100px;
      margin: 0 auto;
      flex:1;
    }

    h2 {
      font-size: 2rem;
      margin-bottom: 1rem;
      color: #002855;
    }

    h3 {
      color: #333;
      margin-bottom: 2rem;
    }

    /* --- Cards --- */
    .stream-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2rem;
    }

    .stream-card {
      flex: 1 1 280px;
      max-width: 300px;
      padding: 2rem;
      border-radius: 18px;
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
    }

    .stream-card:hover {
      transform: translateY(-8px);
    }

    .stream-card h4 {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
    }

    .stream-card p {
      font-size: 0.95rem;
      opacity: 0.95;
    }

    /* Colors */
    .science { background: linear-gradient(135deg, #0077b6, #00b4d8); }
    .commerce { background: linear-gradient(135deg, #ff7f11, #ffb703); }
    .arts { background: linear-gradient(135deg, #6cb709ff, #9aff48ff); }

    /* Info box */
    .course-info {
      margin-top: 2.5rem;
      padding: 2rem;
      background: #ffbfbfff;
      border-radius: 14px;
      box-shadow: 0 6px 16px rgba(0,0,0,0.08);
      text-align: left;
      display: none;
      animation: fadeIn 0.3s ease;
    }

    .course-info.active {
      display: block;
    }

    .course-info h4 {
      color: #002855;
      margin-bottom: 1rem;
    }

    .course-info ul {
      list-style: disc;
      padding-left: 1.5rem;
      line-height: 1.6;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    footer {
      text-align: center;
      padding: 20px;
      background: #1e3a8a;
      color: white;
      border-top: 5px solid #2563eb;
    }
  </style>
</head>
<body>
  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="images/logo.png" alt="Dept Logo" />
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
    <h2>Courses Offered</h2>

    <?php if ($type == 'undergraduate') : ?>
      <h3>Undergraduate Programmes</h3>
      <div class="stream-container">
        <div class="stream-card science" onclick="showCourses('scienceUG')">
          <h4>Science</h4>
          <p>Explore B.Sc. programs designed to inspire scientific curiosity and research.</p>
        </div>
        <div class="stream-card commerce" onclick="showCourses('commerceUG')">
          <h4>Commerce</h4>
          <p>Gain analytical and entrepreneurial skills with our B.Com. and BBA programs.</p>
        </div>
        <div class="stream-card arts" onclick="showCourses('artsUG')">
          <h4>Arts</h4>
          <p>Delve into humanities and social sciences with our diverse B.A. programs.</p>
        </div>
      </div>

      <div id="courseInfo" class="course-info"></div>

    <?php elseif ($type == 'postgraduate') : ?>
      <h3>Postgraduate Programmes</h3>
      <div class="stream-container">
        <div class="stream-card science" onclick="showCourses('sciencePG')">
          <h4>Science</h4>
          <p>Advanced M.Sc. programs fostering research and innovation.</p>
        </div>
        <div class="stream-card commerce" onclick="showCourses('commercePG')">
          <h4>Commerce</h4>
          <p>Postgraduate programs designed for business leaders of tomorrow.</p>
        </div>
        <div class="stream-card arts" onclick="showCourses('artsPG')">
          <h4>Arts</h4>
          <p>Comprehensive M.A. programs across languages and social sciences.</p>
        </div>
      </div>

      <div id="courseInfo" class="course-info"></div>

    <?php elseif ($type == 'doctoral') : ?>
      <h3>Doctoral Programmes (Ph.D)</h3>
      <div class="stream-container">
        <div class="stream-card science" onclick="showCourses('sciencePhD')">
          <h4>Science</h4>
          <p>Engage in research and innovation in diverse scientific fields.</p>
        </div>
        <div class="stream-card commerce" onclick="showCourses('commercePhD')">
          <h4>Commerce</h4>
          <p>Pursue Ph.D. programs in commerce and business studies.</p>
        </div>
        <div class="stream-card arts" onclick="showCourses('artsPhD')">
          <h4>Arts</h4>
          <p>Research-oriented Ph.D. programs in arts and humanities.</p>
        </div>
      </div>

      <div id="courseInfo" class="course-info"></div>

    <?php elseif ($type == 'diploma') : ?>
      <h3>Diploma Programmes</h3>
      <div class="stream-container">
        <div class="stream-card science" onclick="showCourses('scienceDiploma')">
          <h4>Science</h4>
          <p>Skill-focused diplomas in science and technology disciplines.</p>
        </div>
        <div class="stream-card commerce" onclick="showCourses('commerceDiploma')">
          <h4>Commerce</h4>
          <p>Business-oriented diploma programs for career-ready professionals.</p>
        </div>
        <div class="stream-card arts" onclick="showCourses('artsDiploma')">
          <h4>Arts</h4>
          <p>Practical and creative diploma programs in arts and media.</p>
        </div>
      </div>

      <div id="courseInfo" class="course-info"></div>

    <?php else : ?>
      <p>Please select a course category to explore.</p>
    <?php endif; ?>
  </main>

  <script>
    const courseData = {
      scienceUG: {
        title: "Undergraduate Science Courses",
        list: [
          "B.Sc. Computer Science",
          "B.Sc. Physics",
          "B.Sc. Chemistry",
          "B.Sc. Mathematics",
          "B.Sc. Electronics",
          "B.Sc. Microbiology",
          "B.Sc. Biotechnology"
        ]
      },
      commerceUG: {
        title: "Undergraduate Commerce Courses",
        list: [
          "B.Com. General",
          "B.Com. Banking & Finance",
          "BBA (Computer Applications)",
          "BBA (International Business)"
        ]
      },
      artsUG: {
        title: "Undergraduate Arts Courses",
        list: [
          "B.A. English",
          "B.A. Economics",
          "B.A. Psychology",
          "B.A. Sociology",
          "B.A. Political Science",
          "B.A. History"
        ]
      },
      sciencePG: {
        title: "Postgraduate Science Courses",
        list: [
          "M.Sc. Computer Science",
          "M.Sc. Data Science",
          "M.Sc. Physics",
          "M.Sc. Chemistry",
          "M.Sc. Biotechnology",
          "M.Sc. Microbiology"
        ]
      },
      commercePG: {
        title: "Postgraduate Commerce Courses",
        list: [
          "M.Com. Advanced Accountancy",
          "M.Com. Business Administration",
          "MBA (Financial Management)"
        ]
      },
      artsPG: {
        title: "Postgraduate Arts Courses",
        list: [
          "M.A. English",
          "M.A. Economics",
          "M.A. Psychology",
          "M.A. Sociology",
          "M.A. History"
        ]
      },
      sciencePhD: {
        title: "Science Ph.D. Programmes",
        list: [
          "Ph.D. Computer Science",
          "Ph.D. Physics",
          "Ph.D. Chemistry",
          "Ph.D. Biotechnology"
        ]
      },
      commercePhD: {
        title: "Commerce Ph.D. Programmes",
        list: [
          "Ph.D. Commerce",
          "Ph.D. Business Economics"
        ]
      },
      artsPhD: {
        title: "Arts Ph.D. Programmes",
        list: [
          "Ph.D. English",
          "Ph.D. Economics",
          "Ph.D. Psychology",
          "Ph.D. Political Science"
        ]
      },
      scienceDiploma: {
        title: "Science Diplomas",
        list: [
          "Diploma in Data Analytics",
          "Diploma in Computer Applications",
          "Diploma in Biotechnology Techniques"
        ]
      },
      commerceDiploma: {
        title: "Commerce Diplomas",
        list: [
          "Diploma in Business Management",
          "Diploma in Banking Operations",
          "Diploma in Accounting"
        ]
      },
      artsDiploma: {
        title: "Arts Diplomas",
        list: [
          "Diploma in Communication Skills",
          "Diploma in Journalism",
          "Diploma in Psychology & Counselling"
        ]
      }
    };

    function showCourses(type) {
      const info = document.getElementById('courseInfo');
      const data = courseData[type];
      if (data) {
        info.innerHTML = `
          <h4>${data.title}</h4>
          <ul>${data.list.map(c => `<li>${c}</li>`).join('')}</ul>
        `;
        info.classList.add('active');
      }
    }

    // Hide info when clicked outside
    document.addEventListener('click', e => {
      if (!e.target.closest('.stream-card') && !e.target.closest('#courseInfo')) {
        document.getElementById('courseInfo').classList.remove('active');
      }
    });
  </script>

  <!-- Floating Chat Button -->
  <button class="chat-btn" onclick="toggleChat()">
    <span class="chat-icon">💬</span>
  </button>

 <!-- Chat Section -->
<div class="chat-container" id="chatContainer">
  <div class="chat-header">
    Chat with Us
  </div>

  <div class="chat-body" id="chat-body">
    <div class="chat-message">👋 Hello! How can I help you today?</div>
  </div>

  <div class="chat-footer" id="chatFooter">
    <form id="chatForm" style="display:flex; width:100%;">
      <input
        type="text"
        name="message"
        id="message"
        placeholder="Type your question..."
        autocomplete="off"
        required
      />
      <button type="submit">Send</button>
    </form>
  </div>
</div>
  <!-- FOOTER -->
  <footer>
    &copy; <?php echo date("Y"); ?> Fergusson College | All Rights Reserved.
  </footer>
  <script src="script.js"></script> <!-- Link to JavaScript file -->
</body>

</html>
