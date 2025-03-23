<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    <?php
        include("dataClass.php");
        if (isset($_SESSION['adminId'])) {
            $adminId = $_SESSION['adminId'];
        } else {
            header("Location: login.php?msg=Login first");
            exit();
        }
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
    <div class="flex flex-col md:flex-row min-h-screen">
        
        <div class="fixed top-0 left-0 h-full w-64 bg-gradient-to-r from-purple-600 to-violet-700 text-white shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center text-white mb-8">Dashboard</h2>
            <button onclick="openSection('addbook')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>Add Book</b></button>
            <button onclick="openSection('bookreport')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>Book Record</b></button>
            <button onclick="openSection('bookrequestapprove')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>Book Requests</b></button>
            <button onclick="openSection('addperson')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>Add User</b></button>
            <button onclick="openSection('studentrecord')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>User Record</b></button>
            <button onclick="openSection('issuebook')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>Issue Book</b></button>
            <button onclick="openSection('issuebookreport')" class="w-full py-3 mb-4 text-center bg-purple-700 hover:bg-purple-800 text-white rounded-lg"><b>Issue Book Record</b></button>
            <button class="w-full py-3 mt-4 text-center bg-red-500 hover:bg-red-700 text-white rounded-lg">
                <a href="logout.php" class="text-white"><b>Logout</b></a>
            </button>
        </div>


        <div class="w-full  bg-gray-50 p-6 ml-64 ">

                
            <!-- page When No Section is Open -->
            <div id="placeholder" class="text-center p-16 bg-gradient-to-r from-teal-500 via-blue-600 to-indigo-700 rounded-xl shadow-lg ">
                <div class="mb-8">
                    <h2 class="text-4xl font-bold text-white leading-tight">
                        Welcome to Your Admin Dashboard!
                    </h2>
                    <p class="text-lg text-white mt-4 opacity-80">
                        Efficiently manage your library with ease.
                    </p>
                    <button class="mt-6 px-6 py-3 bg-white text-indigo-600 rounded-full font-semibold text-lg shadow-lg hover:bg-indigo-600 hover:text-white transition-colors">
                        Get Started
                    </button>
                </div>
                <div class="text-center mb-12 text-white italic">
                    <p class="text-lg opacity-80">"An admin's work is never done. But through dedication and organization, success is always within reach."</p>
                </div>
                <div class="grid grid-cols-3 gap-8 mb-12 text-center">
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-2xl font-bold text-indigo-700">1,500+ Books</h3>
                        <p class="text-lg text-gray-600">Books in your library</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-2xl font-bold text-indigo-700">450+ Users</h3>
                        <p class="text-lg text-gray-600">Active users</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-2xl font-bold text-indigo-700">300+ Reports</h3>
                        <p class="text-lg text-gray-600">Reports generated</p>
                    </div>
                </div>
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-white mb-6">Key Features</h2>
                    <div class="grid grid-cols-2 gap-8 text-left">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-2xl font-semibold text-indigo-700">Easy Book Management</h3>
                            <p class="text-lg text-gray-700">Add, remove, or edit books with ease.</p>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-2xl font-semibold text-indigo-700">User Management</h3>
                            <p class="text-lg text-gray-700">Manage and track library users.</p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h2 class="text-2xl font-bold text-white mb-6">Ready to Start?</h2>
                    <button class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-full shadow-lg hover:bg-indigo-800 transition-colors">
                        Start Now
                    </button>
                </div>
            </div>

            <!-- add book -->
            <div id="addbook" class="hidden hidden-section min-h-screen flex justify-center items-center bg-gray-100 p-6">
                <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-3xl font-semibold mb-4 text-center text-gray-800">Add New Book</h3>
                    <form action="addBook.php" method="POST" enctype="multipart/form-data" class="space-y-4">

                        <div>
                            <label class="block text-lg font-medium text-gray-700">Book Name:</label>
                            <input type="text" name="bookname" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        </div>

                        <div>
                            <label class="block text-lg font-medium text-gray-700">Detail:</label>
                            <input type="text" name="bookdetail" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        </div>

                        <div>
                            <label class="block text-lg font-medium text-gray-700">Author:</label>
                            <input type="text" name="bookauthor" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        </div>

                        <div>
                            <label class="block text-lg font-medium text-gray-700">Publication:</label>
                            <input type="text" name="bookpub" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-lg font-medium text-gray-700">Price:</label>
                                <input type="number" name="bookprice" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                            </div>
                            <div>
                                <label class="block text-lg font-medium text-gray-700">Quantity:</label>
                                <input type="number" name="bookquantity" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-lg font-medium text-gray-700">Photo:</label>
                            <input type="file" name="bookphoto" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                        </div>
                        <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 focus:outline-none">
                            Submit
                        </button>
                    </form>
                </div>
            </div>



            <!-- add person -->
            <div id="addperson" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4">Add New User</h3>
                <form  action="addUser.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label class="block font-medium">Name:</label>
                        <input type="text" name="addname" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Email:</label>
                        <input type="email" name="addemail" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Password:</label>
                        <input type="password" name="addpass" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    
                    <label class="block font-medium">Type:</label>
                    <div class="space-x-4">
                        <label><input type="radio" name="type" value="Student" class="mr-2"> Student</label>
                        <label><input type="radio" name="type" value="Teacher" class="mr-2"> Teacher</label>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit</button>
                </form>
            </div>

            <!-- Book Report -->
            <div id="bookreport" class="hidden hidden-section p-4">
                <h3 class="text-2xl font-bold text-center mb-4">Book Record</h3>
                <table class="w-full bg-white border">
                    <thead>
                        <tr class="bg-blue-500">
                            <th class="border p-2 text-white">Book Name</th>
                            <th class="border p-2 text-white">Price</th>
                            <th class="border p-2 text-white">Quantity</th>
                            <th class="border p-2 text-white">Available</th>
                            <th class="border p-2 text-white">Rent</th>
                            <th class="border p-2 text-white">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $u = new data;
                            $recordset = $u->getbook();
                            foreach ($recordset as $row) {
                                echo "<tr class='hover:bg-gray-100'>";
                                echo "  <td class='border p-2'>{$row['bookName']}</td>";
                                echo "  <td class='border p-2'>{$row['price']}</td>";
                                echo "  <td class='border p-2'>{$row['quantity']}</td>";
                                echo "  <td class='border p-2'>{$row['bookAva']}</td>";
                                echo "  <td class='border p-2'>{$row['bookRent']}</td>";
                                echo "  <td class='border p-2 text-center'>";
                                echo "      <a href='viewBook.php?viewid={$row['id']}'>";
                                echo "          <button class='bg-blue-500 text-white p-2 rounded'>View BOOK</button>";
                                echo "      </a>";
                                echo "  </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Book Request Approve -->
            <div id="bookrequestapprove" class="hidden hidden-section p-4">
                <h3 class="text-2xl font-bold text-center mb-4">Book Requests</h3>
                <table class="w-full bg-white border">
                    <thead class="bg-blue-500">
                        <tr>
                            <th class="border p-2 text-white">Person Name</th>
                            <th class="border p-2 text-white">Person Type</th>
                            <th class="border p-2 text-white">Book Name</th>
                            <th class="border p-2 text-white">Days</th>
                            <th class="border p-2 text-white">Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $u = new data;
                            $recordset = $u->requestbookdata();
                            foreach ($recordset as $row) {
                                echo "<tr class='hover:bg-gray-100'>";
                                echo "  <td class='border p-2'>{$row['userName']}</td>";
                                echo "  <td class='border p-2'>{$row['userType']}</td>";
                                echo "  <td class='border p-2'>{$row['bookName']}</td>";
                                echo "  <td class='border p-2'>{$row['issueDays']}</td>";
                                echo "  <td class='border p-2 text-center'>";
                                echo "      <a href='approvebookrequest.php?reqid={$row['id']}&book={$row['bookid']}&userselect={$row['userId']}&days={$row['issueDays']}'>";
                                echo "          <button class='bg-blue-500 text-white p-2 rounded'>Approve</button>";
                                echo "      </a>";
                                echo "  </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>


            <!--student report-->
            <div id="studentrecord" class="hidden hidden-section">
                <h3 class="text-2xl font-bold text-center mb-4">User Record</h3>
                <?php
                    $u = new data;
                    $recordset = $u->userdata();
                    
                    $table = "<table class='min-w-full bg-white border border-gray-200'>
                                <tr class='bg-blue-500 text-white'>
                                    <th class='border font-semibold px-4 py-2'>Name</th>
                                    <th class='border font-semibold px-4 py-2'>Email</th>
                                    <th class='border font-semibold px-4 py-2'>Type</th>
                                    <th class='border font-semibold px-4 py-2'>Action</th>
                                </tr>";
                    
                    foreach ($recordset as $row) {
                        $table .= "<tr>
                                    <td class='border px-4 py-2'>$row[name]</td>
                                    <td class='border px-4 py-2'>$row[email]</td>
                                    <td class='border px-4 py-2'>$row[type]</td>
                                    <td class='border px-4 py-2'>
                                        <a href='deleteUser.php?userid=$row[id]'>
                                            <button class='bg-red-500 text-white py-1 px-3 rounded'>Delete</button>
                                        </a>
                                    </td>
                                </tr>";
                    }
                    
                    $table .= "</table>";
                    echo $table;
                ?>
            </div>


            <!-- issue book-->
            <div id="issuebook" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4">Issue Book </h3>
                <form action="issueBook.php" method="POST" class="space-y-4">
                    <div>
                        <label class="block font-medium">Select User:</label>
                        <select name="user" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        
                            <?php
                            $u = new data;
                            $recordset = $u->userdata();
                            foreach ($recordset as $row) {
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium">Select Book:</label>
                        <select name="book" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-black" required>
                            <?php
                            $u = new data;
                            $recordset= $u->getbooks(); // Get list of books from database
                            foreach ($recordset as $row) {
                                echo "<option value='{$row['id']}'>{$row['bookName']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <label>Days</label> 
                    <input type="number" name="days" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Issue Book</button>
                </form>
            </div>
                
            

            

            <!-- Issue Book Record -->
            <div id="issuebookreport" class="hidden hidden-section">
                <h3 class="text-2xl font-bold text-center mb-4">Issue Book Record</h3>
                <?php
                    $u = new data;
                    $recordset = $u->issuereport();

                    $table = "<table class='min-w-full bg-white border border-gray-200'>
                                <tr class='bg-blue-500 text-white font-semibold'>
                                    <th class='border px-4 py-2'>Issue Name</th>
                                    <th class='border px-4 py-2'>Book Name</th>
                                    <th class='border px-4 py-2'>Issue Date</th>
                                    <th class='border px-4 py-2'>Return Date</th>
                                    <th class='border px-4 py-2'>Fine</th>
                                    <th class='border px-4 py-2'>Issue Type</th>
                                </tr>";

                    foreach ($recordset as $row) {
                        $table .= "<tr>
                                    <td class='border px-4 py-2'>$row[2]</td>
                                    <td class='border px-4 py-2'>$row[3]</td>
                                    <td class='border px-4 py-2'>$row[6]</td>
                                    <td class='border px-4 py-2'>$row[7]</td>
                                    <td class='border px-4 py-2'>$row[8]</td>
                                    <td class='border px-4 py-2'>$row[4]</td>
                                </tr>";
                    }

                    $table .= "</table>";
                    echo $table;
                ?>
            </div>

        </div>
    </div>

    <script>
        setTimeout(function() {
            var messageDiv = document.getElementById("statusMessage");
            if (messageDiv) {
                messageDiv.style.display = "none"; // Hide the message
            }
        }, 3000); // Removes after 3 seconds

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
    </script>
</body>
</html>
