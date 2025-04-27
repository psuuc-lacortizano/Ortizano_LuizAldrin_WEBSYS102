<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-blue-600 text-white py-4 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-2xl font-bold">Student QR Code Manager</h1>
        </div>
    </header>
    <main class="container mx-auto px-4 py-8 flex-grow">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Student QR Code Manager. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>