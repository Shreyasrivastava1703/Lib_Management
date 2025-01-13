<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-600 to-violet-700 text-white min-h-screen">
  <header class="bg-black bg-opacity-80 p-4 shadow-md">
    <nav class="container mx-auto flex justify-between items-center">
      <ul class="flex space-x-6 text-lg font-semibold">
        <li><a href="index.php" class="hover:text-blue-400">Home</a></li>
        <li><a href="books.php" class="hover:text-blue-400">Browse Books</a></li>
        <li><a href="#" class="hover:text-blue-400">Authors</a></li>
        <li><a href="#" class="hover:text-blue-400">About Us</a></li>
      </ul>
      <a href="login.php" class="bg-white text-black px-4 py-2 rounded-lg font-semibold hover:bg-gray-200">Login</a>
    </nav>
  </header>

  <div class="container mx-auto py-20 px-6">
    <div class="flex flex-col md:flex-row items-center">
      <div class="md:w-1/2 text-center md:text-left">
        <h1 class="text-5xl font-bold mb-6">Welcome to Our Library</h1>
        <p class="text-lg mb-8"><i>Discover a world of books, explore authors, and let your knowledge grow with every page.</i></p>
      </div>
      <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
        <img src="libImage/pngtree-group-of-diverse-students-reading-books-in-library-image_16181091.jpg" alt="Library" class="rounded-lg shadow-lg">
      </div>
    </div>
  </div>
  <div class="bg-white text-black py-16">
    <div class="container mx-auto text-center">
      <h2 class="text-3xl font-bold mb-10">What You Can Do</h2>
      <div class="flex flex-wrap justify-center gap-10">
        <div class="w-80 bg-gray-100 p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
          <h3 class="text-xl font-bold mb-4">Browse Books</h3>
          <p>Explore our vast collection of books and find your next great read.</p>
        </div>
        <div class="w-80 bg-gray-100 p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
          <h3 class="text-xl font-bold mb-4">Meet Authors</h3>
          <p>Learn about your favorite authors and their stories.</p>
        </div>
        <div class="w-80 bg-gray-100 p-6 rounded-lg shadow-lg hover:shadow-2xl transition">
          <h3 class="text-xl font-bold mb-4">Request Books</h3>
          <p>Can't find what you're looking for? Request a book to be added!</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
