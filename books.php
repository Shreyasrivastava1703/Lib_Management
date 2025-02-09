<?php
include("dataClass.php");

$obj = new data();
$recordSet=$obj->getbook();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-violet-700 to-blue-600 text-white min-h-screen">
    <div class="max-w-7xl mx-auto p-6">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold">Library Books</h1>
            <p class="mt-4 text-lg text-gray-200">
                Explore our collection of books and immerse yourself in knowledge and stories.
            </p>
        </header>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php
            if (isset($_SESSION['userId'])) {
                $userId = $_SESSION['userId'];
                foreach ($recordSet as $row) {
                    $bookId = $row['id'];
                    echo "
                    <div class='bg-white text-gray-800 rounded-lg shadow-lg overflow-hidden'>
                        <img src='uploads/{$row['bookPic']}' alt='{$row['bookName']}' class='w-full h-48 object-fit'>
                        <div class='p-4'>
                            <h2 class='text-lg font-semibold mb-2'>{$row['bookName']}</h2>
                            <p class='text-sm text-gray-600 mb-1'>Author: {$row['author']}</p>
                            <p class='text-sm text-gray-600 mb-1'>Branch: {$row['branch']}</p>
                            <p class='text-lg font-bold text-blue-600 mb-4'>₹{$row['price']}</p>
                            <a href='requestBook.php?userId=$userId&bookId=$bookId' class='block text-center py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition'>
                                Request Book
                            </a>
                        </div>
                    </div>";
                }
            } else {
                foreach ($recordSet as $row) {
                    echo "
                    <div class='bg-white text-gray-800 rounded-lg shadow-lg overflow-hidden'>
                        <img src='uploads/{$row['bookPic']}' alt='{$row['bookName']}' class='w-full h-48 object-cover'>
                        <div class='p-4'>
                            <h2 class='text-lg font-semibold mb-2'>{$row['bookName']}</h2>
                            <p class='text-sm text-gray-600 mb-1'>Author: {$row['author']}</p>
                            <p class='text-sm text-gray-600 mb-1'>Branch: {$row['branch']}</p>
                            <p class='text-lg font-bold text-blue-600 mb-4'>₹{$row['price']}</p>
                            <a href='login.php' class='block text-center py-2 px-4 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition'>
                                Log in to Request Book
                            </a>
                        </div>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
