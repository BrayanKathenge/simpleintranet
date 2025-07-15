<?php
session_start();
require_once "db_connection.php";

if (isset($_POST["id"]) && isset($_SESSION["user_id"])) {
  $id = intval($_POST["id"]);
  $user_id = $_SESSION["user_id"];

  // Allow delete only if user owns the message
  $conn->query("DELETE FROM messages WHERE id = $id AND sender_id = $user_id");

  echo "Deleted";
} else {
  echo "Error";
}
?>
