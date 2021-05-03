<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\{CommentStoreRequest, CommentDestroyRequest};
use App\Models\Comment;

class CommentController extends Controller
{
        // TODO :: no need for \App\Models\Comment $comment
 public function store(CommentStoreRequest $request, \App\Models\Comment $comment)
 {
        // TODO :: no need for validated =
   Comment::create($validated = $request->validated());
   return redirect()->back()->with('success', 'Comment added succesfully!');
 }
 public function destroy(CommentDestroyRequest $request, \App\Models\Comment $comment)
 {
    //    TODO :: use route model binding: https://laravel.com/docs/8.x/routing#route-model-binding
   Comment::destroy($validated = $request->validated());
   return redirect()->back()->with('success', 'Comment successfully removed!');
 }
}
