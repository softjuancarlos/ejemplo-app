<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $search= $request->search;

        if($search!="")
        $posts = Post::where('title', 'LIKE', "%{$search}%")->with('user')->latest()->paginate();  
        else 
        $posts = Post::latest()->with('user')->paginate(10);  
        
        return view('home', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
