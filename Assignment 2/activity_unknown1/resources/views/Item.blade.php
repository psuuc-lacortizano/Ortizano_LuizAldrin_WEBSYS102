@extends('master')

@section('title', 'Item Page')

@section('header', 'Item Information')

@section('content')
    <form class="row g-3">
        <div class="col-md-4">
            <label class="form-label fw-bold">Item No:</label>
            <input type="text" class="form-control" value="{{ $itemNo }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Name:</label>
            <input type="text" class="form-control" value="{{ $name }}" readonly>
        </div>

        <div class="col-md-4">
            <label class="form-label fw-bold">Price:</label>
            <input type="text" class="form-control" value="{{ $price }}" readonly>
        </div>
    </form>
@endsection
