<?php
session_start();
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $type = $_POST['type'];  // 'cafe' or 'restaurant'

    $sql = "DELETE FROM $type WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Entry deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
