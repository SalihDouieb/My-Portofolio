<?php
session_start();
$adminUsername = "adminSalih";
$hashedPassword = password_hash("sAlIhP0Rt)f)lI0", PASSWORD_DEFAULT);

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    if ($username === $adminUsername && password_verify($password, $hashedPassword)) {
        $_SESSION['logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #111;
    color: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
.login-container {
    background: #1a1a1a;
    padding: 2rem;
    border-radius: 10px;
    border: 2px solid #00bfa5;
    width: 300px;
    text-align: center;
}
input {
    width: 90%;
    padding: 0.5rem;
    margin: 0.5rem 0;
    border-radius: 5px;
    border: 1px solid #00bfa5;
    background: #111;
    color: #eee;
}
button {
    padding: 0.5rem 1rem;
    margin-top: 1rem;
    border: none;
    border-radius: 5px;
    background: #00bfa5;
    color: #111;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
}
button:hover { background: #00e6cc; }
.error { color: #ff4d4d; margin-top: 0.5rem; }
</style>
</head>
<body>

<div class="login-container">
  <h2>Admin Login</h2>
  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
  <?php if($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>
</div>

</body>
</html>
