<?php
include("dataClass.php");

if (!isset($_SESSION['userId'])) {
    header("Location: login.php?msg=Login first");
    exit();
}

$userId = $_SESSION['userId'];
$msg = $_REQUEST['msg'] ?? '';

if ($msg === "done") {
    echo "<div id='statusMessage' class='bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg my-4 mx-auto text-center w-fit'>
            Action successfully completed!
          </div>";
} elseif ($msg === "fail") {
    echo "<div id='statusMessage' class='bg-red-100 text-red-800 border border-red-300 p-4 rounded-lg my-4 mx-auto text-center w-fit'>
            Action failed!
          </div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <div class="fixed top-0 left-0 h-full w-64 bg-gradient-to-r from-purple-600 to-violet-700 text-white shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center text-white mb-8">User Dashboard</h2>
            
            <button onclick="openSection('myaccount')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg">
                <b>My Account</b>
            </button>
            
            <button onclick="openSection('bookreport')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg">
                <b>Book Report</b>
            </button>
            
            <button onclick="openSection('bookrequest')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg">
                <b>Book Requests</b>
            </button>
            
            <a href="logout.php" class="w-full block text-center py-3 mt-4 bg-red-500 hover:bg-red-700 text-white rounded-lg">
                <b>Logout</b>
            </a>
        </div>


        <div class="w-full md:w-3/4 bg-gray-50 p-6 ml-64"> 

            <div id="placeholder" class="text-center p-16 bg-gradient-to-r from-purple-800 via-indigo-700 to-teal-600 rounded-3xl shadow-xl">
                <div class="mb-8">
                    <h2 class="text-5xl font-extrabold text-white leading-tight tracking-wide transform transition-all duration-500 hover:text-indigo-300">
                        Welcome Back to Your Library Dashboard!
                    </h2>
                    <p class="text-lg text-white mt-4 opacity-90 transform transition-all duration-500 hover:opacity-100">
                        Dive into an endless world of books. Keep track of your reads and manage your library effortlessly.
                    </p>
                    <button class="mt-8 px-8 py-4 bg-indigo-700 text-white rounded-full font-semibold text-xl shadow-2xl hover:bg-indigo-600 hover:scale-105 transform transition-all duration-300">
                        Start Exploring
                    </button>
                </div>

                <div class="text-center mb-12 text-white italic">
                    <p class="text-xl opacity-90 transform transition-all duration-500 hover:opacity-100">"A book is a dream that you hold in your hand." - Neil Gaiman</p>
                </div>

                <div class="grid grid-cols-3 gap-8 mb-12 text-center">
                    <div class="bg-white p-6 rounded-xl shadow-xl hover:scale-105 transform transition-all duration-300 hover:translate-y-2">
                        <h3 class="text-3xl font-bold text-teal-600">1,500+ Titles</h3>
                        <p class="text-lg text-gray-600">Books in your collection</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-xl hover:scale-105 transform transition-all duration-300 hover:translate-y-2">
                        <h3 class="text-3xl font-bold text-teal-600">350+ Readers</h3>
                        <p class="text-lg text-gray-600">Library members reading</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-xl hover:scale-105 transform transition-all duration-300 hover:translate-y-2">
                        <h3 class="text-3xl font-bold text-teal-600">150+ Requests</h3>
                        <p class="text-lg text-gray-600">Book requests made</p>
                    </div>
                </div>

                <div class="mb-12">
                    <h2 class="text-4xl font-extrabold text-white mb-6">Features You'll Love</h2>
                    <div class="grid grid-cols-2 gap-8 text-left">
                        <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 hover:translate-y-2">
                            <h3 class="text-2xl font-semibold text-indigo-600">Track Your Borrowed Books</h3>
                            <p class="text-lg text-gray-700">Easily manage your borrowed books and view their statuses.</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-lg hover:scale-105 transform transition-all duration-300 hover:translate-y-2">
                            <h3 class="text-2xl font-semibold text-indigo-600">Reading Statistics</h3>
                            <p class="text-lg text-gray-700">Get insights into your reading habits and progress.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-white mb-6">Ready to Begin Your Adventure?</h2>
                    <button class="px-8 py-4 bg-indigo-600 text-white font-semibold rounded-full shadow-2xl hover:bg-indigo-500 hover:scale-105 transform transition-all duration-300">
                        Start Now
                    </button>
                </div>
            </div>


            <!-- My Account Section -->
            <div id="myaccount" class="hidden hidden-section">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6">
                <h3 class="text-2xl font-bold mb-6 text-indigo-700 text-center">My Account</h3>
                <?php
                $u = new data;
                $recordset = $u->userdetail($userId);

                if (!empty($recordset)) {
                    echo "<div class='space-y-4'>";
                    echo "  <div class='flex justify-between border-b pb-2'>";
                    echo "    <span class='font-semibold text-gray-700'>Name:</span>";
                    echo "    <span class='text-gray-900'>" . htmlspecialchars($recordset['name']) . "</span>";
                    echo "  </div>";
                    
                    echo "  <div class='flex justify-between border-b pb-2'>";
                    echo "    <span class='font-semibold text-gray-700'>Email:</span>";
                    echo "    <span class='text-gray-900'>" . htmlspecialchars($recordset['email']) . "</span>";
                    echo "  </div>";
                    
                    echo "  <div class='flex justify-between'>";
                    echo "    <span class='font-semibold text-gray-700'>Account Type:</span>";
                    echo "    <span class='text-gray-900'>" . htmlspecialchars($recordset['type']) . "</span>";
                    echo "  </div>";
                    echo "</div>";
                } else {
                    echo "<p class='text-red-500 text-center'>User data not found.</p>";
                }
                ?>
            </div>
            </div>



            <!-- Book Requests -->
            <div id="bookrequest" class="hidden hidden-section">
                <h3 class="text-xl font-bold mb-4">Book Requests</h3>
                <a href="books.php" class="text-blue-500 underline">View Books</a>
            </div>

            <!-- Book Report -->
            <div id="bookreport" class="hidden hidden-section">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-4">Book Record</h3>
                    <?php
                    $u = new data;
                    $recordset = $u->getissuebook($userId);

                    echo "<table class='min-w-full table-auto border-collapse border border-gray-300'>";
                    echo "<thead class='bg-gray-200'>
                            <tr>
                                <th class='px-6 py-4 text-left border'>Name</th>
                                <th class='px-6 py-4 text-left border'>Book Name</th>
                                <th class='px-6 py-4 text-left border'>Issue Date</th>
                                <th class='px-6 py-4 text-left border'>Return Date</th>
                                <th class='px-6 py-4 text-left border'>Fine</th>
                                <th class='px-6 py-4 text-left border'>Return</th>
                            </tr>
                          </thead><tbody>";

                    foreach ($recordset as $row) {
                        echo "<tr class='border-b'>
                                <td class='px-6 py-4 border'>{$row[0]}</td>
                                <td class='px-6 py-4 border'>{$row[2]}</td>
                                <td class='px-6 py-4 border'>{$row[3]}</td>
                                <td class='px-6 py-4 border'>{$row[6]}</td>
                                <td class='px-6 py-4 border'>{$row[7]}</td>
                                <td class='px-6 py-4 border'>
                                    <a href='UserDashboard.php?returnid={$row[0]}&userlogid=$userId'>
                                        <button type='button' class='bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600'>Return</button>
                                    </a>
                                </td>
                              </tr>";
                    }

                    echo "</tbody></table>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script>
    function openSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.hidden-section').forEach(div => div.classList.add('hidden'));
            
            // Show the selected section
            document.getElementById(sectionId).classList.remove('hidden');
            
            // Hide placeholder
            document.getElementById('placeholder').classList.add('hidden');
            }

            // Show placeholder if no section is open
            document.addEventListener("DOMContentLoaded", function() {
                const allSections = document.querySelectorAll('.hidden-section');
                const visibleSection = Array.from(allSections).some(section => !section.classList.contains('hidden'));

                if (!visibleSection) {
                    document.getElementById('placeholder').classList.remove('hidden');
                }
            });

        setTimeout(function() {
            var messageDiv = document.getElementById("statusMessage");
            if (messageDiv) {
                messageDiv.style.display = "none";
            }
        }, 3000);
    </script>
</body>
</html>
