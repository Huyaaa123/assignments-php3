<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.loaitin', compact('categories'));
    }

    public function create()
    {
        return view('admin.crud.crud-loaitin-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.loaitin.create')->with('success', 'Thêm mới loại tin thành công.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.crud.crud-loaitin-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category->update($request->only('category_name'));

        return redirect()->route('admin.loaitin')->with('success', 'Cập nhật loại tin thành công.');
    }

    public function destroy($id)
    {
        $user = Category::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.loaitin')->with('success', 'Xóa người dùng thành công.');
    }
}
