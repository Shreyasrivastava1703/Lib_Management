<?php
include("dataClass.php");
// Initialize the connection
$obj = new data();
$obj->setconnection();

// Fetch all books from the database
$q = "SELECT * FROM book"; // Assuming 'book' table contains book details
$recordSet = $obj->connection->query($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-6">Available Books</h1>

        <!-- Book Table -->
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="px-6 py-3 text-left">Image</th>
                    <th class="px-6 py-3 text-left">Book Name</th>
                    <th class="px-6 py-3 text-left">Author</th>
                    <th class="px-6 py-3 text-left">Branch</th>
                    <th class="px-6 py-3 text-left">Price</th>
                    <th class="px-6 py-3 text-left"></th>
      
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($recordSet as $row) {
                    echo "<tr class='border-b border-gray-200'>";
                    echo "<td class='px-6 py-4'><img src='uploads/{$row['bookPic']}' alt='{$row['bookName']}' width='100' height='100' class='border border-gray-300'></td>";
                    echo "<td class='px-6 py-4'>{$row['bookName']}</td>";
                    echo "<td class='px-6 py-4'>{$row['author']}</td>";
                    echo "<td class='px-6 py-4'>{$row['branch']}</td>";
                    echo "<td class='px-6 py-4'>{$row['price']}</td>";
                    echo "<td class='px-6 py-4'>
                            <a href='requestBook.php' class='bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'>
                                Request Book
                            </a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
