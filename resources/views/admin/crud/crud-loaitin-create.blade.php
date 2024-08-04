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
                font-size: 18px;
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            input.form-control {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                box-sizing: border-box;
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
        </style>
    </head>

    <body>
        <h1>Thêm Categories</h1>

        <form action="{{ route('admin.loaitin.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" id="category_name" name="category_name" class="form-control" required>
                @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
    </body>

    </html>
@endsection
