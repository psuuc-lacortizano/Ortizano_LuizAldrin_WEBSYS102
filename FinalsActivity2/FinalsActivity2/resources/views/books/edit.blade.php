@extends('layout')

@section('content')
<h1>Edit Book</h1>
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $book->title }}" required>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="{{ $book->author }}" required>

    <label for="published_date">Published Date:</label>
    <input type="date" id="published_date" name="published_date" value="{{ $book->published_date }}" required>

    <button type="submit">Save Changes</button>
</form>
@endsection
