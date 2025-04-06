@extends('layouts.layout')

@section('title', 'Student Dashboard')

@section('active_dashboard', 'active')

@section('content')
<style>
    :root {
        --yellow: #FFC107;
        --hover-yellow: #FFB300;
        --gray-bg: #F4F4F4;
        --light-gray: #F9F9F9;
        --text-dark: #333;
        --text-light: #666;
        --radius: 12px;
    }

    .dashboard-container {
        padding: 30px 40px;
        background-color: var(--gray-bg);
        animation: fadeIn 0.8s ease-in-out;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        animation: fadeInDown 0.8s ease-in-out;
        flex-wrap: wrap;
        gap: 20px;
    }

    .dashboard-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .search-bar {
        flex-grow: 1;
        max-width: 500px;
    }

    .search-bar input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 20px;
        font-size: 14px;
        transition: 0.3s ease;
    }

    .search-bar input:focus {
        border-color: var(--yellow);
        box-shadow: 0 0 10px rgba(255, 193, 7, 0.3);
        outline: none;
    }

    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-profile span {
        font-weight: 600;
        color: var(--text-dark);
    }

    .user-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid var(--yellow);
        transition: 0.3s ease;
    }

    .user-profile img:hover {
        transform: scale(1.1) rotate(5deg);
    }

    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-block {
        background-color: #fff;
        padding: 20px;
        border-radius: var(--radius);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        text-align: center;
        transition: 0.3s ease;
        animation: slideUp 0.6s ease-in-out;
    }

    .stat-block:hover {
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .stat-block i {
        font-size: 32px;
        color: var(--yellow);
        margin-bottom: 12px;
        transition: 0.3s ease;
    }

    .stat-block:hover i {
        transform: rotate(10deg) scale(1.1);
    }

    .stat-block h4 {
        font-size: 28px;
        font-weight: 700;
        color: var(--text-dark);
    }

    .stat-block p {
        font-size: 14px;
        color: var(--text-light);
        margin: 0;
    }

    .students-section {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: var(--radius);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .students-section h3 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--text-dark);
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
        background-color: var(--light-gray);
        color: var(--text-dark);
    }

    .students-table th {
        font-weight: 600;
        color: var(--text-light);
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    .students-table tbody tr:hover {
        background-color: #f0f0f0;
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
        transform: scale(1.05);
    }

    .view-all {
        text-align: center;
        margin-top: 20px;
    }

    .view-all a {
        color: var(--yellow);
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .view-all a:hover {
        color: var(--hover-yellow);
    }

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

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .search-bar {
            width: 100%;
        }

        .stats-section {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>ADMIN DASHBOARD</h2>
        <div class="user-profile">
            <i class="bi bi-person-circle"></i> <!-- Bootstrap icon for user -->
            <span>Luiz Ortizano</span>
        </div>
    </div>
</div>

    <div class="stats-section">
        <div class="stat-block">
            <i class="fas fa-users"></i>
            <h4>{{ $students_count }}</h4>
            <p>Students</p>
        </div>
        <div class="stat-block">
            <i class="fas fa-book"></i>
            <h4>{{ $courses_count }}</h4>
            <p>Courses</p>
        </div>
        <div class="stat-block">
            <i class="fas fa-user-plus"></i>
            <h4>{{ $enrollments_count }}</h4>
            <p>Enrollments</p>
        </div>
    </div>

    <div class="students-section">
        <h3>Students</h3>
        <table class="students-table table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Student Code</th>
                    <th>Program</th>
                    <th>Year</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($students as $student)
        <tr>
            <td><i class="bi bi-person"></i> {{ $student->name }}</td>
            <td>{{ $student->stud_code }}</td>
            <td>BSIT</td>
            <!-- Change the Year to the registration date -->
            <td>{{ \Carbon\Carbon::parse($student->created_at)->format('Y') }}</td> <!-- Format the registration date -->
        </tr>
    @endforeach
</tbody>
        </table>
        <div class="view-all">
            <a href="/student">View All →</a>
        </div>
    </div>
</div>
@endsection
