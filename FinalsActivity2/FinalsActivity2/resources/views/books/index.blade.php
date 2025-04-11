@extends('layout')

@section('content')
<div class="top-action">
    <h1>All Books</h1>
    <a href="{{ route('books.create') }}">Add New Book</a>
</div>

<ul>
    @foreach ($books as $book)
        <li>
            <strong>{{ $book->title }}</strong> by {{ $book->author }} ({{ $book->published_date }})<br>
            <a href="{{ route('books.edit', $book->id) }}">Edit</a>

            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="margin-left: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
