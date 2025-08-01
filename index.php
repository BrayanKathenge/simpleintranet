<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location:pages/login.php");
  exit;
}
?>


<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mini Intranet</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/logo.jpg">
   
    </head>

    <body>
        <div class="wrapper">
        <header>
          <div id="preloader">
  <img src="images/icon.png" alt="Loading..." class="preloader-logo">
</div>
            <img src="images/logo.jpg" alt="company logo">
            <nav>
                <a href="index.php" class="nav-btn">Home</a>
                <a href="pages/announcements.php" class="nav-btn" >Announcements</a>
                <a href="pages/policies.php" class="nav-btn">Policies</a>
                <a href="pages/forms.php" class="nav-btn">Forum</a>
                <a href="Pages/logout.php" class="nav-btn">Logout</a>
            </nav>
        </header>

        <div class="container">
        <div class="Mission">
            <h1>Our Mission</h1>
            <p>Leading innovation Along East Africa</p>

        </div>
        
        <div class="vision">
            <h1>Our vision</h1>
            <p>We are The Leading Multi- Cloud Consulting Partner in Kenya
              Whether you are a small, medium, or large enterprise, or a public sector organization,
               we are an AWS Partner with the right skills and experience to help you move your business forward.</p>
     
            </div>
        </div>

        
  <footer>
    <p>&copy; 2025 11degrees consultancy| Contact: info@11degrees.com</p>
  </footer>
   </div>

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