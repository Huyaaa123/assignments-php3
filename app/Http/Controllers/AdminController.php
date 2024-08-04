<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $newUsers = User::where('type', '!=', 'admin')
        ->orderBy('id', 'desc')
        ->take(3)
        ->get();


        // Truyền danh sách người dùng vào view
        return view('admin.dashboard', compact('newUsers'));
    }
}
