@extends('layouts.app')

@section('content')
    <h2>Add Student</h2>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Student ID</label>
            <input type="text" name="studentID" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Course</label>
            <input type="text" name="course" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Year Level</label>
            <input type="text" name="yearlevel" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
