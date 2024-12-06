<?php
include '../db_connection.php';

$type = $_GET['type']; // 'cafe' or 'restaurant'

$sql = "SELECT * FROM $type";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Entries</title>
</head>
<body>
    <h1>Our <?php echo ucfirst($type); ?>s</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li><?php echo $row['name'] . " - " . $row['location'] . " - " . $row['address'] . " - " . $row['features'] . " - " . $row['inclusions'] . " - " . $row['drink_pricing'] . " - " . $row['food_pricing'] . " - " . $row['ideal_for'] . " - " . $row['status']; ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
