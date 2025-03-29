@extends('layouts.layout')

@section('title', 'Student Management')

@section('active_students', 'active')

@section('content')
<style>
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
</style>

<div class="management-container">
    <h1>Student Management</h1>

    @if(session('success'))
    <div class="alert-success-custom">
        ✅ {{ session('success') }}
    </div>
    @endif
    <br>

    <div class="text-end mb-4">
        <a href="/create" class="add-btn">Add a New Student</a>
    </div>

    <div class="table-container">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student Code</th>
                    <th>Program</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($students->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">No students enrolled</td>
                </tr>
                @else
                @foreach($students as $student)
                <tr>
                    <td data-label="ID">{{ $student->id }}</td>
                    <td data-label="Name">
                        <a href="/info/{{ $student->id }}" class="info-link">{{ $student->name }}</a>
                    </td>
                    <td data-label="Student Code">{{ $student->stud_code }}</td>
                    <td data-label="Program">{{ $student->program }}</td>
                    <td data-label="Actions" class="action-links">
                        <a href="/edit/{{ $student->id }}" class="edit-btn btn btn-warning btn-sm">Edit</a>
                        <a href="/delete/{{ $student->id }}" class="delete-btn btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">Delete</a>
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


