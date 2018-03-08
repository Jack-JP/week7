<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      if($request->anonymous == "on"){
        $username = "anonymous";
      }else{
        $username = auth()->user()->name;
      }
      $comment = new Comment;
      $comment->comment = $request->input('comment');
      $comment->username = $username;
      $comment->post_id = $request->input('post_id');
      $comment->save();
      return redirect()->route('post.show', ['id' => $request->input('post_id')]);
    }

    public function show(Comment $comment)
    {
        //
    }

    public function edit(Comment $comment)
    {
        //
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
