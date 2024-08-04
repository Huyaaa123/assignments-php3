<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category')->paginate(10); // Số 10 là số lượng bài viết trên mỗi trang
        return view('admin.tin', compact('articles'));
    }



    public function create()
    {
        // Lấy tất cả danh mục
        $categories = Category::all();

        // Truyền danh mục vào view
        return view('admin.crud.crud-tin-create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image_url' => 'required',
            'category_id' => 'required|exists:categories,id_cate',
        ]);

        // Tạo bài viết mới
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $request->image_url,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.tin')->with('success', 'Thêm mới tin thành công.');
    }

    public function update(Request $request, $id)
    {
        // Tìm bài viết theo ID
        $article = Article::findOrFail($id);

        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image_url' => 'required',
            'category_id' => 'required|exists:categories,id_cate',
        ]);

        // Cập nhật bài viết
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image_url' => $request->image_url,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.tin')->with('success', 'Cập nhật tin thành công.');
    }



    public function destroy($id)
    {
        $user = Article::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.tin')->with('success', 'Xóa tin thành công.');
    }
}
