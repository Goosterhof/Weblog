<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;


class HomeController extends Controller
{
   public function index( Request $request )
   {
     return view('welcome', [
       'post' => Post::latest()->paginate(4),
       'featured_1' => Post::inRandomOrder()->limit(1)->get(),
       'featured_2' => Post::inRandomOrder()->limit(1)->get(),
       'featured_3' => Post::inRandomOrder()->limit(1)->get(),
     ]);
   }
}
