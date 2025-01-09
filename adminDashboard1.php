<?php
session_start();

$adminid=$_SESSION["adminid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<header class="bg-gray-800 text-white p-4 flex justify-between items-center">
      <h1 class="text-2xl font-semibold">Welcome Admin</h1>
      <div class="flex items-center space-x-4">
      <a href="books.php">
       <button class="bg-blue-500 px-4 py-2 rounded-md text-white hover:bg-white-600">Books</button>
      </a>
        <input 
          type="text" 
          placeholder="Search..." 
          class=" text-black px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <a href="logout.php">
        <button class="bg-red-500 px-4 py-2 rounded-md text-white hover:bg-red-600">Logout</button>
        </a>
      </div>
    </header>

  <div class="min-h-screen flex flex-row">
     <!-- Main Container
  <div class="flex justify items-start "> 
    <button class="bg-blue-500 " oneclick="openpart('addbook')"> ADD BOOK</button>
    <button class="bg-blue-500 " oneclick="openpart('bookReport')">BOOK REPORT</button>
    <button class="bg-blue-500 " oneclick="openpart('addPerson')">ADD USER</button>
    <button class="bg-blue-500 " oneclick="openpart('addbook')"> BOOK REQUEST</button>
    <button class="bg-blue-500 " oneclick="openpart('addbook')"> STUDENT REPORT</button>
    <button class="bg-blue-500 " oneclick="openpart('addbook')"> Add Book</button>
    <button class="bg-blue-500 " oneclick="openpart('addbook')"> Add Book</button>
    <button class="bg-blue-500 " oneclick="openpart('addbook')"> Add Book</button>
  </div>
   Header -->
   
<div class="w-full flex justify-items-center">
<main class="col-span-6 bg-white shadow-md p-6 rounded-md w-full">
        <h2 class="text-xl font-semibold mb-4 text-center">Users</h2>
        <table class="w-full border-collapse border border-gray-300 text-left text-sm">
          <thead>
            <tr class="bg-gray-100">
              <th class="border border-gray-300 px-4 py-2">User ID</th>
              <th class="border border-gray-300 px-4 py-2">Name</th>
              <th class="border border-gray-300 px-4 py-2">Issued Books</th>
              <th class="border border-gray-300 px-4 py-2">Issue Date</th>
              <th class="border border-gray-300 px-4 py-2">Due Date</th>
              <th class="border border-gray-300 px-4 py-2">Type</th>
              <th class="border border-gray-300 px-4 py-2">Fine</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border border-gray-300 px-4 py-2">001</td>
              <td class="border border-gray-300 px-4 py-2">John Doe</td>
              <td class="border border-gray-300 px-4 py-2">3</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-20</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-30</td>
              <td class="border border-gray-300 px-4 py-2">Student</td>
              <td class="border border-gray-300 px-4 py-2">$5</td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-4 py-2">001</td>
              <td class="border border-gray-300 px-4 py-2">John Doe</td>
              <td class="border border-gray-300 px-4 py-2">3</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-20</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-30</td>
              <td class="border border-gray-300 px-4 py-2">Student</td>
              <td class="border border-gray-300 px-4 py-2">$5</td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-4 py-2">001</td>
              <td class="border border-gray-300 px-4 py-2">John Doe</td>
              <td class="border border-gray-300 px-4 py-2">3</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-20</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-30</td>
              <td class="border border-gray-300 px-4 py-2">Student</td>
              <td class="border border-gray-300 px-4 py-2">$5</td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-4 py-2">001</td>
              <td class="border border-gray-300 px-4 py-2">John Doe</td>
              <td class="border border-gray-300 px-4 py-2">3</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-20</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-30</td>
              <td class="border border-gray-300 px-4 py-2">Student</td>
              <td class="border border-gray-300 px-4 py-2">$5</td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-4 py-2">001</td>
              <td class="border border-gray-300 px-4 py-2">John Doe</td>
              <td class="border border-gray-300 px-4 py-2">3</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-20</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-30</td>
              <td class="border border-gray-300 px-4 py-2">Student</td>
              <td class="border border-gray-300 px-4 py-2">$5</td>
            </tr>
            <tr>
              <td class="border border-gray-300 px-4 py-2">001</td>
              <td class="border border-gray-300 px-4 py-2">John Doe</td>
              <td class="border border-gray-300 px-4 py-2">3</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-20</td>
              <td class="border border-gray-300 px-4 py-2">2024-12-30</td>
              <td class="border border-gray-300 px-4 py-2">Student</td>
              <td class="border border-gray-300 px-4 py-2">$5</td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </main>
</div>
      
      <div class="justify-items-end overflow-hidden">
      <img 
        src="libImage/pexels-minan1398-694740.jpg" 
        alt="Library" 
        class=" w-full h-screen rounded-md shadow-lg flex justify-right"
      />
      </div>
    </div>


</body>
</html>
