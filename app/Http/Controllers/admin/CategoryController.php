<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $is_page = 'category';

        return view('admin.category.browse', compact('categories', 'is_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $is_page = 'category';

        return view('admin.category.create', compact('is_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'category_name' => 'required|string|max:250|min:1|unique:categories,category_name'
        ], [
            'category_name.required' => 'category is required.'
        ]);

        try {
            $requestData['category_slug'] = Str::slug($requestData['category_name'], '-');

            Category::create($requestData);

            $status = 'success';
            $message = 'Category created successfully';
        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong ' . $th->getMessage();
        }

        return redirect()->route('category.index')->with($status, $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $is_page = 'category';
        return view('admin.category.edit', compact('category', 'is_page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'category_name' => 'required|string|max:250|min:1'
        ], [
            'category_name.required' => 'Category is required.'
        ]);

        try {
            $category = Category::find($id);

            $requestData['category_slug'] = Str::slug($requestData['category_name'], '-');

            $category->update($requestData);

            $status = 'success';
            $message = 'Category updated successfully';
        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong ' . $th->getMessage();
        }

        return redirect()->route('category.index')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Category::find($id)->delete();
            $status = 'success';
            $message = 'Category deleted successfully';
        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong ' . $th->getMessage();
        }

        return redirect()->route('category.index')->with($status, $message);
    }

    public function relative_subcategory(Request $request)
    {
        try {
            $data = Category::find($request->id)->subcategory ?? [];

            $response = [
                'status' => 200,
                'data' => $data,
            ];
        } catch (\Throwable $th) {

            $response = [
                'status' => 500,
                'data' => SOMETHING_WENT_WRONG,
            ];
        }
        return response()->json($response);
    }
}
