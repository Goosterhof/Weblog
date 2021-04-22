<?php

namespace App\Http\Controllers;

use Bouncer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Auth};
use App\Http\Requests\{UserPassRequest, UserAccountRequest, UserDestroyRequest, UserPremiumRequest, UserUnsubscribeRequest};

class UserController extends Controller
{
  // use HasRolesAndAbilities;

  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index(Request $request, \App\Models\User $user)
  {
    return view('dashboard');
  }
  public function premium(Request $request)
  {
    return view('backend.dashboard.premium');
  }
  public function account(UserAccountRequest $request, \App\Models\User $user)
  {
    $request->user()->update([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'bio' => $request->input('bio'),
      'newsletter' => $request->input('newsletter'),
    ]);
    return redirect()->back()->with('success', 'Account successfully updated!');
  }



  public function pay(UserPremiumRequest $request, \App\Models\User $user)
  {
    User::where('id', Auth::user()->id)->first()->update( [
      'premium' => $request->input('premium')
    ]);
   return redirect()->route('dashboard.index')->with('success', 'You have a subscription to premium now');
  }




  public function unsubscribe(UserUnsubscribeRequest $request, \App\Models\User $user)
  {
    User::where('id', Auth::user()->id)->first()->update( [
      'premium' => $request->input('unsubscribe')
    ]);
    return redirect()->back()->with('success', 'Unsubscribed!');
  }




  public function pass(UserPassRequest $request, \App\Models\User $user)
  {
    $request->user()->update([
        'password' => Hash::make($request->new_password)
    ]);

    return redirect()->back()->with('success', 'password successfully updated!');
  }

  public function destroy(UserDestroyRequest $request, \App\Models\User $user)
  {
    $user->delete($validated = $request->validated());
    return redirect()->welcome()->with('success', 'Account successfully removed!');
  }
}
