@extends('master')

@section('title', 'Order Details Page')

@section('header', 'Order Details Information')

@section('content')
    <form class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-bold">Transaction No:</label>
            <input type="text" class="form-control" value="{{ $transNo }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Order No:</label>
            <input type="text" class="form-control" value="{{ $orderNo }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Item ID:</label>
            <input type="text" class="form-control" value="{{ $itemId }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Name:</label>
            <input type="text" class="form-control" value="{{ $name }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Price:</label>
            <input type="text" class="form-control" value="{{ $price }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Quantity:</label>
            <input type="text" class="form-control" value="{{ $qty }}" readonly>
        </div>
    </form>
@endsection
