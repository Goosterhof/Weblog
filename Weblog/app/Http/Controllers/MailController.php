<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewsLetterEmail;
use Illuminate\fasades\Email;

class MailController extends Controller
{
  public function sendNewsLetter()
  {
    $newsUser = \App\Models\User::all()->where('newsletter', '1');



    foreach ($newsUser as $user) {

      dd($user->email);
      
      Mail::to($user->email)->send(new NewsLetterEmail($latestNews));

    }
  }
}
