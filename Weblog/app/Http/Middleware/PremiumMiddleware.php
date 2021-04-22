<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use App\Models\{User, Post, Comment, Category};


class PremiumMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    
  }
}
