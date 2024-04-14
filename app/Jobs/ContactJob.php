<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;

    // Specify the number of times the job should be attempted
    public $tries = 3;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $mailable = new ContactMail($this->data);
        Mail::to('mohammed.abdelkhalak1995@gmail.com')->send($mailable);
    }

    public function delay()
    {
//  i'm already used delay in sendmail method in contactController

        // Set a delay of 10 minutes (600 seconds)
        // return now()->addMinutes(1);

        // Set a delay of 10 seconds
        // return now()->addSeconds(20);
    }
}
