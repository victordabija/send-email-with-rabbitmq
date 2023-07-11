<?php

namespace App\Controller;

use App\Message\SendEmailMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/email")
 */
class MainController extends AbstractController
{
    /**
     * @Route("/send", name="app_main_send_email", methods={"POST"})
     */
    public function index(MessageBusInterface $bus, Request $request): JsonResponse
    {
        $data = $request->toArray();

        $bus->dispatch(new SendEmailMessage($data['recipient'], $data['body']));

        return $this->json([
            'status' => Response::HTTP_OK,
            'message' => Response::$statusTexts[Response::HTTP_OK]
        ], Response::HTTP_OK);
    }
}
