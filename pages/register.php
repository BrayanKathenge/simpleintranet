<?php
session_start();
require_once "db_connection.php";

$conn = new mysqli("localhost", "root", "", "intranet");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = "Employee";
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $role);

        if ($stmt->execute()) {
            $success = "User registered. <a href='login.php'>Login here</a>";
        } else {
            $error = "Registration failed. User may already exist.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mini Intranet</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="icon" href="../images/logo.jpg">
   
    </head>
<body>
<div class="login-container">
    <form class="login-box" method="POST" action="register.php">
      <h2>Create Account</h2>

      <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
      <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>

      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="confirm_password" placeholder="Confirm Password" required>
      <input type="hidden" name="role" value="Employee">
     
      <button type="submit">Register</button>
      <p class="register-link">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>
</body> 
</html>