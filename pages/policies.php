<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
     <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Policies</title>
         <link rel="stylesheet" href="../style.css">
         <link rel="icon" href="../images/logo.jpg">
    </head>

    <body>
      <div id="preloader">
  <img src="../images/icon.png" alt="Loading..." class="preloader-logo">
</div>
         <header>
            <h1>11degrees </h1>
            <nav>
                 <nav>
                <a href="../index.php" class="nav-btn">Home</a>
                <a href="announcements.php" class="nav-btn" >Announcements</a>
                <a href="policies.php" class="nav-btn">Policies</a>
                <a href="forms.php" class="nav-btn">Forum</a>
                <a href="logout.php" class="nav-btn">Logout</a>
            </nav>
            </nav>
        </header>
        <div class="policies">
        <h1>Our Company Policies</h1>
        <ul>
            <li>Lorem ipsum dolor sit amet consectetur adepe placeat harum voluptatem cfacilis odio?</li>
             <li>Lorem ipsum dolor sit amet consectetur adepe placeat harum voluptatem cfacilis odio?</li>
             <li>Lorem ipsum dolor sit amet consectetur adepe placeat harum voluptatem cfacilis odio?</li>
             <li>Lorem ipsum dolor sit amet consectetur adepe placeat harum voluptatem cfacilis odio?</li>
        </ul>
        </div>

    <footer>
    <p>&copy; 2025 11degrees consolutancy| Contact: info@11degrees.com</p>
  </footer>
<script>
  window.addEventListener("load", function () {
    const preloader = document.getElementById("preloader");
    preloader.style.opacity = "0";
    setTimeout(() => {
      preloader.style.display = "none";
    }, 1500); 
  });
</script>

</body>


</html>