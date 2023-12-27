<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Category',
            'data' => $category
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        $category = Category::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Category',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
                'data' => ''
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->update($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Category updated successfully',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => 'Category deleted successfully',
                'data' => $category
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Category not found',
                'data' => ''
            ], 404);
        }
    }
}
