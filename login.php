<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./libImage/bg10.jpg')] bg-cover bg-center bg-no repeat h-screen overflow-hidden flex items-center">
    <div class="bg-white/25 ml-[129px] w-[450px] h-[400px] my-auto rounded-lg">
        
        <form action="loginBackend.php" method="GET" class="m-[50px] space-y-5 my-[100px]">

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
            <div class="mt-6">
                <button type="submit"
                    class="w-9/12 block mx-auto bg-blue-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Login
                </button>
            </div>
        </form>
        <p class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="signup.php" class="text-blue-600 hover:underline">Signup</a>
        </p>
    </div>
</body>
</html>
