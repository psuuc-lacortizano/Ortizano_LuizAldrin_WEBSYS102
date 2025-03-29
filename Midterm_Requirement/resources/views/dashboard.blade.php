@extends('layouts.layout')

@section('title', 'Student Dashboard')

@section('active_dashboard', 'active')

@section('content')
<style>
    /* Updated Layout - Full Width and Clean */
    .dashboard-container {
        padding: 30px 40px;
        background-color: #F4F4F4;
        animation: fadeIn 0.8s ease-in-out;
    }

    /* Stats Section */
    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-block {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: all 0.3s ease;
        animation: slideUp 0.6s ease-in-out;
    }

    .stat-block:hover {
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .stat-block i {
        font-size: 32px;
        color: #FFC107;
        margin-bottom: 12px;
        transition: transform 0.3s ease;
    }

    .stat-block:hover i {
        transform: rotate(10deg) scale(1.1);
    }

    .stat-block h4 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        margin-bottom: 5px;
    }

    .stat-block p {
        font-size: 14px;
        color: #666;
        margin: 0;
    }

    /* Star Students Section */
    .students-section {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .students-section h3 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #333;
    }

    .students-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .students-table th,
    .students-table td {
        padding: 12px 15px;
        text-align: left;
        font-size: 14px;
        color: #333;
        background-color: #F9F9F9;
        transition: background-color 0.3s ease;
    }

    .students-table th {
        font-weight: 600;
        color: #666;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    .students-table tbody tr {
        transition: none;
    }

    .students-table tbody tr:hover {
        background-color: #f5f5f5;
        transform: none;
    }

    .students-table td img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
        vertical-align: middle;
        transition: transform 0.3s ease;
    }

    .students-table tr:hover td img {
        transform: none;
    }

    .view-all {
        text-align: center;
        margin-top: 20px;
    }

    .view-all a {
        color: #FFC107;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .view-all a:hover {
        color: #FFB300;
    }

    /* Header Section */
    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        animation: fadeInDown 0.8s ease-in-out;
    }

    .dashboard-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: #333;
    }

    .dashboard-header .search-bar {
        flex-grow: 1;
        margin: 0 20px;
        max-width: 500px;
    }

    .dashboard-header .search-bar input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 20px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .dashboard-header .search-bar input:focus {
        border-color: #FFC107;
        box-shadow: 0 0 12px rgba(255, 193, 7, 0.3);
        transform: scale(1.03);
    }

    .dashboard-header .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .dashboard-header .user-profile span {
        font-weight: 600;
        color: #333;
    }

    .dashboard-header .user-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #FFC107;
        transition: transform 0.3s ease;
    }

    .dashboard-header .user-profile img:hover {
        transform: scale(1.1) rotate(5deg);
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .stats-section {
            grid-template-columns: 1fr;
        }

        .dashboard-header {
            flex-direction: column;
            gap: 15px;
        }

        .dashboard-header .search-bar {
            width: 100%;
            margin: 0;
        }
    }
</style>

<!-- Main Dashboard Container -->
<div class="dashboard-container">
    <!-- Header Section -->
    <div class="dashboard-header">
        <h2>ADMIN DASHBOARD</h2>
        <div class="search-bar">
            <input type="text" placeholder="What do you want to find?">
        </div>
        <div class="user-profile">
            <span>Luiz Ortizano</span>
            <img src="https://via.placeholder.com/40" alt="Profile Picture">
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="stat-block">
            <i class="fas fa-users"></i>
            <h4>15,000K</h4>
            <p>Students</p>
        </div>
        <div class="stat-block">
            <i class="fas fa-book"></i>
            <h4>2,000K</h4>
            <p>Courses</p>
        </div>
        <div class="stat-block">
            <i class="fas fa-user-plus"></i>
            <h4>5.6K</h4>
            <p>Enrollments</p>
        </div>
    </div>

    <!-- Star Students Section -->
    <div class="students-section">
        <h3>Students</h3>
        <table class="students-table table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Student Code</th>
                    <th>Program</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td><img src="https://via.placeholder.com/30" alt="Student"> Evelyn Harper</td>
                    <td>21-UR-0201</td>
                    <td>BSIT</td>
                    <td>2021</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td><img src="https://via.placeholder.com/30" alt="Student"> Diana Plenty</td>
                    <td>21-UR-0202</td>
                    <td>BSIT</td>
                    <td>2021</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td><img src="https://via.placeholder.com/30" alt="Student"> John Millar</td>
                    <td>21-UR-0203</td>
                    <td>BSIT</td>
                    <td>2021</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td><img src="https://via.placeholder.com/30" alt="Student"> Miles Esther</td>
                    <td>21-UR-0204</td>
                    <td>BSIT</td>
                    <td>2021</td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="checkbox"></td>
                    <td><img src="https://via.placeholder.com/30" alt="Student"> Sophia Carter</td>
                    <td>21-UR-0205</td>
                    <td>BSIT</td>
                    <td>2021</td>
                </tr>
            </tbody>
        </table>
        <div class="view-all">
            <a href="/student">View All -></a>
        </div>
    </div>
</div>
@endsection
