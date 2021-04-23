<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\Models\{User, Post, Comment, Category};
use App\Http\Controllers\PostController;


class PremiumMiddleware
{
  public function handle(Request $request, Closure $next)
  {

    $search = Post::query();
    if (request('term')) {
        $search->where('title', 'Like', '%' . request('term') . '%');
    }

    if (!Auth::user()) {
      view()->composer('/post', function ($view) {
        $view->with( 'premium', Post::where('is_premium', '0')->first()->paginate(10) );
      });
      view()->composer('frontend.posts.filter', function ($sear) {
        $sear->with( 'search', $search->orderBy('id', 'DESC')->paginate(4) );
      });
      view()->composer('frontend.categories.cat', function ($cat) {
        $cat->with( 'category_post', Category::where('id', Request()->query('id'))->first()->posts->where('is_premium', '0') );
      });
    } elseif (Auth::user()->premium == '1') {
      view()->composer('/post', function ($view) {
        $view->with( 'premium', Post::where('is_premium', '1')->first()->paginate(10) );
      });
      view()->composer('frontend.posts.filter', function ($sear) {
        $sear->with( 'search', $search->orderBy('id', 'DESC')->paginate(4) );
      });
      view()->composer('frontend.categories.cat', function ($cat) {
        $cat->with( 'category_post', Category::where('id', Request()->query('id'))->first()->posts->where('is_premium', '1') );
      });
    } elseif (Auth::user()->premium == '0') {
      view()->composer('/post', function ($view) {
        $view->with( 'premium', Post::where('is_premium', '0')->first()->paginate(10) );
      });
      view()->composer('frontend.posts.filter', function ($sear) {
        $sear->with( 'search', $search->orderBy('id', 'DESC')->paginate(4) );
      });
      view()->composer('frontend.categories.cat', function ($cat) {
        $cat->with( 'category_post', Category::where('id', Request()->query('id'))->first()->posts->where('is_premium', '0') );
      });
    }
  return $next($request);
  }
}
