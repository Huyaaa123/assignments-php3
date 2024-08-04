<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TinController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu bài viết theo từng category_id
        $category6_articles = DB::table('articles')->where('category_id', 6)->paginate(4);
        $category7_articles = DB::table('articles')->where('category_id', 7)->paginate(4); // Thay 7 bằng category_id khác nếu cần
        $category8_articles = DB::table('articles')->where('category_id', 8)->paginate(4); // Thay 8 bằng category_id khác nếu cần
        $data = DB::table('articles')->paginate(4); // Lấy dữ liệu bài viết
        // Lấy tất cả dữ liệu từ bảng 'users'
        $users = User::all();

        // Truyền dữ liệu vào view
        return view('homeuser', compact('category6_articles', 'category7_articles', 'category8_articles', 'users','data'));
    }
    public function ctri()
    {
        $tintuc = DB::table('articles')->where('category_id', 6)->paginate(4);

        $data = ['tintuc' => $tintuc];
        return view('chinhtri', $data);
    }
    public function chitietct($id)
    {
        $tintuc = DB::table('articles')
            ->where('id', $id)
            ->where('category_id', 6)
            ->first();

        if ($tintuc) {
            $tintuc->created_at = date('d/m/Y', strtotime($tintuc->created_at));

            $tincungdanhmuc = DB::table('articles')
                ->where('category_id', 6)
                ->where('id', '!=', $id)
                ->take(5)
                ->get();

            $comments = DB::table('comments')
                ->join('users', 'comments.commenter_id', '=', 'users.id')
                ->where('comments.article_id', $id)
                ->select('comments.*', 'users.name') // Lấy thông tin username
                ->get();

            return view('chitiettin.chinhtrict', compact('tintuc', 'tincungdanhmuc', 'comments'));
        } else {
            return redirect()->back()->with('error', 'Bài viết không tồn tại hoặc không thuộc danh mục được chỉ định');
        }
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'comment_content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->article_id = $request->article_id;
        $comment->comment_content = $request->comment_content;
        $comment->commenter_id = Auth::id();
        $comment->save();

        return redirect()->back()->with('success', 'Thêm bình luận thành công.');
    }

    //tt
    public function tthao()
    {
        $tintuc = DB::table('articles')->where('category_id',7)->paginate(4);

        $data = ['tintuc' => $tintuc]; // Bổ sung thông tin người dùng vào dữ liệu truyền vào view
        return view('thethao', $data);
    }
    public function chitiettt($id)
{
    // Lấy bài viết theo ID
    $tintuc = DB::table('articles')
        ->where('id', $id)
        ->first();

    if ($tintuc) {
        $tintuc->created_at = date('d/m/Y', strtotime($tintuc->created_at));

        // Lấy các bài viết cùng danh mục (thay 7 bằng ID danh mục thực tế)
        $tincungdanhmuc = DB::table('articles')
            ->where('category_id', 7)
            ->where('id', '!=', $id)
            ->take(5)
            ->get();

        // Lấy bình luận liên quan đến bài viết
        $comments = DB::table('comments')
            ->where('article_id', $id)
            ->join('users', 'comments.commenter_id', '=', 'users.id')
            ->select('comments.*', 'users.name')
            ->orderBy('comments.created_at', 'desc')
            ->get();

        return view('chitiettin.thethaoct', compact('tintuc', 'tincungdanhmuc', 'comments'));
    } else {
        return redirect()->back()->with('error', 'Bài viết không tồn tại');
    }
}

    //ts
    public function tsu()
    {
        $tintuc = DB::table('articles')->where('category_id',8)->paginate(4);

        $data = ['tintuc' => $tintuc]; // Bổ sung thông tin người dùng vào dữ liệu truyền vào view
        return view('thoisu', $data);
    }
    public function chitietts($id)
    {
        // Lấy bài viết theo ID
        $tintuc = DB::table('articles')
            ->where('id', $id)
            ->first();

        if ($tintuc) {
            $tintuc->created_at = date('d/m/Y', strtotime($tintuc->created_at));

            // Lấy các bài viết cùng danh mục (thay 8 bằng ID danh mục thực tế)
            $tincungdanhmuc = DB::table('articles')
                ->where('category_id', 8)
                ->where('id', '!=', $id)
                ->take(5)
                ->get();

            // Lấy bình luận liên quan đến bài viết
            $comments = DB::table('comments')
                ->where('article_id', $id)
                ->join('users', 'comments.commenter_id', '=', 'users.id')
                ->select('comments.*', 'users.name')
                ->orderBy('comments.created_at', 'desc')
                ->get();

            return view('chitiettin.thoisuct', compact('tintuc', 'tincungdanhmuc', 'comments'));
        } else {
            return redirect()->back()->with('error', 'Bài viết không tồn tại');
        }
    }



    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        // Truy vấn dữ liệu từ trang tin tức dựa trên $searchTerm
        $tinTucs = DB::table('articles')
            ->where('title', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('search', ['tinTucs' => $tinTucs, 'searchTerm' => $searchTerm]);
    }


}
