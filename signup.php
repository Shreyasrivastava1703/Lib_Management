<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./libImage/bg10.jpg')] bg-cover bg-center bg-no repeat h-screen overflow-hidden flex items-center">
    <div class="bg-white/25 ml-[129px] w-[450px] h-[500px] my-auto rounded-lg">
        
        <form action="signupBackend.php" method="GET" class="m-[50px] space-y-5">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 "></label>
                <input type="text" id="name" name="name" placeholder="Enter your name"
                    class="mt-1  mx-auto block w-9/12 px-4 py-2  border-gray-300 rounded-md sm:text-sm" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700"></label>
                <input type="email" id="email" name="email" placeholder="Enter your email"
                    class="mt-1 block px-4 py-2 w-9/12 mx-auto border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700"></label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    class="mt-1 block px-4 py-2 w-9/12 mx-auto border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div>
                <label for="confirm-password" class="block text-sm font-medium text-gray-700"></label>
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password"
                    class="mt-1 block px-4 py-2 w-9/12 mx-auto border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
            </div>
            <div class="text-gray-700">
                <label for="user-type" class="block text-sm font-medium text-gray-700"></label>
                <select id="user-type" name="user_type"
                    class="mt-1 block w-9/12 mx-auto px-4 py-2 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm" required>
                    <option value="" disabled selected>Select your type</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="w-9/12 block mx-auto bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Signup
                </button>
            </div>
        </form>
        <p class="text-sm text-center text-gray-600 mt-4">
            Already have an account?
            <a href="login.php" class="text-blue-800 hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
