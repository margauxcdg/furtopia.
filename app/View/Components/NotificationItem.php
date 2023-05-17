<?php
namespace App\View\Components;

use Illuminate\View\Component;

class NotificationItem extends Component
{
    public $notification;

    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    public function render()
    {
        return view('components.notification-item');
    }
}
