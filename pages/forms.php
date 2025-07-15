<?php
session_start();
require_once"db_connection.php";
if(!isset($_SESSION["user_id"])){
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html>
     <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
         <link rel="stylesheet" href="../style.css">
         <link rel="icon" href="../images/logo.jpg">
    </head>

    <body>
       <div id="preloader">
  <img src="../images/icon.png" alt="Loading..." class="preloader-logo">
</div>
         <header>
            <h1>11 degrees </h1>
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

      <div id="chatBox">
  <h1>Welcome to our Open Forum</h1>

  <div id="messages" class="messages-area"></div>

  <form id="chatForm" autocomplete="off" class="chat-form">
    <input type="text" id="message" name="message" placeholder="Type your message..." required>
    <button type="submit">Send</button>
  </form>
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




    window.onload = function () {
    function loadChat() {
    fetch("load_messages.php")
      .then(res => res.text())
      .then(data => {
        const messagesDiv = document.getElementById("messages");
        messagesDiv.innerHTML = data;

        
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
      });
  }

  
  loadChat();

  
  setInterval(loadChat, 5000);

  
  document.getElementById("chatForm").onsubmit = function (e) {
    e.preventDefault();
    const msg = document.getElementById("message").value;

    fetch("send_messages.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: "message=" + encodeURIComponent(msg)
    })
      .then(res => res.text())
      .then(response => {
        console.log("Server response:", response);
        document.getElementById("message").value = "";
        loadChat(); 
      });
  };

  
  window.deleteMsg = function (id) {
    if (confirm("Delete this message?")) {
      fetch("delete_message.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "id=" + encodeURIComponent(id)
      })
        .then(res => res.text())
        .then(response => {
          console.log("Deleted:", response);
          loadChat();
        });
    }
  };
};
</script>

            
     </body>
</html>     
