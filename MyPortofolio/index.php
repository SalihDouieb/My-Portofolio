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
      <?php
      // Database connection
      $conn = new mysqli('localhost', 'root', '', 'portfolio_db');
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Fetch all projects for the navigation
      $sql = "SELECT id, title FROM projects ORDER BY created_at ASC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo '<li><a href="project.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
          }
      }

      $conn->close();
      ?>
    </ul>
  </nav>
</header>


<main class="project-list">
<?php
$conn = new mysqli('localhost', 'root', '', 'portfolio_db');
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch projects in ascending order (oldest first)
$sql = "SELECT * FROM projects ORDER BY created_at ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $project_link = 'project.php?id=' . $row['id'];

        // Fetch first gallery image
        $img_sql = "SELECT image_path FROM project_details WHERE project_id = ? ORDER BY display_order ASC LIMIT 1";
        $stmt = $conn->prepare($img_sql);
        $stmt->bind_param("i", $row['id']);
        $stmt->execute();
        $img_result = $stmt->get_result();
        $first_image = $img_result->fetch_assoc();
        $stmt->close();

        $background = $first_image ? $first_image['image_path'] : 'img/placeholder.png';

        echo '<a href="' . $project_link . '" class="project-card" style="background-image: url(\'' . htmlspecialchars($background) . '\');">';
        echo '<div class="card-content">';
        echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
        echo '<p>' . htmlspecialchars($row['description']) . '</p>';
        echo '</div></a>';
    }
} else {
    echo "<p>No projects found.</p>";
}

$conn->close();
?>
</main>



<article>
  <section class="about-me">
      <h2>About Me</h2>
      <img src="img/me.jpg" alt="Your Name">
      <img src="img/kickboksing.png" alt="Kickboxing">
      <img src="img/vinland.png" alt="Anime">
      <img src="img/samurai.png" alt="Anime">
      <img src="img/brawlhalla.png" alt="Gaming">
      <p>Hi, I’m Salih Douieb, an 18-year-old all-round developer based in Helmond, The Netherlands. I’m passionate about crafting engaging, user-friendly web applications that combine clean design with strong functionality. My main focus is front-end development, where I make sure that every project I build is both visually appealing and technically solid.

      Outside of coding, I live a very active and creative lifestyle. I’ve been practicing kickboxing, which has taught me discipline, focus, and resilience—qualities I also apply in my development work. Whether it’s sparring in the ring or tackling a complex coding problem, I thrive on challenges and continuous improvement.

      When I’m not coding or training, I enjoy immersing myself in the world of video games and anime. Video games inspire my creativity and problem-solving skills, while anime fuels my imagination with unique stories and visuals. These hobbies not only entertain me but also influence my approach to design and storytelling in the digital space.

      I’m always open to new opportunities, collaborations, and projects that push my limits and help me grow. Feel free to explore my portfolio and get in touch—I’d love to connect!</p>
  </section>

  <section class="about-me contact">
      <h2>Contact</h2>
      <p class="copyable" data-copy="microsalih@outlook.com">Email: microsalih@outlook.com</p>
      <p class="copyable" data-copy="91741@roc-teraa.nl">School Email: 91741@roc-teraa.nl</p>
      <p class="copyable" data-copy="+31 6 87963332">Phone: +31 6 87963332</p>
      <h3>Click to copy 😉</h3>
      <span class="copy-message">Copied!</span>
  </section>
</article>

<footer>
  <p>&copy; 2025 My Portfolio. All rights reserved.</p>
</footer>

<script src="lightbox.js"></script>
</body>
</html>
