<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

use App\Http\Requests\{CategoryStoreRequest, CategoryUpdateRequest, CategoryDestroyRequest};
use App\Models\Category;



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
     if ( $request->query('id') ) {
       return view('frontend.categories.cat', [
         'category' => Category::where('id', $request->query('id'))->first(),
         'category_post' => Category::where('id', $request->query('id'))->first()->posts,
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
      Category::create($validated = $request->validated());
      return redirect()->back()->with('success', 'Category added succesfully!');
    }
    public function update(CategoryUpdateRequest $request, \App\Models\Category $cat)
    {
      $cat->update($validated = $request->validated());
      return redirect()->back()->with('success', 'Category changed succesfully!');
    }
    public function destroy(CategoryDestroyRequest $request, \App\Models\Category $cat)
    {
      $cat->delete($validated = $request->validated());
      return redirect()->back()->with('success', 'Category successfully removed!');
    }
}
