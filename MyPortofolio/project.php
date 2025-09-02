<?php
// If no project id is provided, redirect to portfolio
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$project_id = intval($_GET['id']);

// Database connection (Laragon default)
$conn = new mysqli('localhost', 'root', '', 'portfolio_db');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get project title
$proj_sql = "SELECT title FROM projects WHERE id=$project_id";
$proj_result = $conn->query($proj_sql);
if($proj_result->num_rows == 0) {
    // If project id doesn't exist, redirect to portfolio
    header("Location: index.php");
    exit;
}
$proj_row = $proj_result->fetch_assoc();
$project_title = $proj_row['title'];

// Get project gallery & descriptions
$details_sql = "SELECT * FROM project_details WHERE project_id=$project_id ORDER BY display_order ASC";
$details_result = $conn->query($details_sql);
$details = [];
while ($row = $details_result->fetch_assoc()) {
    $details[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($project_title); ?> Project</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($project_title); ?></h1>
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
        <?php foreach($details as $d): ?>
          <img src="<?php echo $d['image_path']; ?>" alt="<?php echo htmlspecialchars($d['image_alt']); ?>" />
        <?php endforeach; ?>
      </div>
    </section>

    <section class="project-details">
      <h2>About the Project</h2>
      <?php foreach($details as $d): ?>
        <article>
          <h3><?php echo htmlspecialchars($d['description_title']); ?></h3>
          <p><?php echo htmlspecialchars($d['description_text']); ?></p>
        </article>
      <?php endforeach; ?>
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
