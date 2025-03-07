@extends('master')

@section('title', 'Order Page')

@section('header', 'Order Information')

@section('content')
    <form class="row g-3">
        <div class="col-md-3">
            <label class="form-label fw-bold">Customer ID:</label>
            <input type="text" class="form-control" value="{{ $custId }}" readonly>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-bold">Name:</label>
            <input type="text" class="form-control" value="{{ $name }}" readonly>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-bold">Order No:</label>
            <input type="text" class="form-control" value="{{ $orderNo }}" readonly>
        </div>

        <div class="col-md-3">
            <label class="form-label fw-bold">Date:</label>
            <input type="text" class="form-control" value="{{ $date }}" readonly>
        </div>
    </form>
@endsection
