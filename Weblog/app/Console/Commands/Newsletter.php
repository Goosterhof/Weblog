<?php

namespace App\Console\Commands;

use Mail;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;

class newsletter extends Command implements ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'newsletter:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Newsletter subscribtion service.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $newsUser = \App\Models\User::all()->where('newsletter', '1');

      Mail::to($newsUser)->send(new \App\Mail\NewsLetterEmail());

    }
}
