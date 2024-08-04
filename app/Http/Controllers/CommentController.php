<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('article', 'commenter')->paginate(10);
        return view('admin.binhluan', compact('comments'));
    }

    public function create()
    {
        $articles = Article::all();
        $commenters = User::all();
        return view('admin.crud.crud-comments-create', compact('articles', 'commenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment_content' => 'required|string',
            'commenter_id' => 'required|exists:users,id',
        ]);

        Comment::create([
            'article_id' => $request->article_id,
            'comment_content' => $request->comment_content,
            'commenter_id' => $request->commenter_id,
        ]);

        return redirect()->route('admin.comments')->with('success', 'Thêm bình luận thành công.');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $articles = Article::all();
        $commenters = User::all();
        return view('admin.crud.crud-comments-edit', compact('comment', 'articles', 'commenters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment_content' => 'required|string',
            'commenter_id' => 'required|exists:users,id',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update([
            'article_id' => $request->article_id,
            'comment_content' => $request->comment_content,
            'commenter_id' => $request->commenter_id,
        ]);

        return redirect()->route('admin.comments')->with('success', 'Cập nhật bình luận thành công.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('admin.comments')->with('success', 'Xóa bình luận thành công.');
    }
}

