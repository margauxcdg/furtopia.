<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
class NewPetPosted extends Notification
{
    use Queueable;
    protected $pets;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pet $pets, User $users)
    {
        $this->pets = $pets;
        $this->users = $users;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
     
    }

    public function toDatabase($notifiable)
    {
        return [
            'pet_name' => $this->pets->name,
            'message' => 'A new pet has been posted!',
        
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'pet_name' => $this->pets->name,
            'message' => 'A new pet has been posted!',
        
        ]);
    }

}
