<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\{CategoryStoreRequest, CategoryUpdateRequest, CategoryDestroyRequest};
use App\Models\{Category, Post};

class CategoryController extends Controller
{
  public function index(Request $request)
  {
    return view('categories', [
      'category' => Category::latest()->paginate(40),
     ]);
   }
   public function show(Request $request)
   {
    //    TODO :: use route model binding: https://laravel.com/docs/8.x/routing#route-model-binding
    // like you use in the update and destroy method
     if ( $request->query('id') ) {
       return view('frontend.categories.cat', [
         'category' => Category::where('id', $request->query('id'))->first(),
         'category_post_1' => Category::where('id', $request->query('id'))->first()->posts->where('is_premium', '0'),
       ]);
     }
   }
   public function category(Request $request)
   {
     return view('backend.categories.categories', [
       'category' => Category::latest()->paginate(20),
      ]);
    }

    public function store(CategoryStoreRequest $request)
    {
        // TODO :: can use $request->validated() like you use in update
      Category::create([
        'name' => $request->input('name'),
      ]);
      return redirect()->back()->with('success', 'Category added succesfully!');
    }

    public function update(CategoryUpdateRequest $request, \App\Models\Category $cat)
    {
        // TODO :: no need for validated =
      $cat->update($validated = $request->validated());
      return redirect()->back()->with('success', 'Category changed succesfully!');
    }

    public function destroy(CategoryDestroyRequest $request, \App\Models\Category $cat)
    {
      $cat->posts()->detach();
        // TODO :: no need for validated =
      $cat->delete($validated = $request->validated());
      return redirect()->back()->with('success', 'Category successfully removed!');
    }
}
