<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user credentials in the database
    $stmt = $conn->prepare('SELECT id, username, password FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Debugging: Output hashed password
        echo 'Hashed password from DB: ' . $hashed_password . '<br>';
        echo 'Entered password: ' . $password . '<br>';

        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username; // Set session variable
            header('Location: index.php'); // Redirect to index page
            exit();
        } else {
            echo 'Invalid username or password';
        }
    } else {
        echo 'Invalid username or password';
    }
}
?>
