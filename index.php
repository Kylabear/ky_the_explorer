<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Ky the Explorer</title>
</head>
<body class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">

<header class="bg-white text-gray-800 p-4 shadow-md">
    <nav class="container mx-auto flex justify-between items-center">
        <!-- Left Side: Welcome message if logged in -->
        <ul class="flex flex-col md:flex-row md:space-x-4 md:mr-auto space-y-4 md:space-y-0">
            <?php if (isset($_SESSION['username'])): ?>
                <li class="text-pink-500 font-bold">
                    Welcome back, <?= htmlspecialchars($_SESSION['username']) ?>!
                </li>
            <?php endif; ?>
        </ul>
        
        <!-- Right Side: Navigation Links (Always in row format) -->
        <ul class="flex md:flex-row space-x-4">
            <li><a href="#" class="hover:text-pink-400 transition duration-300">Home</a></li>
            <li><a href="#" class="hover:text-pink-400 transition duration-300">About</a></li>
            <li><a href="#" class="hover:text-pink-400 transition duration-300">Contact</a></li>

            <?php if (!isset($_SESSION['username'])): ?>
                <li>
                    <a href="login.php" class="hover:text-pink-400 transition duration-300">Login/Register</a>
                </li>
            <?php else: ?>
                <li>
                    <a href="logout.php" class="hover:text-pink-400 transition duration-300">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>





<main class="container mx-auto p-4">
    <section class="intro text-center mt-8">
        <h1 class="text-4xl font-bold text-white">Welcome to Ky the Explorer</h1>
        <p class="text-lg text-white mt-4">Discover the best cafes and restaurants in Baguio City.</p>
        <a href="#learn-more" class="cta-button bg-white text-pink-500 py-2 px-4 rounded-lg hover:bg-gray-200 transition duration-300 mt-4 inline-block">Learn More</a>
    </section>

    <?php
    // Sample data for cafes and restaurants
    $places = [
        [
            "type" => "Cafe",
            "name" => "Cafe Bliss",
            "location" => "Baguio",
            "address" => "123 Session Rd",
            "features" => "Cozy ambiance, Free Wi-Fi",
            "inclusions" => "Coffee, Pastries",
            "drink_pricing" => "₱150-₱300",
            "food_pricing" => "₱200-₱400",
            "ideal_for" => "Meetups, Studying",
            "status" => "Bucket List",
            "comments" => "Great service!",
            "rating" => "★★★★☆"
        ],
        [
            "type" => "Restaurant",
            "name" => "Baguio Diner",
            "location" => "Baguio",
            "address" => "45 Burnham Rd, Baguio City",
            "features" => "Outdoor dining, Live music",
            "inclusions" => "Filipino dishes, Drinks",
            "drink_pricing" => "₱100-₱250",
            "food_pricing" => "₱300-₱600",
            "ideal_for" => "Family dinners, Dates",
            "status" => "Going",
            "comments" => "Sakto lang, Sarap naman..medj dko lang bet yung serving nila!",
            "rating" => "★★★★★"
        ]
    ];
    ?>

    <!-- Display brief information -->
    <?php foreach (["Cafe", "Restaurant"] as $type): ?>
        <section id="<?= strtolower($type) ?>s" class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold text-white mb-4"><?= $type ?>s</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($places as $place): ?>
                    <?php if ($place["type"] === $type): ?>
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <h3 class="text-xl font-bold text-gray-800"><?= $place["name"] ?></h3>
                            <p class="text-gray-600">Location: <?= $place["location"] ?></p>
                            <p class="text-gray-600">Rating: <?= $place["rating"] ?></p>
                            <button onclick="toggleModal('modal-<?= $place["name"] ?>')" class="mt-4 bg-pink-500 text-white py-2 px-4 rounded-lg hover:bg-pink-600 transition duration-300">
                                See More
                            </button>
                        </div>

                        <!-- Modal -->
                        <div id="modal-<?= $place["name"] ?>" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <div class="bg-white rounded-lg p-6 w-4/5 lg:w-1/2">
                                <h3 class="text-2xl font-bold mb-4"><?= $place["name"] ?> Details</h3>
                                <table class="w-full border-collapse border border-gray-300">
                                    <tr><th class="border px-4 py-2">Feature</th><th class="border px-4 py-2">Details</th></tr>
                                    <?php foreach ($place as $key => $value): ?>
                                        <?php if ($key !== "type" && $key !== "name" && $key !== "rating"): ?>
                                            <tr>
                                                <td class="border px-4 py-2"><?= ucwords(str_replace("_", " ", $key)) ?></td>
                                                <td class="border px-4 py-2"><?= $value ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </table>
                                <button onclick="toggleModal('modal-<?= $place["name"] ?>')" class="mt-4 bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">
                                    Close
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
</main>

<footer class="bg-white text-gray-800 p-4 mt-12">
    <ul class="flex justify-center space-x-4"> 
        <li><a href="#" class="hover:text-pink-400 transition duration-300">Privacy Policy</a></li>
        <li>
            <a href="mailto:alphabangachon@gmail.com" class="hover:text-pink-400 transition duration-300"> 
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> 
                    <path d="M4.01 3C3.14 3 2.45 3.75 2.45 4.67V19.33C2.45 20.25 3.14 21 4.01 21H19.99C20.86 21 21.55 20.25 21.55 19.33V4.67C21.55 3.75 20.86 3 19.99 3H4.01zM19.99 19.33H4.01V8.1L11.62 12.76L19.99 8.1V19.33zM4.01 6.9V4.67H19.99V6.9L12.69 11.36L4.01 6.9z"/> 
                </svg> 
            </a> 
        </li>  
        <li><a href="#" class="hover:text-pink-400 transition duration-300">Terms of Service</a></li> 
        
    </ul> 
</footer>

<script>
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>

</body>
</html>
