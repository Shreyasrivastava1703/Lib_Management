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
        $msg = $_REQUEST['msg'] ?? '';
        if ($msg === "done") {
            echo "<div class='bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg my-4 mx-4'>Action successfully completed!</div>";
        } elseif ($msg === "fail") {
            echo "<div class='bg-red-100 text-red-800 border border-red-300 p-4 rounded-lg my-4 mx-4'>Action failed!</div>";
        }
    ?>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 bg-white shadow-lg px-4 py-6">
            <h2 class="text-2xl font-semibold mb-6">Admin Dashboard</h2>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('addbook')">Add Book</button> 
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('bookreport')">Book Report</button>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('bookrequestapprove')">Book Requests</button>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('addperson')">Add Student</button>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('studentrecord')">Student Report</button>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('issuebook')">Issue Book</button>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('issuebookreport')">Issue Report</button>
            <a href="index.php" class="w-full block text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4">Logout</a>
        </div>


        <div class="w-full md:w-3/4 bg-gray-50 p-6">
            <!-- add book -->
            <div id="addbook" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4">Add New Book</h3>
                <form action="addBook.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div>
                        <label class="block font-medium">Book Name:</label>
                        <input type="text" name="bookname" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Detail:</label>
                        <input type="text" name="bookdetail" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Author:</label>
                        <input type="text" name="bookauthor" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Publication:</label>
                        <input type="text" name="bookpub" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Branch:</label>
                        <div class="space-x-4">
                            <label><input type="radio" name="branch" value="Other" class="mr-2"> Other</label>
                            <label><input type="radio" name="branch" value="CSE" class="mr-2"> CSE</label>
                            <label><input type="radio" name="branch" value="ELECTRONICS" class="mr-2"> ELECTRONICS</label>
                            <label><input type="radio" name="branch" value="ELECTRICAL" class="mr-2"> ELECTRICAL</label>
                            <label><input type="radio" name="branch" value="MECHANICAL" class="mr-2"> MECHANICAL</label>
                            <label><input type="radio" name="branch" value="CIVIL" class="mr-2"> CIVIL</label>
                        </div>
                    </div>
                    <div>
                        <label class="block font-medium">Price:</label>
                        <input type="number" name="bookprice" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Quantity:</label>
                        <input type="number" name="bookquantity" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Photo:</label>
                        <input type="file" name="bookphoto" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Submit</button>
                </form>
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

            <!-- Book Report-->
            <div id="bookreport" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4 ">Book Record</h3>
                
               <?php
                $u=new data;
                $u->setconnection();
                $recordset=$u->getbook();

               $table="<table class='min-w-full bg-white border border-gray-200'>
               <tr>
               <th class='border px-4 py-2'>Book Name</th>
               <th class='border px-4 py-2'>Price</th>
               <th class='border px-4 py-2'>Quantity</th>
               <th class='border px-4 py-2'>Available</th>
               <th class='border px-4 py-2'>Rent</th>
               <th class='border px-4 py-2'>View</th>
               </tr>";
            
                foreach ($recordset as $row){
                    $table.="<tr>";
                    "<td>$row[0]</td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[7]</td>";
                    $table.="<td>$row[8]</td>";
                    $table.="<td>$row[9]</td>";
                    $table.="<td>$row[10]</td>";
                    $table.="<td><a href='viewBook.php?viewid=$row[0]'><button type='button'>View BOOK </button></a></td>";
                    //$table.="<td><a href='deleteBook.php?viewid=$row[0]'><button type='button'>Delete BOOK </button></a></td>";
                    $table.="</tr>";
                }
                $table.="</table>";
                echo $table;
                ?>
                
               
            </div>
            <!-- book detail-->



            

            <!-- Book Request Approve -->

            <div id="bookrequestapprove" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4">Book Request Approve</h3>

                <?php
                // Create an instance of the `data` class and fetch book request data
                $u = new data;
                $u->setconnection();
                $recordset = $u->requestbookdata();

                // Initialize the table structure
                $table = "<table class='min-w-full bg-white border border-gray-200'>
                <tr>
                    <th class='border px-4 py-2'>Person Name</th>
                    <th class='border px-4 py-2'>Person Type</th>
                    <th class='border px-4 py-2'>Book Name</th>
                    <th class='border px-4 py-2'>Days</th>
                    <th class='border px-4 py-2'>Approve</th>
                </tr>";
                // Loop through the fetched records and populate the table rows
                foreach ($recordset as $row) {
                    $table .= "<tr>";
                    $table .= "<td class='border px-4 py-2'>{$row[3]}</td>"; // Person Name
                    $table .= "<td class='border px-4 py-2'>{$row[4]}</td>"; // Person Type
                    $table .= "<td class='border px-4 py-2'>{$row[5]}</td>"; // Book Name
                    $table .= "<td class='border px-4 py-2'>{$row[6]}</td>"; // Days
                    $table .= "<td class='border px-4 py-2'>
                    <a href='approvebookrequest.php?reqid={$row[0]}&book={$row[5]}&userselect={$row[3]}&days={$row[6]}'>
                        <button type='button' class='bg-blue-500 text-white px-4 py-2 rounded-lg'>Approve</button>
                    </a>
                            </td>";
                    $table .="</tr>";
                }

                $table .= "</table>";

                // Echo the constructed table
                echo $table;
                ?>
            </div>



            <!-- Student record -->
            <div id="studentrecord" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4 ">Student Record</h3>
                
               <?php
                $u=new data;
                $u->setconnection();
                $recordset=$u->userdata();

               $table="<table class='min-w-full bg-white border border-gray-200'>
                <tr>
                    <th class='border px-4 py-2'>Name</th>
                    <th class='border px-4 py-2'>Email</th>
                    <th class='border px-4 py-2'>Type</th>
                 </tr>";
                foreach ($recordset as $row) {
                    $table.="<tr>";
                    "<td>$row[0]</td>";
                    $table.="<td>$row[1]</td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[4]</td>";
                   $table.="<td><a href='deleteUser.php?userid=$row[0]'><button type='button'>Delete </button></a></td>";
                    $table.= "</tr>";

                }
                $table.="</table>";
                echo $table;
                ?>
            </div>

            <!-- issue book-->
           
            <div id="issuebook" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4">Issue Book</h3>
                <form action="issueBook.php" method="POST" class="space-y-4">
                    <div>
                        <label class="block font-medium">Select User:</label>
                        <select name="user" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                        
                            <?php
                            $u = new data;
                            $u->setconnection();
                            $recordset = $u->userdata();
                            foreach ($recordset as $row) {
                                echo "<option value='{$row['id']}'>{$row['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium">Select Book:</label>
                        <select name="book" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                            <?php
                            $u = new data;
                            $u->setconnection();
                            $recordset= $u->getbooks(); // Get list of books from database
                            foreach ($recordset as $row) {
                                echo "<option value='{$row['id']}'>{$row['bookName']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!--<div>
                        <label class="block font-medium">Issue Date:</label>
                        <input type="date" name="issue_date" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Return Date:</label>
                        <input type="date" name="return_date" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    </div>-->
                    <label>Days</label> 
                    <input type="number" name="days"/>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Issue Book</button>
                </form>
            </div>
            
        

        

            <!--issue book report-->
            <div id="issuebookreport" class="hidden hidden-section">
                <h3 class="text-2xl font-semibold mb-4 ">Issue Book Record</h3>
                
               <?php
               
                $u=new data;
                $u->setconnection();
                $recordset=$u->issuereport();

               $table="<table class='min-w-full bg-white border border-gray-200'>
               <tr>
               <th class='border px-4 py-2'>Issue Name</th>
               <th class='border px-4 py-2'>Book Name</th>
               <th class='border px-4 py-2'>Isuue Date</th>
               <th class='border px-4 py-2'>Return Date</th>
               <th class='border px-4 py-2'>Fine</th>
               <th class='border px-4 py-2'>Issue Type</th>
               </tr>";
            
                foreach ($recordset as $row) {
                    $table.="<tr>";
                   //"<td>$row[0]</td>";
                    $table.="<td>$row[2]</td>";
                    $table.="<td>$row[3]</td>";
                    $table.="<td>$row[6]</td>";
                    $table.="<td>$row[9]</td>";
                    $table.="<td>$row[9]</td>";
                    $table.= "<td>$row[4]</td>";
                   // $table.="<td><a href='adminDashboard.php?viewid=$row[0]'><button type='button'>View BOOK </button></a></td>";
                    $table.= "</tr>";

                }
                $table.="</table>";
                echo $table;
                ?>
            </div>
            

        </div>
    </div>

    <script>
        function openSection(sectionId) {
            document.querySelectorAll('.hidden-section').forEach(div => div.classList.add('hidden')); //hide all
            document.getElementById(sectionId).classList.remove('hidden');//show selected(id)
        }

    </script>
</body>
</html>
