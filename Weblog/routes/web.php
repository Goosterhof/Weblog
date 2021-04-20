<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, PostController, CategoryController, CommentController, UserController};
use App\Http\Middleware\{Authenticate, AuthorMiddleware};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


require __DIR__.'/auth.php';

// routes for home.
Route::get('', [HomeController::class,'index'])->name('home.index');

// routes for posts.
Route::get('/post', [PostController::class,'index'])->name('post.index');
Route::get('/post/{post}', [PostController::class,'show'])->name('post.show');
Route::get('/post/search', [PostController::class,'search'])->name('post.search');

// routes for Category.
Route::get('/categories', [CategoryController::class,'index'])->name('category.index');
Route::get('/categories/cat', [CategoryController::class,'show'])->name('category.show');

// routes for comments.
Route::post('/post', [CommentController::class, 'store'])->name('comment.store');
Route::delete('/post', [CommentController::class, 'destroy'])->name('comment.destroy');

// Routes for logged in users.
$router->group(['middleware' => ['auth']], function($router) {
  // dashboard routes
  Route::get('dashboard', [UserController::class, 'index'])->name('dashboard.index');
  Route::patch('dashboard/pass', [UserController::class, 'pass'])->name('user.pass.update');
  Route::patch('dashboard/account', [UserController::class, 'account'])->name('user.account.update');
  Route::delete('dashboard', [UserController::class, 'destroy'])->name('user.destroy');

  // to get premium.
  Route::get('premium', [UserController::class, 'premium'])->name('user.premium');
  Route::patch('premium/pay', [UserController::class, 'pay'])->name('user.pay');





$router->group(['middleware' => ['author']], function() {
    Route::get('/dashboard/cat', [CategoryController::class, 'category'])->name('cat.index');
    Route::resource('/dashboard/cat', CategoryController::class,
      ['only' => ['store', 'update', 'destroy']]
    );



    Route::get('/dashboard/post', [PostController::class, 'post'])->name('post.post');
    Route::get('dashboard/post/{edit}', [PostController::class, 'edit'])->name('post.edit');



      Route::resource('/dashboard/post', PostController::class,
        ['only' => ['store', 'update', 'destroy']]
      );


  });
});
