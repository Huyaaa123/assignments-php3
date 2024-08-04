@extends('admin.layouts-admin.master-admin')
@section('content')
<style>
    /* Phân trang giống như Bootstrap */
    .pagination {
        display: flex;
        justify-content: center;
        padding-left: 0;
        list-style: none;
        border-radius: .25rem;
    }
    .pagination li {
        display: inline;
    }
    .pagination a, .pagination span {
        display: block;
        padding: .5rem .75rem;
        line-height: 1.25;
        text-decoration: none;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
    }
    .pagination a:hover, .pagination span:hover {
        background-color: #e9ecef;
        color: #0056b3;
        border-color: #dee2e6;
    }
    .pagination .active span {
        z-index: 1;
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
    .pagination .disabled span {
        color: #6c757d;
        pointer-events: none;
        background-color: #fff;
        border-color: #dee2e6;
    }
    .pagination .pagination-lg a, .pagination .pagination-lg span {
        padding: .75rem 1.5rem;
        font-size: 1.25rem;
        border-radius: .3rem;
    }
    .pagination .pagination-sm a, .pagination .pagination-sm span {
        padding: .25rem .5rem;
        font-size: .875rem;
        border-radius: .2rem;
    }
    h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
            display: inline-block;
        }

        .text-center {
            text-align: center;
            display: block;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            color: #333;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .text-danger {
            color: #dc3545;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-add {
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #218838;
        }
</style>
<h1>Comments</h1>
<a class="text-center btn btn-add" href="{{ route('admin.comments.create') }}" class="btn btn-primary">Add Comment</a>
<table class="table mt-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Article</th>
            <th>Nội dung</th>
            <th>Users comments</th>
            <th>Ngày comments</th>
            <th>Ngày chỉnh sửa</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{Str::limit($comment->article->title,25, '...') }}</td>
                <td>{{ Str::limit($comment->comment_content, 25, '...') }}</td>
                <td>{{ $comment->commenter->name }}</td>
                <td>{{ $comment->created_at->format('H:i:s d/m/Y ') }}</td>
                <td>{{ $comment->updated_at->format('H:i:s d/m/Y ') }}</td>
                <td>
                    <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline;"onsubmit="confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $comments->links('pagination::bootstrap-4') }}
<script>
    function confirmDelete(event) {
        if (!confirm('Bạn có chắc chắn muốn xóa loại tin này không?')) {
            event.preventDefault();
        }
    }
</script>
@endsection
