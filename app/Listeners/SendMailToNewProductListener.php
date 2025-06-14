<?php

namespace App\Listeners;

use App\Events\SendMailToNewProductEvent;
use App\Jobs\SendMailToNewProductJob;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewProductNotification;
use Illuminate\Support\Facades\Notification;

class SendMailToNewProductListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(SendMailToNewProductEvent $event): void
    {
        SendMailToNewProductJob::dispatch($event);
    }
}
