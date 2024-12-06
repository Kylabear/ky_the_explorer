<?php
session_start();
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];  
    $entity_id = $_POST['entity_id'];
    $entity_type = $_POST['entity_type'];  // 'cafe' or 'restaurant'
    $comment = $_POST['comment'];
    $image_path = '';

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO comments (user_id, entity_id, entity_type, comment, image_path) VALUES ('$user_id', '$entity_id', '$entity_type', '$comment', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        echo "Comment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
