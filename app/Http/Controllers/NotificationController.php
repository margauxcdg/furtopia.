<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
      
    }

  

    public function getNotifications()
    {
        $user = Auth::user();
        $notifications = $user->notifications;

        return view('notifications', ['notifications' => $notifications]);
    }

}
