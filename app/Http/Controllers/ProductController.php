<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.product', [
            'pageTitle' => 'Produk',
            'content' => 'ini halaman produk',
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('product.create', [
            'pageTitle' => 'Tambah Produk',
            'content' => 'ini halaman tambah produk'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        Product::create([
            'products' => $request->products,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect('/product');
    }

    public function edit($id)
    {
        return view('product.edit', [
            'pageTitle' => 'Edit Produk',
            'product' => Product::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'products' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        Product::findOrFail($id)->update([
            'products' => $request->products,
            'price' => $request->price,
            'stock' => $request->stock
        ]);

        return redirect('/product');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/product');
    }
}
