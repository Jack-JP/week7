<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
  protected $fillable = [
      'title', 'body', 'image',
  ];
    public function index()
    {
        $categories = Category::latest()->get();
        $posts = post::latest()->get();
        $populairs = post::latest()->limit(5)->get();
        return view('posts.index', compact('posts', 'categories', 'populairs'));
    }

    public function create()
    {
      //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $post = Post::with('user')->where('id', $id)->first();
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
