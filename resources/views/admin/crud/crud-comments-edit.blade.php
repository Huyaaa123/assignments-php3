@extends('admin.layouts-admin.master-admin')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link rel="stylesheet" href="../../../adminnn/style.css">
        <title>Edit User</title>
        <style>
            h1 {
                font-size: 24px;
                margin-bottom: 20px;
                color: #333;
            }

            .form-container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 8px;
                background-color: #f9f9f9;
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

            .form-control {
                width: 100%;
                padding: 10px;
                font-size: 16px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                box-sizing: border-box;
            }

            textarea.form-control {
                resize: vertical;
                height: 100px;
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
        <h1>Edit Comment</h1>
        <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="article_id">Article</label>
                <select id="article_id" name="article_id" class="form-control" required>
                    @foreach ($articles as $article)
                        <option value="{{ $article->id }}" {{ $comment->article_id == $article->id ? 'selected' : '' }}>
                            {{ $article->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="comment_content">Content</label>
                <textarea id="comment_content" name="comment_content" class="form-control" required>{{ $comment->comment_content }}</textarea>
            </div>
            <div class="form-group">
                <label for="commenter_id">Commenter</label>
                <select id="commenter_id" name="commenter_id" class="form-control" required>
                    @foreach ($commenters as $commenter)
                        <option value="{{ $commenter->id }}"
                            {{ $comment->commenter_id == $commenter->id ? 'selected' : '' }}>
                            {{ $commenter->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
        @if (session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif
    </body>

    </html>
@endsection
