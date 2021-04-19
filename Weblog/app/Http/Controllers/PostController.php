<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{Auth, Storage, Session, File};
use App\Http\Requests\{PostStoreRequest, PostUpdateRequest, PostDestroyRequest};
use App\Models\{User, Post, Comment, Category};


class PostController extends Controller
{
   public function index(Request $request)
   {
     $search = Post::query();
     if (request('term')) {
       $search->where('title', 'Like', '%' . request('term') . '%');
     }
     $cat = Category::query();
       if (request('cat')) {
         $cat->where('id', 'Like', '%' . request('cat') . '%' );
       }

     return view('posts', [
      'post' => Post::latest()->paginate(10),
      'category' => Category::latest()->get(),
      'search' => $search->orderBy('id', 'DESC')->paginate(5),
      'cat' => $cat->orderBy('id', 'DESC')->first()->posts,
      'cat_name' => Category::where('id', request('cat'))->first(), // for the naminng of the query.
     ]);
    }

    // frondend layout
    public function show(\App\Models\User $user, Request $request, $id)
    {
      $post = Post::where('id', $id)->first();
      $user = User::where('id', $post->user_id)->first();

      return view('frontend.posts.post', [
        'post' => $post,
        'user' => User::where('id', $post->user_id)->get(),
        'comment' => Comment::where('post_id', $id)->get(),
        'user_post' => $user->posts()->get(),

      ]);
    }

   // Backend layout
   public function post(\App\Models\User $user, \App\Models\Post $post, \App\Models\Category $category, Request $request)
   {
     $test =  Post::all()->where('user_id', Auth::id())->first()->categories()->pluck('category_id')->toArray();

     // dd($test);

     return view('backend.posts.posts', [
       'post' => Post::where('user_id', Auth::id())->latest()->paginate(10),
       'category' => Category::latest()->get(),
       'posts' => Post::all()->where('user_id', Auth::id())->first()->categories()->pluck('category_id')->toArray(),
       'user' => Auth::user(),
     ]);
   }

  public function store(PostStoreRequest $request, \App\Models\Post $post)
  {
      $imagePath = str_replace(' ', '', $request->slug) . '-' . time() . '.' . $request->image->extension();
      $imageName = str_replace(' ', '', $request->slug) . '-' . time();

      $request->image->move(public_path('images'), $imagePath);

      Post::create([
        'title' => $request->input('title'),
        'slug' => $request->input('slug'),
        'body' => $request->input('body'),
        'user_id' => $request->input('user_id'),
        'is_premium' => $request->input('is_premium'),
        'media_path' => $imagePath,
        'media_name' => $imageName,
      ])->categories()->sync($request->input('categories'));

      return redirect()->route('post.show', Post::latest()->first());
  }


  public function update(PostUpdateRequest $request, \App\Models\Post $post)
  {

    if($request->image_update != ''){
        $imagePath = str_replace(' ', '', $request->slug) . '-' . time() . '.' . $request->image_update->extension();
        $imageName = str_replace(' ', '', $request->slug) . '-' . time();
        $request->image_update->move(public_path('images'), $imagePath);
    }

    Post::where('id', $request->input('post_id'))->first()->update([
      'title' => $request->input('title'),
      'slug' => $request->input('slug'),
      'body' => $request->input('body'),
      'user_id' => $request->input('user_id'),
      'is_premium' => $request->input('is_premium'),
    ]);

    $post->categories()->sync($request->input('categories'));

    return redirect()->back()->with('success', 'Post successfully changed!');

  }





  public function destroy(PostDestroyRequest $request, \App\Models\Post $post)
  {

    // $request->image->remove(public_path('images'), $imagePath);

    if(Storage::exists(asset( 'images/' . $post->media_path ))) {
          File::delete(asset( 'images/' . $post->media_path ));
      }

    $post->delete($validated = $request->validated());
    return redirect()->back()->with('success', 'Post successfully removed!');
  }
}
