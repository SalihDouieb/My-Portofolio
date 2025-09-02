<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>Portfolio</title>
</head>
<body>
  <header>
    <h1>Welcome to My Portfolio</h1>
    <nav>
      <ul>
        <li><a href="jewelery.php">Jewelry Store</a></li>
        <li><a href="radio.php">Radio</a></li>
        <li><a href="calculator.php">Calculator</a></li>
        <li><a href="specialisatie.php">Specialisation Project</a></li>
      </ul>
    </nav>
  </header>

<main class="project-list">
  <a href="jewelery.php" class="project-card jewelry">
    <div class="card-content">
      <h2>Jewelry Store</h2>
      <p>An interactive shop with wishlist & cart.</p>
    </div>
  </a>

  <a href="radio.php" class="project-card radio">
    <div class="card-content">
      <h2>Radio</h2>
      <p>Stream songs, explore artists & top charts.</p>
    </div>
  </a>

  <a href="calculator.php" class="project-card calculator">
    <div class="card-content">
      <h2>Calculator</h2>
      <p>All-in-one calculator with BMI & conversions.</p>
    </div>
  </a>

  <a href="specialisatie.php" class="project-card specialisatie">
    <div class="card-content">
      <h2>Specialisation Project</h2>
      <p>My custom advanced project showcase.</p>
    </div>
  </a>
</main>
<article>
    <section class="about-me">
        <h2>About Me</h2>
        <img src="img/me.jpg" alt="Your Name">
        <p>Hello! I'm Salih Douieb, a passionate All round developer with a knack for creating engaging and user-friendly web applications.
        I specialize in front-end development, ensuring that every project I work on is visually appealing and functionally robust.
         When I'm not coding, I enjoy Kickboksing, playing video games and watching anime. Feel free to explore my portfolio and reach out if you'd like to collaborate!</p>
    </section>
<section class="about-me contact">
    <h2>Contact</h2>
    <p class="copyable" data-copy="microsalih@outlook.com">Email: microsalih@outlook.com</p>
    <p class="copyable" data-copy="91741@roc-teraa.nl">School Email: 91741@roc-teraa.nl</p>
    <p class="copyable" data-copy="+31 6 87963332">Phone: +31 6 87963332</p>
    <h3> click to copy 😉</h3>
    <span class="copy-message">Copied!</span>
</section>
</article>

  <footer>
    <p>&copy; 2025 My Portfolio. All rights reserved.</p>
  </footer>
  <script src="lightbox.js"></script>

</body>
</html>
