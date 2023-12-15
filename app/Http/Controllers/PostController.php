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
        $posts=Post::find($id);
        return view('show',['posts'=>$posts]);
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
//        dd($post);
        foreach ($request->category_id as $category_id){
            $category=Category::find($category_id);
            $post->categories()->attach($category);
        }
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $category = Category::all();
        $posts=Post::find($id);
        return view('edit',['categories'=>$category , 'posts'=>$posts]);
    }

    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        Post::where('id', $id)->update([
            'title'=>$request->title,
            'body'=>$request->body,
            ]);

        $post->categories()->detach();

        foreach($request->category_id as $category_id){
            $category=Category::find( $category_id);
            $post->categories()->attach($category);
        }
        return redirect()->route('post.index');
    }
    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return redirect()->route('post.index');
    }
}
