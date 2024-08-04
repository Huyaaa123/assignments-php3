<!-- Hiển thị bình luận -->
<div class="container mt-4">
    <h4 class="mb-4 font-weight-bold">Bình luận</h4>

    @forelse($comments as $comment)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <p>{{ $comment->comment_content }}</p>
                <p class="text-right text-muted">
                    <small>{{ date('H:i:s d/m/Y', strtotime($comment->created_at)) }} bởi <strong>{{ $comment->name }}</strong></small>
                </p>
            </div>
        </div>
    @empty
        <p>Chưa có bình luận nào.</p>
    @endforelse

    <!-- Form thêm bình luận -->
    @auth
        <div class="mt-4">
            <h5 class="mb-3 font-weight-bold">Thêm bình luận</h5>
            <form action="{{ route('user.comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $tintuc->id }}">
                <div class="form-group">
                    <label for="comment_content">Nội dung bình luận</label>
                    <textarea id="comment_content" name="comment_content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi bình luận</button>
            </form>
        </div>
    @else
        <p class="mt-4">Bạn cần <a href="{{ route('login') }}" class="btn btn-link">đăng nhập</a> để bình luận.</p>
    @endauth
</div>

<style>
    .card {
        border-radius: 0.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-body p {
        margin-bottom: 0.5rem;
    }

    .text-muted {
        color: #6c757d;
    }

    .btn-link {
        color: #007bff;
        font-weight: 400;
        text-decoration: none;
    }

    .btn-link:hover {
        color: #0056b3; /* Màu chữ khi hover */
        text-decoration: underline; /* Gạch dưới khi hover */
    }

    .font-weight-bold {
        font-weight: 700;
    }
</style>
