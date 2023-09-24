<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;


class FrontendController extends Controller
{
    public function index(){
        
        $posts = Post::where('is_banner',true)->get();

        return view('frontend.master',compact('posts'));
    }
}
