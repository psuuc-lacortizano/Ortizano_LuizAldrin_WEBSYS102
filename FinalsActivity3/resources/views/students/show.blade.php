@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">{{ $student->firstname }} {{ $student->lastname }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="mb-2"><strong>Email:</strong> {{ $student->email }}</p>
                <p class="mb-2"><strong>Address:</strong> {{ $student->address ?: 'N/A' }}</p>
                <p class="mb-2"><strong>Student ID:</strong> {{ $student->studentID }}</p>
                <p class="mb-2"><strong>Course:</strong> {{ $student->course }}</p>
                <p class="mb-2"><strong>Year Level:</strong> {{ $student->yearlevel }}</p>
            </div>
            <div class="text-center">
                <h4 class="text-lg font-medium text-gray-700 mb-4">QR Code</h4>
                <div id="qr-section" class="inline-block bg-white p-4 rounded-md shadow-sm">
                    {!! $qr !!}
                </div>
                <button onclick="printQR()" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    🖨️ Print QR Code
                </button>
            </div>
        </div>
        <div class="mt-6">
            <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">← Back to List</a>
        </div>
    </div>

    <script>
        function printQR() {
            const qrContent = document.getElementById('qr-section').innerHTML;
            const printWindow = window.open('', '', 'height=400,width=400');
            printWindow.document.write(`
                <html>
                    <head><title>Print QR Code</title></head>
                    <body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
                        ${qrContent}
                    </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection