<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories=Subcategory::with('category')->get();

        $is_page='subcategory';

        return view('admin.subcategory.browse')->with(compact('subcategories','is_page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::all();

        $is_page='subcategory';

        return view('admin.subcategory.create')->with(compact('category','is_page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubcategoryRequest $request)
    {
        $requestData=$request->validated();

        try {
            $requestData['subcategory_slug']= Str::slug($requestData['subcategory_name'], '-');

            Subcategory::create($requestData);

            $status = 'success';
            $message = 'Subcategory created successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong '.$th->getMessage();
        }

        return redirect()->route('subcategory.index')->with($status, $message);

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
        $subcategories=Subcategory::with('category')->find($id);

        $categories=Category::orderBy('id','desc')->get();

        $is_page='subcategory';

        return view('admin.subcategory.edit')->with(compact('subcategories','categories','is_page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubcategoryRequest $request, string $id)
    {
        $requestData=$request->validated();

        try {
            $requestData['subcategory_slug']= Str::slug($requestData['subcategory_name'], '-');

            $subcategory=Subcategory::find($id);
            $subcategory->update($requestData);

            $status = 'success';
            $message = 'Subcategory updated successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong '.$th->getMessage();
        }

        return redirect()->route('subcategory.index')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $subcategory=Subcategory::find($id)->delete();

            $status = 'success';
            $message = 'Subcategory deleted successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong '.$th->getMessage();
        }

        return redirect()->route('subcategory.index')->with($status, $message);
    }
}
