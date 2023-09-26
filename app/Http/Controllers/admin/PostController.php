<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();

        $is_page = 'post';

        return view('admin.posts.browse')->with(compact('post','is_page'));
    }

    public function create()
    {
        $subcategories = Subcategory::all();

        $tags = Tag::where('status',1)->get();

        $categories = Category::orderBy('id', 'desc')->get();

        $is_page = 'post';

        return view('admin.posts.create')->with(compact('subcategories', 'categories','tags','is_page'));
    }

    public function edit($id) {

        $post = Post::find($id);

        $subcategories = Subcategory::all();

        $tags = Tag::where('status',1)->get();

        $categories = Category::orderBy('id', 'desc')->get();

        $is_page = 'post';

        return view('admin.posts.edit')->with(compact('post','subcategories', 'categories','tags','is_page'));
    }

    public function store(StorePostRequest $request)
    {
        $request->except('_method', '_token','tags');

        $requestValidated = $request->validated();

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/images', $fileName);
                $requestValidated['image'] = $fileName;
            }
            $requestValidated['user_id'] = auth()->user()->id;

            $requestValidated['is_featured'] = $request->is_featured??0;

            $requestValidated['is_banner'] = $request->is_banner??0;
            
            $tags=$request->tags;

            $post = Post::create($requestValidated);

            $post->tags()->attach($tags,['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

            $status = 'success';

            $message = 'Post created successfully';
        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong ' . $th->getMessage();
        }

        return redirect()->route('posts.index')->with($status, $message);
    }
    public function update(UpdatePostRequest $request,$id){
        $requestValidated = $request->validated();

        try {
            $post = Post::find($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/images', $fileName);
                $requestValidated['image'] = $fileName;
            }else{
                $requestValidated['image'] =$post->image;
            }

            $requestValidated['is_featured'] = $request->is_featured??0;

            $requestValidated['is_banner'] = $request->is_banner??0;

            $post->update($requestValidated);

            $tags=$request->tags;

            $post->tags()->attach($tags,['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

            $status = 'success';

            $message = 'Post updated successfully';

        } catch (\Throwable $th) {

            $status = 'error';

            $message = 'Something went wrong ' . $th->getMessage();
        }

        return redirect()->route('posts.index')->with($status, $message);
    }

    public function destroy($id) {

        try {
            $post = Post::find($id)->delete();

            $status = 'success';

            $message = 'Post deleted successfully';

        } catch (\Throwable $th) {

            $status = 'error';

            $message = 'Something went wrong ' . $th->getMessage();
        }
        
        return redirect()->route('posts.index')->with($status, $message); 
    }
}
