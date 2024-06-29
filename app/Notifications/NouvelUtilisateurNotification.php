<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NouvelUtilisateurNotification extends Notification
{

    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Votre compte utilisateur a été créé')
        ->greeting('Bonjour ' . $this->user->prenom . ',')
        ->line('Nous avons le plaisir de vous informer que votre compte utilisateur a été créé avec succès.')
        ->line('Voici les détails de votre compte :')
        ->line('Profil: ' . $this->user->profil)
        ->line('E-mail: ' . $this->user->email)
        // ->line('Mot de passe:'.  $this->user->getPassword())
        ->action('Accéder à votre compte', url('/login'))
        ->line('Merci de votre inscription !');
    }
}
