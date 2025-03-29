@extends('layouts.layout')

@section('title', 'Add New Course')

@section('active_courses', 'active')

@section('content')
    <h1>Add New Course</h1>

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

    <form action="/courses/add" method="POST">
        @csrf

        <div class="mb-3">
            <label for="course_name" class="form-label fw-bold">Course Name</label>
            <input type="text" name="course_name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="course_code" class="form-label fw-bold">Course Code</label>
            <input type="text" name="course_code" class="form-control">
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-dark">Add Course</button>
        </div>
    </form>

    <div class="text-center mt-3">
        <a href="/courses" class="text-dark">Back to List</a>
    </div>

    <!-- Inline CSS -->
    <style>
        h1 {
            font-family: 'Nunito', sans-serif;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .btn-dark {
            background-color: #333;
            transition: background-color 0.2s ease-in-out;
        }

        .btn-dark:hover {
            background-color: #555;
            transform: translateY(-2px);
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
