<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    <?php
    include("dataClass.php");
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
    } else {

        header("Location: login.php?msg=Login first");
        exit();
    }
        
    $msg = $_REQUEST['msg'] ?? '';
    if ($msg === "done") {
        echo "<div class='bg-green-100 text-green-800 border border-green-300 p-4 rounded-lg my-4 mx-4'>Action successfully completed!</div>";
    } elseif ($msg === "fail") {
        echo "<div class='bg-red-100 text-red-800 border border-red-300 p-4 rounded-lg my-4 mx-4'>Action failed!</div>";
    }
    ?>
    <div class="flex flex-col md:flex-row min-h-screen">
        <div class="w-full md:w-1/4 bg-white shadow-lg px-4 py-6">
            <h2 class="text-2xl font-semibold mb-6">User Dashboard</h2>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('myaccount')">MY Account</button> 
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('bookreport')">Book Report</button>
            <button class="w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4" onclick="openSection('bookrequest')">Book Requests</button>

            <a href="index.php" class="w-full block text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg mb-4">Logout</a>
        </div>


        <div class="w-full md:w-3/4 bg-gray-50 p-6"> 
            <!--my account-->
            <div id="myaccount" class="hidden hidden-section">
            <Button>My Account</Button>

            <?php

            $u=new data;
            $u->setConnection();
            $recordset=$u->userdetail($userId);
            foreach($recordset as $row){
                $id= $row[0];
                $name= $row[1];
                $email= $row[2];
                $pass= $row[3];
                $type= $row[4];
            }               
            ?>

            <p class="text-gray-700"><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p class="text-gray-700"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p class="text-gray-700"><strong>Account Type:</strong> <?php echo htmlspecialchars($type); ?></p>

        
            </div>

            <!--book request-->
            <div id="bookrequest" class="hidden hidden-section">
                <a href="books.php"> REQUEST A BOOK</ahref>

            </div>


            <!--book report-->
            <div id="bookreport" class="hidden hidden-section">
                <div class="bg-white p-6 rounded-lg shadow-md">
                <Button class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">BOOK RECORD</Button>
                <?php
                $u=new data;
                $u->setConnection();
                $u->getissuebook($userId);
                $recordset=$u->getissuebook($userId);
                
                echo "<table class='min-w-full table-auto border-collapse border border-gray-300'>";
                    echo "<th class='bg-gray-200'>
                            <tr>
                                <th class='px-6 py-4 text-left'>Name</th>
                                <th class='px-6 py-4 text-left'>Book Name</th>
                                <th class='px-6 py-4 text-left'>Issue Date</th>
                                <th class='px-6 py-4 text-left'>Return Date</th>
                                <th class='px-6 py-4 text-left'>Fine</th>
                                <th class='px-6 py-4 text-left'>Return</th>
                            </tr>
                        </th>
                        
                    <tbody>";
                    foreach ($recordset as $row) {
                        echo "<tr class='border-b'>
                                <td class='px-6 py-4'>{$row[0]}</td>
                                <td class='px-6 py-4'>{$row[2]}</td>
                                <td class='px-6 py-4'>{$row[3]}</td>
                                <td class='px-6 py-4'>{$row[6]}</td>
                                <td class='px-6 py-4'>{$row[7]}</td>
                                <td class='px-6 py-4'>
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
    console.log('Script loaded');  

    function openSection(sectionId) {
        console.log('openSection called'); 
        document.querySelectorAll('.hidden-section').forEach(div => div.classList.add('hidden'));
        document.getElementById(sectionId).classList.remove('hidden');
    }
</script>
</body>
</html>
