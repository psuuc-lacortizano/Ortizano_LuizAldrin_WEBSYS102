@extends('layouts.layout')

@section('title', 'Enrollment Management')

@section('active_enrollment', 'active')

@section('content')
<style>
    /* Main Container */
    .management-container {
        padding: 30px 40px;
        background-color: #F4F4F4;
    }

    h1 {
        text-align: center;
        font-size: 36px;
        color: #333;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        animation: fadeIn 0.8s ease-in-out;
    }

    .btn-dark {
        background-color: #333;
        color: white;
        padding: 5px 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out;
    }

    .btn-dark:hover {
        background-color: #555;
        transform: translateY(-2px);
    }

    .table-container {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.8s ease-in-out;
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

    tr:hover {
        background-color: #F5F5F5;
    }

    td {
        padding: 12px 15px;
        font-size: 14px;
        color: #333;
    }

    .alert-success-custom {
        background-color: #D4EDDA;
        border-color: #C3E6CB;
        color: #155724;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.8s ease-in-out;
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
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="management-container">
    <h1>Enrollment Management</h1>

    @if(session('success'))
    <div class="alert-success-custom">
        ✅ {{ session('success') }}
    </div>
    @endif
    <br>

    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Student Code</th>
                    <th>Courses & Grades</th>
                </tr>
            </thead>
            <tbody>
                @if(empty($enrollments))
                <tr>
                    <td colspan="4" class="text-center">No enrollments found</td>
                </tr>
                @else
                @foreach($enrollments as $key => $enrollment)
                <tr>
                    <td data-label="ID">{{ $key + 1 }}</td>
                    <td data-label="Student Name">{{ $enrollment->student_name }}</td>
                    <td data-label="Student Code">{{ $enrollment->stud_code }}</td>
                    <td data-label="Courses & Grades">
                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#student{{ $enrollment->student_id }}" aria-expanded="false">
                            Show Courses
                        </button>
                        <div class="collapse mt-2" id="student{{ $enrollment->student_id }}">
                            <ul class="list-group">
                                @foreach(explode('|', $enrollment->courses) as $course)
                                <li class="list-group-item d-flex justify-content-between">
                                    {{ $course }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    setTimeout(function () {
        let alert = document.querySelector('.alert-success-custom');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000);
</script>
@endsection
