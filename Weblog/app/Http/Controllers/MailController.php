<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewsLetterEmail;

class MailController extends Controller
{
  public function sendNewsLetter()
  {
      $email = 'test@gmail.com';

      $offer = [
          'title' => 'Deals of the Day',
          'url' => 'https://www.remotestack.io'
      ];

      Mail::to($email)->send(new OfferMail($offer));

      dd("Mail sent!");
  }
}
