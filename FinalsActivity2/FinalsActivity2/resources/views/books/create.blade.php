@extends('layout')

@section('content')
<h1>Add New Book</h1>
<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>

    <label for="published_date">Published Date:</label>
    <input type="date" id="published_date" name="published_date" required>

    <button type="submit">Save</button>
</form>
@endsection
