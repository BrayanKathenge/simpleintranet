<?php
session_start();
require_once "db_connection.php";

if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}

$user_id = $_SESSION["user_id"];


$stmt = $conn->prepare("SELECT role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$role = $user["role"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && ($role === "hr" || $role === "manager")) {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $stmt = $conn->prepare("INSERT INTO announcements (title, content, posted_by, posted_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("ssi", $title, $content, $user_id);
    if ($stmt->execute()) {
        header("Location: announcements.php");
        exit;
    } else {
        echo "Error posting announcement.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Post Announcement</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <form  method="POST">
    <h2>Post New Announcement</h2>
    <input type="text" name="title" placeholder="Title" required><br><br>
    <textarea name="content" placeholder="Write your announcement here..." rows="7" required></textarea><br><br>
    <div class="form-actions">
      <button type="submit" class="nav-btn">Post</button>
      <a href="announcements.php" class="nav-btn">Back</a> 
    </div> 
   

  </form>
</body>
</html>
