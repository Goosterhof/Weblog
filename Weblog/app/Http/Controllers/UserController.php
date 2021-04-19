<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\{UserPassRequest, UserAccountRequest, UserDestroyRequest, UserPremiumRequest};

class UserController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
    return view('dashboard');
  }


  public function premium(Request $request)
  {

    // dd(User::where('id', Auth::user()->id)->first());

    return view('backend.dashboard.premium');



  }


  public function account(UserAccountRequest $request, \App\Models\User $user)
  {
    $request->user()->fill([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'bio' => $request->input('bio'),
      'newsletter' => $request->input('newsletter'),
    ])->save();
    return redirect()->back()->with('success', 'Account successfully updated!');
  }



  public function pay(UserPremiumRequest $request, \App\Models\User $user)
  {
    User::where('id', Auth::user()->id)->first()->update( [
      'premium' => $request->input('premium')
    ]);

   // return redirect()->back()->with('success', 'Category successfully removed!');
   return redirect()->route('dashboard.index')->with('success', 'You have a subscription to premium now');

  }

  public function pass(UserPassRequest $request, \App\Models\User $user)
  {
    $request->user()->fill([
        'password' => Hash::make($request->new_password)
    ])->save();

    return redirect()->back()->with('success', 'password successfully updated!');
  }

  public function destroy(UserDestroyRequest $request, \App\Models\User $user)
  {
    $user->delete($validated = $request->validated());
    return redirect()->welcome()->with('success', 'Account successfully removed!');
  }
}
