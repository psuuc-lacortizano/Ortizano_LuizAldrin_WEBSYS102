@extends('layouts.layout')

@section('title', 'Add New Student')

@section('active_students', 'active')

@section('content')
    <h1>Add New Student</h1>

    <!-- Error Message -->
    @if ($errors->any())
    <div class="alert-danger-custom">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="/add" method="POST">
        @csrf

        <!-- Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>

        <!-- Student Code Input -->
        <div class="mb-3">
            <label for="stud_code" class="form-label fw-bold">Student Code:</label>
            <input type="text" class="form-control" name="stud_code">
        </div>

        <!-- Program Select -->
        <div class="mb-3">
            <label for="program" class="form-label fw-bold">Select Program:</label>
            <select name="program" class="form-select">
                <option value="" disabled selected>Select a program</option>
                <option value="BSCIE">Bachelor of Science in Civil Engineering</option>
                <option value="BSME">Bachelor of Science in Mechanical Engineering</option>
                <option value="BSEE">Bachelor of Science in Electrical Engineering</option>
                <option value="BSCOE">Bachelor of Science in Computer Engineering</option>
                <option value="BSA">Bachelor of Science in Architecture</option>
                <option value="BSIT">Bachelor of Science in Information Technology</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-dark">Add Student</button>
        </div>
    </form>

    <!-- Back to List -->
    <div class="text-center mt-3">
        <a href="/" class="text-dark">Back to List</a>
    </div>

    <style>
        .container-custom {
            max-width: 450px; /* Reduced from 1200px */
            padding: 20px; /* Reduced from 30px for a snugger fit */
        }

        h1 {
            font-family: 'Nunito', sans-serif;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px; /* Slightly smaller heading */
        }

        a {
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: none;
            color: #555;
        }

        .alert-danger-custom {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 600;
        }
    </style>
@endsection