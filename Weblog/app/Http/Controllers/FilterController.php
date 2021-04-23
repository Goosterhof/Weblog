<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\{User, Post, Comment, Category};


class FilterController extends Controller
{
  public function search(Request $request, \App\Models\Post $post)
  {
    $search = Post::query();
    if (request('term')) {
        $search->where('title', 'Like', '%' . request('term') . '%');
    }

    return view('posts', [
      'search' => $search->where('is_premium', '0')->orderBy('id', 'DESC')->paginate(4),
    ]);
  }

  public function order(Request $request, \App\Models\Post $post)
  {
    return view('posts', [
      'asc' => Post::orderBy('id', 'asc')->get(),
      'desc' => Post::orderBy('id', 'desc')->get(),
    ]);
  }

  public function category(Request $request, \App\Models\Post $post)
  {
    return response()->json([
        'cat' => $cat->orderBy('id', 'DESC')->first()
    ], Response::HTTP_OK);
  }
}
