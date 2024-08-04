@extends('admin.layouts-admin.master-admin')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="../../adminnn/style.css">
        <style>
h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-size: 16px;
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input.form-control, textarea.form-control, select.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #f9f9f9;
}

textarea.form-control {
    height: 150px;
    resize: vertical;
}

.text-danger {
    color: #dc3545;
    font-size: 14px;
    margin-top: 5px;
}

button.btn-primary {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

button.btn-primary:hover {
    background-color: #0056b3;
}

p.success-message {
    color: #28a745;
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
}

        </style>
    </head>

    <body>
        <h1>Thêm Article</h1>

        <form action="{{ route('admin.tin.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="image_url">Image URL</label>
                <input type="text" id="image_url" name="image_url" class="form-control">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id_cate }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>

        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
    </body>

    </html>
@endsection
