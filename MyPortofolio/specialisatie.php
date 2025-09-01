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
    <h1>4 In A Row Project</h1>
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
        <img src="img/special1.png" alt="Website for 4 in a row" />
        <img src="img/special2.png" alt="4 in a row options" />
        <img src="img/special3.png" alt="4 in a row" />
        <img src="img/special4.png" alt="Contact form" />
      </div>
    </section>

    <section class="project-details">
      <h2>About the Project</h2>
      <article>
        <h3>1st Image</h3>
        <p>This project had a website game and controller installed, i only lost the website and controller, i only have a screenshot of the index page</p>
      </article>
      <article>
         <h3>2nd Image</h3>
        <p>This is the options page, Here you can choose What color you are and against and the background color. You can choose who you want to play against (player or bot)</p>
      </article>
      <article>
        <h3>3rd Image</h3>
        <p>Here you see me playing against a bot. you drop a piece at the Drop button, you can switch colors mid game if you dont like the collor. you can see in the bottom right who's turn it is.</p>
      </article>
      <article>
        <h3>4th Image</h3>
        <p>This is the winners screen, Its really basic but it resets when Ok is clicked and the game starts again if you drop again.</p>
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
