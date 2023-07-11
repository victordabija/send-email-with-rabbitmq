<?php

namespace App\MessageHandler;

use App\Message\SendEmailMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

final class SendEmailMessageHandler implements MessageHandlerInterface
{
    private MailerInterface $mailer;

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;

    }

    public function __invoke(SendEmailMessage $message)
    {
        $this->logger->info("Start sending message");
        $email = (new Email())
            ->from($_ENV['EMAIL_SENDER'] ?? "vitea@m.com")
            ->to($message->getRecipient())
            ->text($message->getBody());

        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $this->logger->error("Error while sending email: " . $e->getMessage());
        }
    }
}
