<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jewelry Store Project</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1>Jewelry Store</h1>
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
        <img src="img/jewelery1.png" alt="Jewelry homepage" />
        <img src="img/jewelery2.png" alt="Jewelry product list" />
        <img src="img/jewelery3.png" alt="Jewelry interactions" />
        <img src="img/jewelery4.png" alt="Shopping cart" />
      </div>
    </section>

    <section class="project-details">
      <h2>About the Project</h2>
      <article>
        <h3>1st Image</h3>
        <p>Displays popular jewelry items and navigation with login/register functionality.</p>
      </article>
      <article>
         <h3>2nd Image</h3>
        <p>Full catalog with sorting, wishlist, and cart options.</p>
      </article>
      <article>
        <h3>3rd Image</h3>
        <p>Hover animations, wishlist hearts, and clickable product info.</p>
      </article>
      <article>
        <h3>4th Image</h3>
        <p>Manage items, view totals, and checkout with login.</p>
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
