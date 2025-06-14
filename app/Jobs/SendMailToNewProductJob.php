<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\NewProductNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Notification;

class SendMailToNewProductJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $product)
    {
      //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::all();
        Notification::send($users , new NewProductNotification($this->product));
    }
}
