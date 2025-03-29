@extends('layouts.layout')

@section('title', 'Edit Grade')

@section('active_courses', 'active')

@section('content')
    <h2 class="text-center mb-4">Edit Grade for {{ $course->course_name }}</h2>

    <!-- Error Message -->
    @if ($errors->any())
    <div class="alert-danger-custom mb-4">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Edit Grade Form -->
    <form action="{{ url('/update-grade/' . $course->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <!-- Grade Input -->
        <div class="mb-3">
            <label for="grades" class="form-label fw-bold">Grades:</label>
            <input type="number" step="0.01" name="grades" value="{{ number_format($course->grades, 2) }}" class="form-control" required>
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-dark">Update Grade</button>
        </div>
    </form>

    <!-- Back to Course List -->
    <div class="text-center mt-3">
        <a href="/" class="text-dark">Cancel</a>
    </div>

    <style>
        .container-custom {
            max-width: 450px;
            padding: 20px;
        }

        h2 {
            font-family: 'Nunito', sans-serif;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        a {
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
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
