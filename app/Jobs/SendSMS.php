<?php

namespace App\Jobs;

use App\User;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMS extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        Mail::raw('This is a message from Homestead. This message was sent automatically from the queued jobs.' , function ($message) {
            $message->from('homestead.proto@gmail.com', 'Homestead');
            $message->to('sms4f00@gmail.com');
			$message->subject('9059310355');
        });  
    }
}
