<?php
session_start();
include '../db_connection.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $sql = "INSERT INTO $type (name, location, address, features, inclusions, drink_pricing, food_pricing, ideal_for, status) VALUES ('$name', '$location', '$address', '$features', '$inclusions', '$drink_pricing', '$food_pricing', '$ideal_for', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
