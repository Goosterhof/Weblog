<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\{CommentStoreRequest, CommentDestroyRequest};
use App\Models\Comment;

class CommentController extends Controller
{
 public function store(CommentStoreRequest $request, \App\Models\Comment $comment)
 {
   Comment::create($validated = $request->validated());
   return redirect()->back()->with('success', 'Comment added succesfully!');
 }
 public function destroy(CommentDestroyRequest $request, \App\Models\Comment $comment)
 {
   Comment::destroy($validated = $request->validated());
   return redirect()->back()->with('success', 'Post successfully removed!');
 }
}
