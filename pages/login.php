<?php
session_start();
require_once"db_connection.php";

$conn = new mysqli("localhost", "root", "", "intranet");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed);
    if ($stmt->fetch() && password_verify($_POST["password"], $hashed)) {
        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $username;
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Invalid login.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>login</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="icon" href="../images/logo.jpg">
   
    </head>
<body>
    
<div class="login-container">
    <form class="login-box" method="POST" action="login.php">
      <h2>Login</h2>
      <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>
    </form>
  </div>
</form>
</body>
</html>