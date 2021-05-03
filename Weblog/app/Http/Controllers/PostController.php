<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\{Auth, Storage, Session, File};
use App\Http\Requests\{PostStoreRequest, PostUpdateRequest, PostDestroyRequest};
use App\Models\{User, Post, Comment, Category};

class PostController extends Controller
{
    public function index(Request $request, \App\Models\Post $post)
    {
      $premium = Post::when( Auth::check() && Auth::user()->premium,
        function () {
            // TODO ::  if (true)? no need for that, cause it's always true
          if (true) {
            return Post::where('is_premium', '1')->get();
          }
        });
        return view('posts', [
          'post' => Post::where('is_premium', '0')->latest()->paginate(10),
          'premium' => $premium,
          'category' => Category::latest()->get(),
          'user' => User::where('id', $post->user_id)->get(),
          'cat_name' => Category::where('id', request('cat'))->first(), // for the naminng of the query.
        ]);

    }

    // frondend layout
    public function show(Request $request, $id)
    {
    //    TODO :: use route model binding: https://laravel.com/docs/8.x/routing#route-model-binding
        $post = Post::where('id', $id)->first();
        $user = User::where('id', $post->user_id)->first();

        return view('frontend.posts.post', [
            'post' => $post,
            // TODO :: don't query the same thing twice
            'user' => User::where('id', $post->user_id)->get(),
            'comment' => Comment::where('post_id', $id)->get(),
            'user_post' => $user->posts()->get(),
        ]);
    }

    // Backend layout
    public function post(Request $request)
    {
        return view('backend.posts.posts', [
            'post' => Post::where('user_id', Auth::id())->latest()->paginate(10),
            'category' => Category::latest()->get(),
            'user' => Auth::user(),
        ]);
    }

    public function edit(Request $request, $id)
    {
    //    TODO :: use route model binding: https://laravel.com/docs/8.x/routing#route-model-binding
        $post = Post::where('id', $id)->first();

        return view('backend.posts.edit', [
            'post' => $post,
            'category' => Category::latest()->get(),
            'postcat' => $post->categories->pluck('id')->toArray(),
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
        ])
            ->categories()
            ->sync($request->input('categories'));

        return redirect()->route('post.show', Post::latest()->first());
    }

    public function update(PostUpdateRequest $request, \App\Models\Post $post)
    {
      if($request->file != ''){
        $imagePath = str_replace(' ', '', $request->slug) . '-' . time() . '.' . $request->image->extension();
        $imageName = str_replace(' ', '', $request->slug) . '-' . time();
        $request->image->move(public_path('images'), $imagePath);
      }

    //   TODO :: no need for detach when you use sync
      $post->categories()->detach();

    //    TODO :: use $post
      Post::where('id', $request->input('post_id'))
            ->first()
            ->update([
                'title' => $request->input('title'),
                'slug' => $request->input('slug'),
                'body' => $request->input('body'),
                'user_id' => $request->input('user_id'),
                'is_premium' => $request->input('is_premium'),
            ]);

      $post->categories()->sync($request->input('categories'));

      return redirect()->route('post.show', Post::latest()->first());
    }

    public function destroy(PostDestroyRequest $request, \App\Models\Post $post)
    {

      $imagePath = $post->media_path;

      if(file::exists(public_path('images/' . $imagePath))) {
        file::delete(public_path('images/' . $imagePath));
      }

      $post->categories()->detach();
        // TODO :: no need for validated =
      $post->delete($validated = $request->validated());

        return redirect()
            ->back()
            ->with('success', 'Post successfully removed!');
    }
}
