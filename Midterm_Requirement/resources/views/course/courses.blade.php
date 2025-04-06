@extends('layouts.layout')

@section('title', 'Course Management')

@section('active_courses', 'active')

@section('content')
<style>
    /* Updated CSS with all Student Management styles */
    .management-container {
        padding: 30px 40px;
        background-color: #F4F4F4;
        animation: slideFadeIn 0.5s ease-out;
    }

    h1 {
        text-align: center;
        font-size: 36px;
        color: #333;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }

    a.add-btn {
        background-color: #333;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.2s, transform 0.1s;
    }

    a.add-btn:hover {
        background-color: #555;
        transform: translateY(-2px);
    }

    .filter-container {
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .filter-container label {
        font-size: 16px;
        color: #333;
    }

    .filter-container select {
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 6px;
        border: 1px solid #ddd;
        transition: border-color 0.2s;
    }

    .filter-container select:focus {
        border-color: #333;
    }

    .table-container {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease-in-out;
    }

    th {
        background-color: #333;
        color: white;
        font-size: 14px;
        text-transform: uppercase;
    }

    tr:nth-child(even) {
        background-color: #F9F9F9;
    }

    tr {
        transition: background-color 0.2s ease-out;
    }

    tr:hover {
        background-color: #F5F5F5;
    }

    td {
        padding: 12px 15px;
        font-size: 14px;
        color: #333;
    }

    .action-links a {
        padding: 8px 12px;
        border-radius: 6px;
        font-weight: 600;
        text-decoration: none;
        color: white;
        margin: 0 5px;
        transition: background-color 0.2s, transform 0.1s;
    }

    .edit-btn {
        background-color: #FFC107;
    }

    .edit-btn:hover {
        background-color: #E0A800;
        transform: translateY(-2px);
    }

    .delete-btn {
        background-color: #DC3545;
    }

    .delete-btn:hover {
        background-color: #C82333;
        transform: translateY(-2px);
    }

    .info-link {
        color: #333;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease-out;
    }

    .info-link:hover {
        text-decoration: underline;
        color: #555;
    }

    .alert-success-custom {
        background-color: #D4EDDA;
        border-color: #C3E6CB;
        color: #155724;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 600;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        animation: slideIn 0.5s ease-out;
    }

    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr {
            display: block;
            width: 100%;
        }

        th {
            display: none;
        }

        tr {
            margin-bottom: 12px;
            border: 1px solid #D3D3D3;
        }

        td {
            text-align: right;
            padding-left: 50%;
            position: relative;
        }

        td::before {
            content: attr(data-label);
            position: absolute;
            left: 16px;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideFadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-15px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Custom Pagination Styling */
    .custom-pagination .pagination {
        justify-content: center;
        margin-top: 15px;
    }

    .custom-pagination .pagination .page-link {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 5px;
        margin: 0 3px;
        color: #333;
        border-color: #ccc;
    }

    .custom-pagination .pagination .page-item.active .page-link {
        background-color: #333;
        border-color: #333;
        color: #fff;
    }

    .custom-pagination .pagination .page-link:hover {
        background-color: #555;
        color: #fff;
    }

    .custom-pagination .pagination .page-link:focus {
        box-shadow: none;
    }
</style>

<div class="management-container">
    <h1>Course Management</h1>

    @if(session('success'))
    <div class="alert-success-custom">
        ✅ {{ session('success') }}
    </div>
    @endif
    <br>

    <!-- Refined Filter UI aligned with Student Management -->
    <div class="filter-container">
        <form id="filter-form" method="GET" action="/courses" class="d-flex align-items-center">
            <label for="course_code" class="mr-3">Filter by Program:</label>
            <div style="width: 15px;"></div> <!-- Spacer from previous request -->
            <select name="course_code" id="course_code" onchange="this.form.submit()">
                <option value="">All Programs</option>
                @foreach($courseCodes as $prefix)
                <option value="{{ $prefix }}" {{ $selectedPrefix == $prefix ? 'selected' : '' }}>
                    {{ $prefix }}
                </option>
                @endforeach
            </select>
        </form>
        <div class="text-end mb-4">
            <a href="/courses/create" class="add-btn">Add a New Course</a>
        </div>
    </div>

    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="courses-table">
                @if($courses->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">No courses available</td>
                </tr>
                @else
                @foreach($courses as $course)
                <tr>
                    <td data-label="ID">{{ $course->id }}</td>
                    <td data-label="Course Name">{{ $course->course_name }}</td>
                    <td data-label="Course Code">{{ $course->course_code }}</td>
                    <td data-label="Actions" class="action-links">
                        <a href="/courses/edit/{{ $course->id }}" class="edit-btn btn btn-warning btn-sm">Edit</a>
                        <a href="/courses/delete/{{ $course->id }}" class="delete-btn btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination-links mt-4 text-center">
            <div class="custom-pagination">
                {{ $courses->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
    // Updated script to match Student Management
    document.getElementById('course_code').addEventListener('change', function() {
        document.getElementById('filter-form').submit();
    });

    setTimeout(function () {
        let alert = document.querySelector('.alert-success-custom');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000);
</script>
@endsection