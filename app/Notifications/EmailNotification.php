<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotification extends Notification
{
    use Queueable;

    public $mensagem;

    /**
     * Create a new notification instance.
     */
    public function __construct($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Bueno Networks')
                    ->greeting("Olá, {$this->mensagem['userMail']}")
                    ->line($this->mensagem['welcome'])
                    ->action('Faça login', url('/'))
                    ->line('Crendenciais de acesso:')
                    ->line("Email: {$this->mensagem['email']}")
                    ->line("Senha: {$this->mensagem['password']}")
                    ->salutation("Atenciosamente, {$this->mensagem['userAuth']}");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
