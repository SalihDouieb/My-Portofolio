<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calculator Project</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1>Calculator</h1>
    <nav>
      <ul>
        <li><a href="index.php">← Back to Portfolio</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section>
      <h2>Gallery</h2>
      <div class="gallery">
        <img src="img/calc1.png" alt="Calculator basic view" />
        <img src="img/calc2.png" alt="Calculator options" />
        <img src="img/calc3.png" alt="Special operations" />
        <img src="img/calc4.png" alt="Contact form" />
      </div>
    </section>

    <section class="project-details">
      <h2>About the Project</h2>
      <article>
        <h3>1st Image</h3>
        <p>Includes calculation history and reset function.</p>
      </article>
      <article>
         <h3>2nd Image</h3>
        <p>Supports +, −, ×, ÷, currency conversion, exponents, square roots, and BMI.</p>
      </article>
      <article>
        <h3>3rd Image</h3>
        <p>Disables unused fields depending on the selected operation.</p>
      </article>
      <article>
        <h3>4th Image</h3>
        <p>User info form that displays entered data on screen.</p>
      </article>
    </section>
  </main>

  <!-- Lightbox -->
  <div id="lightbox" class="lightbox" aria-hidden="true">
    <button class="close" aria-label="Close">&times;</button>
    <img class="lightbox-content" id="lightbox-img" alt="Expanded view" />
  </div>

  <footer>
    <p>&copy; 2025 My Portfolio. All rights reserved.</p>
  </footer>

  <script src="lightbox.js"></script>
</body>
</html>
