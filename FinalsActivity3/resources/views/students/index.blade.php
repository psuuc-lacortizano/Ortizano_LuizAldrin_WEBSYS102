@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h2 class="text-2xl font-semibold text-gray-800">Student List</h2>
            <div class="flex items-center gap-4">
                <input type="text" id="searchInput" placeholder="Search students..." class="w-full sm:w-64 px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Add Student</a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table id="studentTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Full Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Year Level</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">QR Code</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->firstname }} {{ $student->lastname }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->course }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $student->yearlevel }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{!! $student->qr !!}</td>
                            <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                <a href="{{ route('students.show', $student) }}" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition">View</a>
                                <a href="{{ route('students.edit', $student) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">Edit</a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition" onclick="return confirm('Delete this student?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#studentTable tbody tr');

            rows.forEach(row => {
                const fullName = row.cells[0].textContent.toLowerCase();
                const email = row.cells[1].textContent.toLowerCase();
                const course = row.cells[2].textContent.toLowerCase();
                const yearLevel = row.cells[3].textContent.toLowerCase();

                const matches = fullName.includes(searchTerm) ||
                               email.includes(searchTerm) ||
                               course.includes(searchTerm) ||
                               yearLevel.includes(searchTerm);

                row.style.display = matches ? '' : 'none';
            });
        });
    </script>
@endsection