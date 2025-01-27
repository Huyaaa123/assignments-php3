<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function dashboard()
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
}
