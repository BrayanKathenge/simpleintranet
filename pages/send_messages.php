<?php
session_start();
require_once "db_connection.php";

if (isset($_POST["message"]) && isset($_SESSION["user_id"])) {
    $msg = $conn->real_escape_string($_POST["message"]);
    $sender_id = $_SESSION["user_id"];

    $sql = "INSERT INTO messages (sender_id, message) VALUES ($sender_id, '$msg')";
    if (!$conn->query($sql)) {
        echo "DB Error: " . $conn->error;
    } else {
        echo "Message sent";
    }
} else {
    echo "Missing session or message data";
}
?>
