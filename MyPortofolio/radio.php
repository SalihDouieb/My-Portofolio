<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Radio Project</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1>Radio</h1>
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
        <img src="img/radio1.png" alt="Radio playlist" />
        <img src="img/radio2.png" alt="Now playing screen" />
        <img src="img/radio3.png" alt="Artist detail page" />
        <img src="img/radio4.png" alt="Top 50 playlist" />
      </div>
    </section>

    <section class="project-details">
      <h2>About the Project</h2>
      <article>
        <h3>1st Image</h3>
        <p>Browse songs, play tracks, and search by artist.</p>
      </article>
      <article>
         <h3>2nd Image</h3>
        <p>Bottom bar shows track info and album art.</p>
      </article>
      <article>
        <h3>3rd Image</h3>
        <p>Dedicated view with artist image, info, and discography.</p>
      </article>
      <article>
        <h3>4th Image</h3>
        <p>Interactive table with YouTube and Wikipedia links.</p>
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
