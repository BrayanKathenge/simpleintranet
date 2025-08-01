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
  

  
  <script>
    
    /*document.addEventListener("contextmenu", e => e.preventDefault());

   
    document.addEventListener("keydown", function (e) {
      if ((e.ctrlKey || e.metaKey) && ['s', 'p', 'u'].includes(e.key.toLowerCase())) {
        e.preventDefault();
        alert("This action is disabled on this page.");
      }
    });*/
  </script>
</head>
  
<body>
<div class="wrapper">
  <header>
    <h1><a href="../index.php" style="color:white; text-decoration:none;">team11degrees</a></h1>
    <nav>
      <a href="../index.php" class="nav-btn">Home</a>
      <a href="announcements.php" class="nav-btn">Announcements</a>
      <a href="policies.php" class="nav-btn">Policies</a>
      <a href="forms.php" class="nav-btn">Forum</a>
      <a href="logout.php" class="nav-btn">Logout</a>
    </nav>
  </header>


 

    <div class="pdf-viewer-container" style="width: 100%; height: 700px; border: 1px solid #ccc; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <iframe
          src="../pdfviewer/viewer.html?file=HR_POLICIES.pdf" width="100%" height="600px""
          width="100%"
          height="600px"
          style="border: none;"
          allowfullscreen
        ></iframe>
      </div>
    </div>

  <footer>
    <p>&copy; 2025 11degrees Consultancy | Contact: info@11degrees.com</p>
  </footer>
</div>
</body>
</html>
