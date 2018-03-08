<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
      $categories = Category::latest()->get();
      return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|unique:posts',
        'body' => 'required',
        'category_id' => 'required',
      ]);

      $post = new Post;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->image = 'https://www.hoodprotectors.ca/wp-content/uploads/2016/10/product_image_placeholder-400x300.png';
      $post->slug = str_slug($request->title, '-');
      $post->user_id = auth()->user()->id;
      $post->category_id = $request->category_id;
      $post->save();

      return redirect('/post/' . $post->id)->with('info',' Post added succesfully');;
    }

    public function showAll()
    {
      $posts = Post::where('user_id', auth()->user()->id)->paginate(10);
      return view('admin.posts.showall', compact('posts'));

    }

    public function edit($id)
    {
      $post = Post::where('user_id', auth()->user()->id)->find($id);
      $categories = Category::latest()->get();
      $category_id = $post->category_id;
      $post_category = Category::find($category_id);
      return view('admin.posts.edit', compact('post', 'categories', 'post_category'));
    }

    public function update(Request $request, $id)
    {
      $post = Post::find($id);
      $post->title = $request->title;
      $post->body = $request->body;
      $post->image = 'https://www.hoodprotectors.ca/wp-content/uploads/2016/10/product_image_placeholder-400x300.png';
      $post->slug = str_slug($request->title, '-');
      $post->user_id = auth()->user()->id;
      $post->category_id = $request->category_id;
      $post->save();

      return redirect('/post/' . $post->id);
    }

    public function destroy($id)
    {
        //
    }
}
