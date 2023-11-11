<?php

namespace App\Service;

use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Messaging\Notification as MessagingNotification;
use Kreait\Firebase\Contract\Messaging;
use Kreait\Firebase\Messaging\WebPushConfig;
use Throwable;

class MessageService
{
    private Messaging $messaging;

    public function __construct(Messaging $messaging)
    {
        $this->messaging = $messaging;
    }

    public function send(string $tokenFcmUser, string $title, string $body, string $topic = 'Notificação')
    {
        try {

            $message = CloudMessage::withTarget('token', $tokenFcmUser)
                ->withNotification([
                    'title' => $title,
                    'body' => $body
                ]);

            return $this->messaging->send($message);

        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
