<?php

namespace App\Message;

final class SendEmailMessage
{
     private string $recipient;

     private string $body;

    public function __construct(string $recipient, string $body)
    {
        $this->recipient = $recipient;
        $this->body = $body;
    }

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
