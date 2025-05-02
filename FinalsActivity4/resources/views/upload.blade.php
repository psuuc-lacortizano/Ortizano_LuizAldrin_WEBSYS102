<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Image Upload</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        h1, h2, h3 {
            text-align: center;
            color: #444;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            margin: 20px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        input[type="file"] {
            display: block;
            margin: 10px 0 20px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #3490dc;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #2779bd;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 16px;
            margin-top: 30px;
        }

        .photo-card {
            background: #fff;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .photo-card img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-bottom: 12px;
        }

        .photo-card form {
            width: 50%;
        }

        .photo-card button {
            width: 100%;
            background-color: #e3342f;
        }

        .photo-card button:hover {
            background-color: #cc1f1a;
        }

        .success-message {
            text-align: center;
            color: green;
            font-weight: 500;
        }

        .pagination {
            text-align: center;
            margin-top: 30px;
        }

        .pagination svg {
            height: 20px;
        }
    </style>
</head>
<body>

    <h1>Image Upload Gallery</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <h3>Single Image Upload</h3>
    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h3>Multiple Images Upload</h3>
    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    <h2>Uploaded Photos</h2>
    <div class="gallery">
        @foreach($photos as $photo)
            <div class="photo-card">
                <img src="{{ asset('images/' . $photo->image) }}" alt="Uploaded Photo">
                <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{ $photos->links() }}
    </div>

</body>
</html>
