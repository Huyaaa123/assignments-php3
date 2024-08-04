@extends('admin.layouts-admin.master-admin')
@section('content')
<style>

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
<h1>Categories</h1>

<a href="{{ route('admin.loaitin.create') }}" class="text-center btn btn-add">Thêm Category</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Thời gian thêm</th>
            <th>Thời gian sửa</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id_cate }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->created_at->format('H:i:s d/m/Y ') }}</td>
                <td>{{ $category->updated_at->format('H:i:s d/m/Y ') }}</td>
                <td>
                    <a href="{{ route('admin.loaitin.edit', $category->id_cate) }}" class="btn btn-primary">Sửa</a>
                    <form action="{{ route('admin.loaitin.destroy', $category->id_cate) }}" method="POST" style="display:inline;" onsubmit="confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    function confirmDelete(event) {
        if (!confirm('Bạn có chắc chắn muốn xóa loại tin này không?')) {
            event.preventDefault();
        }
    }
</script>
@endsection