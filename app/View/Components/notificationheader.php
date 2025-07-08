<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\Component;

class notificationheader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $notificationsUnRead = Auth::user()->unreadNotifications;
        $notificationsRead = Auth::user()->readNotifications;

        return view('components.notificationheader' , compact('notificationsUnRead' , 'notificationsRead'));
    }
}
