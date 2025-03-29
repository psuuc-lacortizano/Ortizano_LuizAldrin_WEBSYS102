@extends('layouts.layout')

@section('title', $student->name . ' - Enrolled Courses')

@section('active_students', 'active')

@section('content')
    <h2>{{ $student->name }}'s Enrolled Courses</h2>

    <h5>Student Name: {{ $student->name }}</h5>
    <h6>Student Code: {{ $student->stud_code }}</h6>
    <hr>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert-success-custom">
        ✅ {{ session('success') }}
    </div>
    @endif

    <h5>Enrolled Courses</h5>
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Grades</th>
                <th>Results</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td data-label="Course Name">{{ $course->course_name }}</td>
                <td data-label="Course Code">{{ $course->course_code }}</td>
                <td data-label="Grades">{{ number_format($course->grades, 2) }}</td>
                <td data-label="Results">
                    @if($course->grades == 0.00)
                        <span style="color: grey; font-weight: bold;">Pending</span>
                    @elseif($course->grades >= 1.00 && $course->grades <= 3.00)
                        <span style="color: green; font-weight: bold;">Passed</span>
                    @else
                        <span style="color: red; font-weight: bold;">Failed</span>
                    @endif
                </td>
                <td data-label="Status" style="color: green; font-weight: bold;">{{ $course->status }}</td>
                <td data-label="Actions" class="action-links">
                    <a href="{{ url('/edit-grade/' . $course->id) }}" class="edit-btn">Edit</a>
                    <a href="{{ url('/delete-grade/' . $course->id) }}" class="delete-btn" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if(count($courses) == 0)
    <p>No courses enrolled yet!</p>
    @endif

    <!-- Center the Back to List link -->
    <div class="text-center">
        <a href="/" class="back-to-list">Back to List</a>
    </div>

    <style>
        .container-custom {
            max-width: 800px; /* Reduced from 1100px */
            padding: 20px; /* Reduced from 40px for a snugger fit */
        }

        h2, h5, h6 {
            font-family: 'Nunito', sans-serif;
            color: #333;
            text-align: center;
        }

        h2 {
            font-size: 28px; /* Slightly smaller than 36px */
            font-weight: 800; /* Bold the title */
        }

        h5, h6 {
            font-size: 18px; /* Slightly smaller than 20px */
            margin-top: 10px;
        }

        hr {
            border: 1px solid #D3D3D3;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Reduced from 30px */
        }

        th, td {
            border: 1px solid #D3D3D3;
            padding: 12px; /* Reduced from 16px */
            font-size: 16px; /* Reduced from 18px */
            text-align: center;
        }

        th {
            background-color: #333;
            color: white;
            font-size: 18px; /* Reduced from 20px */
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #F9F9F9;
        }

        tr:hover {
            background-color: #F5F5F5;
        }

        p {
            color: #555;
            text-align: center;
            font-size: 16px; /* Reduced from 18px */
        }

        a {
            display: inline-block;
            margin-top: 20px; /* Reduced from 30px */
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 16px; /* Reduced from 18px */
        }

        a:hover {
            text-decoration: none;
            color: #555;
        }

        .action-links {
            display: flex;
            justify-content: center;
            gap: 8px; /* Reduced from 10px */
        }

        .edit-btn {
            background-color: #FFC107;
            color: white;
            padding: 6px 12px; /* Reduced from 8px 14px */
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px; /* Reduced from 16px */
            font-weight: 600;
            transition: transform 0.2s ease-in-out;
        }

        .edit-btn:hover {
            background-color: #E0A800;
            transform: scale(1.05);
        }

        .delete-btn {
            background-color: #DC3545;
            color: white;
            padding: 6px 12px; /* Reduced from 8px 14px */
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px; /* Reduced from 16px */
            font-weight: 600;
            transition: transform 0.2s ease-in-out;
        }

        .delete-btn:hover {
            background-color: #C82333;
            transform: scale(1.05);
        }

        .alert-success-custom {
            background-color: #D4EDDA;
            border-color: #C3E6CB;
            color: #155724;
            padding: 12px; /* Reduced from 15px */
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        .back-to-list {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            font-size: 16px;
            display: inline-block;
            margin-top: 20px;
        }

        .back-to-list:hover {
            text-decoration: underline;
            color: #555;
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
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <!-- Auto-hide success message -->
    <script>
        setTimeout(function () {
            let alert = document.querySelector('.alert-success-custom');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 5000);
    </script>
@endsection

