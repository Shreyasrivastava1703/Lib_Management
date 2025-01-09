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
    
// Start session to retrieve user data
    

    include("dataClass.php");
    // Retrieve user ID from session
    $userloginid=$_SESSION["userId"] = $_GET['userid'];
    
    if (!$userloginid) {
        echo "<div class='bg-red-100 text-red-800 border border-red-300 p-4 rounded-lg my-4 mx-4'>
            User not logged in. Please log in to view your account.
        </div>";
        exit;
    }
        
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
            $u->setconnection();
            $recordset=$u->userdetail($userloginid);
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
            <div id="bookrequest" class="hidden hidden-section">
                <a href="books.php"> REQUEST A BOOK</ahref>

            </div>

        </div>
    </div>
<script>
    console.log('Script loaded');  // Check if the script is loaded

    function openSection(sectionId) {
        console.log('openSection called');  // Check if function is called
        document.querySelectorAll('.hidden-section').forEach(div => div.classList.add('hidden'));
        document.getElementById(sectionId).classList.remove('hidden');
    }
</script>
</body>
</html>
