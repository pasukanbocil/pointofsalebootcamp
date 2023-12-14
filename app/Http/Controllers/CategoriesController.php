<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('category.categories', [
            'pageTitle' => 'Kategori',
            'content' => 'ini halaman kategori',
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('category.create', [
            'pageTitle' => 'Tambah Kategori',
            'content' => 'ini halaman tambah kategori'
        ]);
    }

    public function store(CategoriesCreateRequest $request)
    {
        Category::create($request->all());

        return redirect('/category')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('category.edit', [
            'pageTitle' => 'Edit Category',
            'categories' => Category::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        Category::findOrFail($id)->update([
            'category_name' => $request->category_name
        ]);

        return redirect('/category')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/category')->with('success', 'Kategori berhasil dihapus');
    }

}
