@extends('admin.layouts-admin.master-admin')
@section('content')
<h1>Update Tin</h1>
<link rel="stylesheet" href="../../../adminnn/style.css">
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
<form action="{{ route('admin.tin.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Tiêu đề</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">Nội dung</label>
        <textarea id="content" name="content" class="form-control" required>{{ old('content', $article->content) }}</textarea>
        @error('content')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image_url">URL hình ảnh</label>
        <input type="text" id="image_url" name="image_url" class="form-control" value="{{ old('image_url', $article->image_url) }}">
        @error('image_url')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục</label>
        <select id="category_id" name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id_cate }}" {{ $category->id_cate == $article->category_id ? 'selected' : '' }}>
                    {{ $category->category_name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

@if (session('success'))
    <p class="text-success">{{ session('success') }}</p>
@endif

@endsection
