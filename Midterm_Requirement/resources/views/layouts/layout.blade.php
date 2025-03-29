<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Student System</title>

    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">

    <!-- Font Awesome 6.5.2 CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #EAE7DC;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-bottom: 30px;
        }

        .sidebar .logo {
            width: 57px;
            height: 40px;
            margin-right: 0;
        }

        .sidebar .title {
            font-size: 16px;
            font-weight: 700;
            color: #F4F4F4;
            text-transform: uppercase;
            margin: 0;
            line-height: 1;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: #F4F4F4;
            text-decoration: none;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 8px;
            font-weight: 600;
            position: relative;
            transition: color 0.3s ease;
        }

        .sidebar a i {
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .sidebar a:hover {
            color: #FFC107;
            background-color: transparent;
        }

        .sidebar a:hover i {
            color: #FFC107;
        }

        .sidebar a.active {
            color: #FFC107;
            background-color: transparent;
        }

        .sidebar a.active i {
            color: #FFC107;
        }

        .sidebar a.active::before {
            content: '';
            position: absolute;
            left: -20px;
            top: 0;
            height: 100%;
            width: 5px;
            background-color: #FFC107;
            border-radius: 0;
        }

        /* Logout Section */
        .logout-section {
            margin-top: auto;
            padding-left: 10px;
            padding-bottom: 15px;
        }

        .logout-link {
            display: flex;
            align-items: center;
            color: #F4F4F4;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .logout-link i {
            margin-right: 10px;
            font-size: 16px;
        }

        .logout-link:hover {
            color: #FFC107;
        }

        .content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 20px;
            width: 100%;
            display: block;
            background-color: #F4F4F4;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
                padding: 10px;
            }

            .sidebar .header {
                justify-content: center;
            }

            .sidebar a.active::before {
                width: 100%;
                height: 4px;
                left: 0;
                top: auto;
                bottom: 0;
                border-radius: 4px 4px 0 0;
            }

            .logout-section {
                text-align: center;
            }
        }

        /* Shared Styles for Dashboards */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .dashboard-header h2 {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .dashboard-header .search-bar {
            flex-grow: 1;
            margin: 0 20px;
        }

        .dashboard-header .search-bar input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 14px;
        }

        .dashboard-header .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dashboard-header .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="header">
                <img src="{{ asset('images/logo.png') }}" alt="EduTrack" class="logo">
                <h3 class="title">EduTrack.</h3>
            </div>
            <a href="/" class="@yield('active_dashboard')"><i class="far fa-chart-bar"></i> Dashboard</a>
            <a href="/student" class="@yield('active_students')"><i class="far fa-user"></i> Student</a>
            <a href="/courses" class="@yield('active_courses')"><i class="far fa-folder-open"></i> Course</a>
            <a href="/enrollment" class="@yield('active_enrollment')"><i class="far fa-address-card"></i> Enrollment</a>
        </div>

        <!-- Logout Button -->
        <div class="logout-section">
            <a href="/logout" class="logout-link" title="Logout">
                <i class="fas fa-arrow-right-from-bracket"></i> Log out
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap 5.3.0 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>
