<?php
namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;


class AuthorMiddleware
{
    public function handle($request, Closure $next)
    {
      if (Auth::getUser()->account !== "author") {
          abort(403, 'Unauthorized action.');
      }
      return $next($request);
    }
}
