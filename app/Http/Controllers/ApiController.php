<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Product',
            'data' => $products
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'products' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $product = Product::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Product',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => ''
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Product updated successfully',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
                'data' => ''
            ], 404);
        }
    }
}
