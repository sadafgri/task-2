<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('index', ['posts' => $posts]);
    }
    public function show($id)
    {
        $category = Category::all();
        $posts=Post::find($id)->get();
        return view('show',['categories'=>$category , 'posts'=>$posts]);
    }
    public function create()
    {
        $category = Category::all();
        $post=Post::all();
        return view('create',['categories'=>$category , 'post'=>$post]);
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
        ]);

        $post->categories()->attach($request->category_id,[ 'created_at'=>date('Y-m-d H:i:s')]);

        return redirect()->route('post.index');
    }
}
