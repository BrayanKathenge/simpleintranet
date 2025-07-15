<?php
session_start();
require_once "db_connection.php";


$user_id = $_SESSION["user_id"] ?? 0;

$result = $conn->query("
    SELECT m.id, m.sender_id, u.username,u.role, m.message, m.timestamp
    FROM messages m
    JOIN users u ON m.sender_id = u.id
    ORDER BY m.timestamp ASC
    LIMIT 30
");

if ($result && $result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
    $roleClass = strtolower($row['role']);
     $alignmentClass = ($row['sender_id'] == $user_id) ? 'own' : 'other';

    echo "<div class='chat-message {$alignmentClass}'>";
    echo "<p class='chat-message {$roleClass}'>";
    echo "<strong><span class='username {$roleClass}'>{$row['username']}:</strong> {$row['message']}";
    echo " <small>[{$row['timestamp']}]</small>";

    if ($row["sender_id"] == $user_id) {
        echo " <button class='del-btn' onclick='deleteMsg({$row['id']})'>Delete</button>";
    }

    echo "</div>";
    }
} else {
    echo "<p>No messages yet.</p>";
}
?>
