@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Student</h2>
        <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="firstname" id="firstname" value="{{ $student->firstname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="{{ $student->lastname }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $student->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ $student->address }}</textarea>
            </div>
            <div>
                <label for="studentID" class="block text-sm font-medium text-gray-700">Student ID</label>
                <input type="text" name="studentID" id="studentID" value="{{ $student->studentID }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="course" class="block text-sm font-medium text-gray-700">Course</label>
                <input type="text" name="course" id="course" value="{{ $student->course }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="yearlevel" class="block text-sm font-medium text-gray-700">Year Level</label>
                <input type="text" name="yearlevel" id="yearlevel" value="{{ $student->yearlevel }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div class="flex justify-end space-x-2">
                <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Update Student</button>
            </div>
        </form>
    </div>
@endsection