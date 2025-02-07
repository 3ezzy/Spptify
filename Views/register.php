<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// ... rest of your code
require_once __DIR__ . '/../Controllers/UserController.php';
require_once __DIR__ . '/../config/database.php';

$userController = new UserController($db);
$userController->handleRegister();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMusic - Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-gray-800 rounded-xl shadow-2xl overflow-hidden">
        <div class="grid md:grid-cols-1 gap-6 p-6 md:p-8">
            <!-- Responsive Logo Section -->
            <div class="text-center mb-4 md:mb-6">
                <div class="flex justify-center mb-2 md:mb-4">
                    <i class="fas fa-music text-3xl md:text-4xl text-green-500"></i>
                </div>
                <h2 class="text-xl md:text-2xl font-bold text-white">MyMusic</h2>
                <p class="text-sm md:text-base text-gray-400 mt-1 md:mt-2">Create your account</p>
            </div>

            <!-- Responsive Registration Form -->
            <form id="register-form" action="./register.php" method="POST" class="space-y-3 md:space-y-4">
                <!-- Responsive Username Input -->
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1 md:mb-2">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-2 md:pl-3 flex items-center">
                            <i class="fas fa-at text-xs md:text-base text-gray-500"></i>
                        </span>
                        <input
                            name="username"
                            type="text"
                            required
                            placeholder="Choose a unique username"
                            class="w-full pl-8 md:pl-10 pr-3 py-1.5 md:py-2 text-xs md:text-sm bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-white">
                    </div>
                </div>

                <!-- Responsive Email Input -->
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1 md:mb-2">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-2 md:pl-3 flex items-center">
                            <i class="fas fa-envelope text-xs md:text-base text-gray-500"></i>
                        </span>
                        <input
                            name="email"
                            type="email"
                            required
                            placeholder="Enter your email"
                            class="w-full pl-8 md:pl-10 pr-3 py-1.5 md:py-2 text-xs md:text-sm bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-white">
                    </div>
                </div>

                <!-- Responsive Password Input -->
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1 md:mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-2 md:pl-3 flex items-center">
                            <i class="fas fa-lock text-xs md:text-base text-gray-500"></i>
                        </span>
                        <input
                            name="password"
                            type="password"
                            required
                            placeholder="Create a strong password"
                            class="w-full pl-8 md:pl-10 pr-3 py-1.5 md:py-2 text-xs md:text-sm bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-white">
                        <span class="absolute inset-y-0 right-0 pr-2 md:pr-3 flex items-center">
                            <i class="fas fa-eye-slash text-xs md:text-base text-gray-500 cursor-pointer toggle-password"></i>
                        </span>
                    </div>
                    <div class="text-[10px] md:text-xs text-gray-400 mt-1">
                        Password must be at least 8 characters
                    </div>
                </div>

                <!-- Responsive Confirm Password -->
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1 md:mb-2">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-2 md:pl-3 flex items-center">
                            <i class="fas fa-lock text-xs md:text-base text-gray-500"></i>
                        </span>
                        <input
                            name="confirm_password"
                            type="password"
                            required
                            placeholder="Confirm your password"
                            class="w-full pl-8 md:pl-10 pr-3 py-1.5 md:py-2 text-xs md:text-sm bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500 text-white">
                    </div>
                </div>

                <!-- Responsive Account Type -->
                <div>
                    <label class="block text-xs md:text-sm font-medium text-gray-300 mb-1 md:mb-2">Account Type</label>
                    <div class="flex space-x-2 md:space-x-4">
                        <label class="flex items-center text-xs md:text-sm">
                            <input
                                type="radio"
                                name="account-type"
                                value="user"
                                class="mr-1 md:mr-2"
                                checked>
                            User
                        </label>
                        <label class="flex items-center text-xs md:text-sm">
                            <input
                                type="radio"
                                name="account-type"
                                value="artist"
                                class="mr-1 md:mr-2">
                            Artist
                        </label>
                    </div>
                </div>

                <!-- Responsive Terms Checkbox -->
                <div class="flex items-center text-xs md:text-sm">
                    <input
                        type="checkbox"
                        required
                        class="h-3 w-3 md:h-4 md:w-4 text-green-600 bg-gray-700 border-gray-600 rounded">
                    <label class="ml-1 md:ml-2 text-gray-300">
                        I agree to the
                        <a href="#" class="text-green-500 hover:underline">Terms of Service</a>
                    </label>
                </div>

                <!-- Responsive Register Button -->
                <button
                    type="submit"
                    class="w-full bg-green-600 text-white py-1.5 md:py-2 rounded-md hover:bg-green-700 transition duration-300 flex items-center justify-center space-x-2 text-xs md:text-sm">
                    <i class="fas fa-user-plus"></i>
                    <span>Create Account</span>
                </button>

                <!-- Responsive Divider -->
                <div class="flex items-center justify-center my-2 md:my-4">
                    <div class="border-t border-gray-700 w-full"></div>
                    <span class="px-2 md:px-3 text-xs md:text-sm text-gray-500 bg-gray-800">or</span>
                    <div class="border-t border-gray-700 w-full"></div>
                </div>

                <!-- Responsive Social Register -->
                <div class="flex justify-center space-x-2 md:space-x-4">
                    <button class="bg-blue-600 text-white p-1.5 md:p-2 rounded-full hover:bg-blue-700">
                        <i class="fab fa-facebook-f text-xs md:text-base"></i>
                    </button>
                    <button class="bg-red-600 text-white p-1.5 md:p-2 rounded-full hover:bg-red-700">
                        <i class="fab fa-google text-xs md:text-base"></i>
                    </button>
                    <button class="bg-black text-white p-1.5 md:p-2 rounded-full hover:bg-gray-800">
                        <i class="fab fa-apple text-xs md:text-base"></i>
                    </button>
                </div>

                <!-- Responsive Login Link -->
                <div class="text-center mt-2 md:mt-4 text-xs md:text-sm">
                    <span class="text-gray-400">Already have an account? </span>
                    <a href="login.php" class="text-green-500 hover:text-green-400">
                        Login
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Responsive Password Toggle
        document.querySelectorAll('.toggle-password').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const passwordInput = this.closest('.relative').querySelector('input');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });

        // Registration Form Submission
        document.getElementById('register-form').addEventListener('submit', function(e) {
            // e.preventDefault();
            console.log('Registration submitted');
        });
    </script>
</body>

</html>