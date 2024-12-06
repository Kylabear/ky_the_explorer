<?php
session_start();
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];  // Assume user_id is stored in session
    $entity_id = $_POST['entity_id'];
    $entity_type = $_POST['entity_type'];  // 'cafe' or 'restaurant'
    $rating = $_POST['rating'];

    $sql = "INSERT INTO ratings (user_id, entity_id, entity_type, rating) VALUES ('$user_id', '$entity_id', '$entity_type', '$rating')";
    if ($conn->query($sql) === TRUE) {
        echo "Rating added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
