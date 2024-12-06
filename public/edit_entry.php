<?php
session_start();
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $features = $_POST['features'];
    $inclusions = $_POST['inclusions'];
    $drink_pricing = $_POST['drink_pricing'];
    $food_pricing = $_POST['food_pricing'];
    $ideal_for = $_POST['ideal_for'];
    $status = $_POST['status'];
    $type = $_POST['type']; // 'cafe' or 'restaurant'

    $sql = "UPDATE $type SET name='$name', location='$location', address='$address', features='$features', inclusions='$inclusions', drink_pricing='$drink_pricing', food_pricing='$food_pricing', ideal_for='$ideal_for', status='$status' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Entry updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
