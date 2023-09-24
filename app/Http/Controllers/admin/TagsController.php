<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags=Tag::all();
        return view('admin.tags.browse')->with(compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $request)
    {
        $requestData=$request->validated();

        try {

            Tag::create($requestData);

            $status = 'success';
            $message = 'Tags created successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong '.$th->getMessage();
        }

        return redirect()->route('tags.index')->with($status, $message);
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
        $tag=Tag::find($id);

        return view('admin.tags.edit')->with(compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagStoreRequest $request, string $id)
    {
        $requestData=$request->validated();

        try {

            $tag=Tag::find($id);
            $tag->update($requestData);

            $status = 'success';
            $message = 'Tags created successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong '.$th->getMessage();
        }

        return redirect()->route('tags.index')->with($status, $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $tag=Tag::find($id)->delete();

            $status = 'success';
            $message = 'Tag deleted successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong '.$th->getMessage();
        }

        return redirect()->route('tags.index')->with($status, $message);
    }
}
