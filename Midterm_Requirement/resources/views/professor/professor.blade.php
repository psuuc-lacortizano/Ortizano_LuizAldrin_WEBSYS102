@extends('layouts.layout')

@section('title', 'Professor Management')

@section('active_professors', 'active')

@section('content')
<style>
    /* Main Container */
    .management-container {
        padding: 30px 40px;
        background-color: #F4F4F4;
        animation: fadeIn 0.8s ease-in-out;
    }

    h1 {
        text-align: center;
        font-size: 36px;
        color: #333;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
        animation: slideDown 0.8s ease-in-out;
    }

    .btn-dark {
        background-color: #333;
        color: white;
        padding: 5px 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s ease-in-out;
    }

    .btn-dark:hover {
        background-color: #555;
        transform: translateY(-2px) scale(1.05);
    }

    .table-container {
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
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
        animation: fadeIn 0.8s ease-in-out, slideUp 0.5s ease-in-out;
    }

    /* Course List */
    .list-group-item {
        background-color: #F4F4F4;
        transition: background-color 0.2s ease-in-out;
    }

    .list-group-item:hover {
        background-color: #EAEAEA;
    }

    /* Mobile Responsive */
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

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>

<div class="management-container">
    <h1>Professor Management</h1>

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
                    <th>Professor Name</th>
                    <th>Courses Handled</th>
                </tr>
            </thead>
            <tbody>
                @if(empty($professors))
                <tr>
                    <td colspan="3" class="text-center">No professors found</td>
                </tr>
                @else
                @foreach($professors as $key => $professor)
                <tr>
                    <td data-label="ID">{{ $key + 1 }}</td>
                    <td data-label="Professor Name">{{ $professor->professor_name }}</td>
                    <td data-label="Courses Handled">
                        <button class="btn btn-dark btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#professor{{ $professor->professor_id }}" aria-expanded="false">
                            Show Courses
                        </button>
                        <div class="collapse mt-2" id="professor{{ $professor->professor_id }}">
                            <ul class="list-group">
                                @foreach(explode('|', $professor->courses) as $course)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
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
    // Alert Auto Dismiss with Smooth Fade
    setTimeout(function () {
        let alert = document.querySelector('.alert-success-custom');
        if (alert) {
            alert.style.animation = 'slideUp 0.5s ease-in-out';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }
    }, 5000);
</script>

@endsection
