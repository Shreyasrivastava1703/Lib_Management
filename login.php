<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[url('./libImage/bg10.jpg')] bg-cover bg-center bg-no-repeat h-screen flex items-center justify-start">
    <div class="bg-white/30 w-full sm:w-[350px] md:w-[400px] lg:w-[450px] h-auto rounded-lg shadow-lg px-6 py-8 mx-4 ml-[90px] ">
        <form action="loginBackend.php" method="GET" class="space-y-5">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700"></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    class="mt-1 block px-4 py-2 w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 transition duration-300"
                    required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700"></label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    class="mt-1 block px-4 py-2 w-full border border-gray-300 rounded-md shadow-sm sm:text-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-500 transition duration-300"
                    required>
            </div>
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md shadow-md hover:shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300">
                    Login
                </button>
            </div>
        </form>
        <p class="text-center text-sm text-gray-700 mt-6 font-medium">
            Don't have an account?<br>Contact the admin to register
        </p>
    </div>
</body>
</html>
