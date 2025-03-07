@extends('master')

@section('title', 'Customer Page')

@section('header', 'Customer Information')

@section('content')
    <form class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-bold">Customer ID</label>
            <input type="text" class="form-control" value="{{ $custId }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Name</label>
            <input type="text" class="form-control" value="{{ $name }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Address</label>
            <input type="text" class="form-control" value="{{ $address }}" readonly>
        </div>
    </form>
@endsection
