<?php
session_start();
include 'db_connection.php';

// Function to fetch cafes and restaurants
function fetch_entries($type, $conn) {
    $sql = "SELECT * FROM $type";
    return $conn->query($sql);
}

$cafes = fetch_entries('cafes', $conn);
$restaurants = fetch_entries('restaurants', $conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ky the Explorer</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="intro">
            <h1>Welcome to Ky the Explorer</h1>
            <p>Discover the best cafes and restaurants in Baguio City.</p>
            <a href="#learn-more" class="cta-button">Learn More</a>
        </section>

        <section id="login-register">
            <?php if (!isset($_SESSION['username'])): ?>
                <div class="buttons-container">
                    <button onclick="toggleForm('login')" class="toggle-button">Login</button>
                    <button onclick="toggleForm('register')" class="toggle-button">Register</button>
                </div>
                <div id="login-form" class="form-container hidden">
                    <h2>Login</h2>
                    <form action="process_login.php" method="POST">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Login</button>
                    </form>
                </div>
                <div id="register-form" class="form-container hidden">
                    <h2>Register</h2>
                    <form action="process_registration.php" method="POST">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <button type="submit">Register</button>
                    </form>
                </div>
            <?php else: ?>
                <h2>Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <?php endif; ?>
        </section>

        <section id="entries">
            <h2>Cafes</h2>
            <ul>
                <?php while($row = $cafes->fetch_assoc()): ?>
                    <li>
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p>Location: <?php echo htmlspecialchars($row['location']); ?></p>
                        <p>Address: <?php echo htmlspecialchars($row['address']); ?></p>
                        <p>Features: <?php echo htmlspecialchars($row['features']); ?></p>
                        <p>Inclusions: <?php echo htmlspecialchars($row['inclusions']); ?></p>
                        <p>Drink Pricing: <?php echo htmlspecialchars($row['drink_pricing']); ?></p>
                        <p>Food Pricing: <?php echo htmlspecialchars($row['food_pricing']); ?></p>
                        <p>Ideal For: <?php echo htmlspecialchars($row['ideal_for']); ?></p>
                        <p>Status: <?php echo htmlspecialchars($row['status']); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>

            <h2>Restaurants</h2>
            <ul>
                <?php while($row = $restaurants->fetch_assoc()): ?>
                    <li>
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p>Location: <?php echo htmlspecialchars($row['location']); ?></p>
                        <p>Address: <?php echo htmlspecialchars($row['address']); ?></p>
                        <p>Features: <?php echo htmlspecialchars($row['features']); ?></p>
                        <p>Inclusions: <?php echo htmlspecialchars($row['inclusions']); ?></p>
                        <p>Drink Pricing: <?php echo htmlspecialchars($row['drink_pricing']); ?></p>
                        <p>Food Pricing: <?php echo htmlspecialchars($row['food_pricing']); ?></p>
                        <p>Ideal For: <?php echo htmlspecialchars($row['ideal_for']); ?></p>
                        <p>Status: <?php echo htmlspecialchars($row['status']); ?></p>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    </main>

    <footer>
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Service</a></li>
        </ul>
    </footer>

    <script>
        function toggleForm(formId) {
            document.getElementById('login-form').classList.add('hidden');
            document.getElementById('register-form').classList.add('hidden');
            document.getElementById(formId + '-form').classList.remove('hidden');
        }
    </script>
</body>
</html>

<?php $conn->close(); ?>
