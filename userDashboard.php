<?php
include("dataClass.php");

if (!isset($_SESSION['userId'])) {
    header("Location: login.php?msg=Login first");
    exit();
}

$userId = $_SESSION['userId'];
$msg = $_REQUEST['msg'] ?? '';

$u = new data;
$recordset = $u->userdetail($userId);
$userName = $recordset['name'] ?? 'User';
$userEmail = $recordset['email'] ?? 'Not available';
$userType = $recordset['type'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- Header Section -->
        <header class="bg-gradient-to-r from-blue-600 to-blue-500 text-white p-4 rounded-lg shadow-md flex justify-between items-center">
        <h1 class="text-3xl font-bold">My Library</h1>
        <nav>
        <ul class="flex space-x-6">
            <li><a href="#" class="hover:underline hover:text-gray-200">Home</a></li>
            <li><a href="books.php" class="hover:underline hover:text-gray-200">Request a Book</a></li>
            <li><a href="logout.php" class="hover:underline hover:text-gray-200">Logout</a></li>
        </ul>
        </nav>
        </header>
 


        <!-- Welcome Section -->
        <section class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold text-center text-blue-600">WELCOME <?php echo htmlspecialchars($userName); ?>!</h2>
            <div class="mt-4 text-center">
                <p class="text-gray-800"><span class="font-semibold">Email:</span><?php echo htmlspecialchars($userEmail); ?></p>
                <p class="text-gray-800"><span class="font-semibold">Type:</span> <?php echo htmlspecialchars($userType); ?></p>
            </div>
        </section>

        <!-- Quote Section -->
        <section class="mt-6 bg-blue-50 p-6 rounded-lg shadow-md text-center">
            <blockquote class="text-2xl font-semibold text-blue-700 italic">
                "Books are a uniquely portable magic."
            </blockquote>
        </section>

        <section class="mt-6">
    <h2 class="text-2xl font-bold text-center mb-4">Your Borrowed Library</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
        $u = new data;
        $recordset = $u->getissuebook($userId);

        if (!empty($recordset)) {
            foreach ($recordset as $row) {
                echo "<div class='bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300'>";
                // Book Name as the card header
                echo "<h3 class='text-xl font-bold mb-2 text-blue-600'>{$row[2]}</h3>"; 
                // Displaying other details
                echo "<p class='text-gray-700'><span class='font-semibold'>Issued To:</span> {$row[0]}</p>";
                echo "<p class='text-gray-700'><span class='font-semibold'>Issue Date:</span> {$row[3]}</p>";
                echo "<p class='text-gray-700'><span class='font-semibold'>Return Date:</span> {$row[6]}</p>";
                echo "<p class='text-gray-700'><span class='font-semibold'>Fine:</span> {$row[7]}</p>";
                // Return Button
                echo "<a href='UserDashboard.php?returnid={$row[0]}&userlogid=$userId'>";
                echo "<button type='button' class='mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'>Return</button>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center col-span-full text-gray-600'>No books issued yet.</p>";
        }
        ?>
    </div>
</section>

        <!-- Footer Section 
        <footer class="mt-6 text-center">
            <p class="text-gray-600">Books are a uniquely portable magic.</p>
            <div class="mt-2">
                <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a> | 
                <a href="#" class="text-blue-600 hover:underline">Terms of Service</a>
            </div>
        </footer>-->
    </div>
</body>
</html>