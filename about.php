<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Fergusson College</title>
  <link href="script/styles.css" rel="stylesheet">
  <style>
    /* ---------- ABOUT SECTION ---------- */
    .about-title {
      font-size: 2.4rem;
      color: #2563eb;
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      position: relative;
    }

    .about-title::after {
      content: "";
      width: 80px;
      height: 4px;
      background: #2563eb;
      display: block;
      margin: 10px auto 0;
      border-radius: 5px;
    }

    .about-intro p {
      text-align: left;
      font-size: 1.1rem;
      margin-bottom: 50px;
      color: #334155;
      max-width: 1000px;
      margin-left: auto;
      margin-right: auto;
    }

    .about-grid {
      display: flex;
      align-items: center;
      gap: 50px;
      flex-wrap: wrap;
      margin-bottom: 60px;
    }

    .about-text {
      flex: 1 1 50%;
    }

    .about-text h3 {
      color: #1d4ed8;
      margin-bottom: 10px;
    }

    .about-img {
      flex: 1 1 40%;
    }

    .about-img img {
      width: 100%;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }

    .about-img img:hover {
      transform: scale(1.03);
    }

    /* ---------- SIDE-BY-SIDE SECTION ---------- */
    .about-duo {
      display: flex;
      flex-wrap: wrap;
      gap: 50px;
      margin-bottom: 60px;
    }

    .about-founders,
    .about-legacy {
      flex: 1 1 45%;
      background: #f8fafc;
      padding: 25px 30px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .about-founders h3,
    .about-legacy h3 {
      color: #1d4ed8;
      margin-bottom: 10px;
    }

    .about-founders p,
    .about-legacy p {
      color: #334155;
      line-height: 1.6;
    }

    /* ---------- LANDMARKS & CAMPUS ---------- */
    .about-landmarks {
      margin-bottom: 50px;
    }

    .about-landmarks h3,
    .about-campus h3 {
      color: #1d4ed8;
      margin-bottom: 10px;
    }

    .about-landmarks ul {
      list-style: none;
      padding-left: 0;
    }

    .about-landmarks li {
      background: #fff;
      margin: 8px 0;
      padding: 12px 18px;
      border-left: 4px solid #2563eb;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }

    .about-campus p {
      background: #e0ecff;
      padding: 20px;
      border-radius: 12px;
      color: #1e293b;
    }

    /* ---------- FOOTER ---------- */
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

  <!-- ABOUT SECTION -->
  <section id="about-page" class="about-page">
    <h2 class="about-title">About Fergusson College</h2>

    <div class="about-intro">
      <p>
        Established in 1885, <strong>Fergusson College</strong> stands as one of India’s most prestigious institutions — a symbol of intellectual heritage and national pride. Born during the Indian renaissance, the college was envisioned by the founders of the <strong>Deccan Education Society</strong> to shape young minds through education rooted in freedom, reform, and knowledge.
      </p>
    </div>

    <div class="about-grid">
      <div class="about-text">
        <h3>🏛️ Historical Background</h3>
        <p>
          After the decline of the East India Company and the uprising of 1857, India entered a new phase — one where education became the key to social transformation. Fergusson College emerged from this movement, founded by the pioneers of Indian education and nationalism.
        </p>
        <p>
          The college began its journey in 1885, holding classes in Gadre Wada, Pune. In 1892, the foundation stone of its majestic Main Building was laid, and by 1895, Fergusson College had a permanent home on its 37-acre campus — a true landmark of India’s educational renaissance.
        </p>
      </div>
      <div class="about-img">
        <img src="images/college.jpg" alt="Fergusson College Main Building">
      </div>
    </div>

    <!-- FOUNDERS + LEGACY SIDE BY SIDE -->
    <div class="about-duo">
      <div class="about-founders">
        <h3>✨ Our Founders</h3>
        <p>
          Fergusson College owes its existence to the visionaries of the <strong>Deccan Education Society</strong> — Vaman Shivram Apte, Bal Gangadhar Tilak, Vishnushastri Chiplunkar, Mahadeo Ballal Namjoshi, and Gopal Ganesh Agarkar — with <strong>Sir James Fergusson</strong>, then Governor of Bombay, as the first patron.
        </p>
        <p>
          These stalwarts believed in the motto <em>“Knowledge is Power”</em>, symbolized by the Garuda in the college emblem — representing the youth soaring into a vast sky of opportunities.
        </p>
      </div>

      <div class="about-legacy">
        <h3>🎓 A Legacy of Excellence</h3>
        <p>
          For over a century, Fergusson College has nurtured leaders, scientists, writers, and visionaries — including Wrangler R. P. Paranjpye, the first Indian Senior Wrangler at Cambridge. The college’s alumni have gone on to shape India’s educational, scientific, and political landscapes.
        </p>
        <p>
          Eminent personalities like <strong>Mahatma Gandhi</strong>, <strong>Pandit Jawaharlal Nehru</strong>, <strong>Dr. Rajendra Prasad</strong>, and <strong>Sir C. V. Raman</strong> have graced its milestones, recognizing Fergusson’s role in shaping modern India.
        </p>
      </div>
    </div>

    <div class="about-landmarks">
      <h3>📚 Landmarks of Heritage</h3>
      <ul>
        <li><strong>Main Building:</strong> A Gothic architectural masterpiece inaugurated in 1895.</li>
        <li><strong>N.M. Wadia Amphitheatre:</strong> Built in 1912 — a hub for cultural, academic, and national events.</li>
        <li><strong>Bai Jerbai Wadia Library:</strong> Established in 1929 — one of Maharashtra’s largest college libraries.</li>
        <li><strong>Wrangler R. P. Paranjpye Memorial:</strong> Dedicated to the first Indian Wrangler, housing the Maths & CS departments.</li>
      </ul>
    </div>

    <div class="about-campus">
      <h3>🌿 The Campus & Botanical Garden</h3>
      <p>
        Spread over 60 acres in the heart of Pune, the Fergusson College campus blends history with nature. Its lush Botanical Garden, first conceived in 1902, is home to rare and medicinal plants — a living laboratory of biodiversity and heritage.
      </p>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    &copy; <?php echo date("Y"); ?> Fergusson College | All Rights Reserved.
  </footer>

</body>
</html>

