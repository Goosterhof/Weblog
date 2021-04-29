<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;


class NewsLetterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $newsPost;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $newsPost = \App\Models\Post::where('created_at', '>=', Carbon::now()->subDays(7))->limit(10)->get();

      return $this->markdown('mail.newsletter')
        ->with('newsPost',  $newsPost);
    }
}
