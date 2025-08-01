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
$role = $user["role"] ?? "";


$announcements = $conn->query("SELECT a.title, a.content, a.posted_at, u.username AS posted_by
    FROM announcements a
    JOIN users u ON a.posted_by = u.id
    ORDER BY a.posted_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/logo.jpg">
</head>

<body>
    <div class="wrapper">
<header>
     <div id="preloader">
  <img src="../images/icon.png" alt="Loading..." class="preloader-logo">
</div>
     <h1>team11degrees </h1>
    <nav>
        <a href="../index.php" class="nav-btn">Home</a>
        <a href="announcements.php" class="nav-btn">Announcements</a>
        <a href="policies.php" class="nav-btn">Policies</a>
        <a href="forms.php" class="nav-btn">Forum</a>
        <a href="logout.php" class="nav-btn">Logout</a>
    </nav>
</header>

<div class="announcements">
    <h1>Announcements</h1>

    <?php while ($row = $announcements->fetch_assoc()): ?>
        <div style="border:1px solid #ccc; margin-bottom:15px; padding:10px;">
            <h3><?= htmlspecialchars($row['title']) ?></h3>
            <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
            <small>Posted by <?= htmlspecialchars($row['posted_by']) ?> on <?= $row['posted_at'] ?></small>
        </div>
    <?php endwhile; ?>

    
    <?php if ($role === 'hr' || $role === 'manager'): ?>
        <form class="announcements" method="POST" style="display:inline;">
    <a href="post_announcements.php" class="nav-btn">Post New Announcement</a>
        <input type="hidden" name="clear_announcements" value="1">
        <button type="submit" name="clear_announcements" class="nav-btn"onclick="return confirm('Are you sure you want to delete all announcements?')">
            Clear All Announcements
        </button>
    </form>
    <?php endif; ?>

</div>

<footer>
    <p>&copy; 2025 11degrees consultancy | Contact: info@11degrees.com</p>
</footer>
</div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["clear_announcements"])) {
    if ($role === "hr" || $role === "manager") {
        $conn->query("DELETE FROM announcements");
        echo "<script>alert('All announcements deleted'); window.location.href='announcements.php';</script>";
        exit;
    }
}
?>
<script>
  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    preloader.style.opacity = "0";
    setTimeout(() => {
      preloader.style.display = "none";
    }, 1500);
  });
</script>

</html>
