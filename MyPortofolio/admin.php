<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Prevent undefined index errors
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $link_back = $_POST['link_back'] ?? '';

    if (!$title || !$description || !$link_back) {
        $error = "Please fill in all required fields.";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'portfolio_db');
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        // Insert project
        $stmt = $conn->prepare("INSERT INTO projects (title, description, link) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $link_back);
        $stmt->execute();
        $project_id = $stmt->insert_id;
        $stmt->close();

        // Insert gallery images if any
        if (!empty($_FILES['images']['name'][0])) {
            $image_paths = $_FILES['images']['name'];
            $tmp_files = $_FILES['images']['tmp_name'];
            $alts = $_POST['image_alt'];
            $desc_titles = $_POST['description_title'];
            $desc_texts = $_POST['description_text'];

            for ($i = 0; $i < count($image_paths); $i++) {
                $target_dir = "img/";
                $target_file = $target_dir . basename($image_paths[$i]);
                move_uploaded_file($tmp_files[$i], $target_file);

                $stmt = $conn->prepare("INSERT INTO project_details (project_id, image_path, image_alt, description_title, description_text, display_order) VALUES (?, ?, ?, ?, ?, ?)");
                $order = $i + 1;
                $stmt->bind_param("issssi", $project_id, $target_file, $alts[$i], $desc_titles[$i], $desc_texts[$i], $order);
                $stmt->execute();
                $stmt->close();
            }
        }

        $conn->close();
        $success = "Project added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<style>
input, textarea { display: block; margin-bottom: 10px; width: 300px; }
</style>
</head>
<body>
<h1>Welcome, Salih!</h1>
<a href="logout.php">Logout</a>

<h2>Add New Project</h2>

<?php
if (isset($error)) echo "<p style='color:red;'>$error</p>";
if (isset($success)) echo "<p style='color:green;'>$success</p>";
?>

<form method="post" enctype="multipart/form-data">
    <label>Project Title:</label>
    <input type="text" name="title" required>

    <label>Project Description:</label>
    <textarea name="description" required></textarea>

    <label>Back Link Text:</label>
    <input type="text" name="link_back" value="← Back to Portfolio" required>

    <h3>Gallery Images</h3>
    <div id="image-fields">
        <div class="image-block">
            <label>Image:</label>
            <input type="file" name="images[]" required>
            <label>Alt Text:</label>
            <input type="text" name="image_alt[]" required>
            <label>Title:</label>
            <input type="text" name="description_title[]" required>
            <label>Description:</label>
            <textarea name="description_text[]" required></textarea>
        </div>
    </div>

    <button type="button" onclick="addImageField()">Add Another Image</button>
    <br><br>
    <input type="submit" value="Add Project">
</form>

<script>
function addImageField() {
    const div = document.createElement('div');
    div.className = 'image-block';
    div.innerHTML = `
        <label>Image:</label>
        <input type="file" name="images[]" required>
        <label>Alt Text:</label>
        <input type="text" name="image_alt[]" required>
        <label>Title:</label>
        <input type="text" name="description_title[]" required>
        <label>Description:</label>
        <textarea name="description_text[]" required></textarea>
    `;
    document.getElementById('image-fields').appendChild(div);
}
</script>
</body>
</html>
 