<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\{User, Post, Comment, Category};


class FilterController extends Controller
{
  public function category(Request $request, \App\Models\Category $category, \App\Models\Post $post)
  {
    $cat = Category::query();
      if (request('id')) {
        $cat->where('id', 'Like', '%' . request('id') . '%');
      }
    return response()->json([
      $cat->orderBy('id', 'DESC')->first()->posts,
    ]);
  }
}
