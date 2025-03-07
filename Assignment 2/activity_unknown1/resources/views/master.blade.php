<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-nav .nav-link {
            margin-right: 1rem;
            transition: color 0.3s, background-color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            background-color: #495057;
            color: #fff;
            border-radius: 0.25rem;
        }

        footer {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold">@yield('header')</h1>
        </div>

        <div class="bg-white p-4 p-md-5 shadow rounded">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; 2025 Hatdog Corporated. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>
