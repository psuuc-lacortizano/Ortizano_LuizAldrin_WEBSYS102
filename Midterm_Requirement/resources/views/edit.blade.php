@extends('layouts.layout')

@section('title', 'Edit Student')

@section('active_students', 'active')

@section('content')
    <h1>Edit Student Information</h1>

    <!-- Displaying validation errors -->
    @if ($errors->any())
    <div class="alert-danger-custom">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Correct action for updating student info -->
    <form action="/update/{{ $student[0]->id }}" method="POST">
        @csrf
        <!-- Student Name Input -->
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Student Name</label>
            <input type="text" name="name" class="form-control" value="{{ $student[0]->name }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Student Code Input -->
        <div class="mb-3">
            <label for="stud_code" class="form-label fw-bold">Student Code</label>
            <input type="text" name="stud_code" class="form-control" value="{{ $student[0]->stud_code }}" required>
            @error('stud_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Program Input -->
        <div class="mb-3">
            <label for="program" class="form-label fw-bold">Select Program:</label>
            <select name="program" class="form-select">
                <option value="" disabled selected>{{ $student[0]->program }}</option>
                <option value="BSCIE">Bachelor of Science in Civil Engineering (BSCIE)</option>
                <option value="BSME">Bachelor of Science in Mechanical Engineering (BSME)</option>
                <option value="BSEE">Bachelor of Science in Electrical Engineering (BSEE)</option>
                <option value="BSCOE">Bachelor of Science in Computer Engineering (BSCOE)</option>
                <option value="BSA">Bachelor of Science in Architecture (BSA)</option>
                <option value="BSIT">Bachelor of Science in Information Technology (BSIT)</option>
            </select>
            @error('program')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-dark">Update Student</button>
        </div>
    </form>

    <!-- Back to List Link -->
    <div class="text-center mt-3">
        <a href="/student" class="text-dark">Back to List</a>
    </div>

    <style>
        .container-custom {
            max-width: 450px; /* Matches reference */
            padding: 20px; /* Matches reference */
        }

        h1 {
            font-family: 'Nunito', sans-serif;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px; /* Matches reference */
        }

        .btn-dark {
            background-color: #333;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-dark:hover {
            background-color: #555;
            transform: translateY(-2px); /* Matches reference */
        }

        a {
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: none; /* Matches reference */
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

        .text-danger {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
@endsection
