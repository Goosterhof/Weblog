<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Models\{User, Post, Comment, Category};


class FilterController extends Controller
{
    // TODO :: no need for the Model parameters
  public function category(Request $request, \App\Models\Category $category, \App\Models\Post $post)
  {
    $cat = Category::query();
    // TODO :: use $request instead of the helper function, because you use $request in the other controllers as well
      if (request('id')) {
        //  TODO :: id like? that seems a bit weird, if you search for id 1 you get every category where id includes a 1
        $cat->where('id', 'Like', '%' . request('id') . '%');
      }
    return response()->json([
      $cat->orderBy('id', 'DESC')->first()->posts,
    ]);
  }
}
