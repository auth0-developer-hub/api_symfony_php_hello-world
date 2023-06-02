<?php

namespace App\Controller\Api;

use App\Services\MessageServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MessagesController extends AbstractController
{
    public function showPublicMessage(MessageServiceInterface $messageService)
    {
        return $this->json($messageService->getPublicMessage()->toArray());
    }

    public function showAdminMessage(MessageServiceInterface $messageService)
    {
        return $this->json($messageService->getAdminMessage()->toArray());
    }

    public function showProtectedMessage(MessageServiceInterface $messageService)
    {
        return $this->json($messageService->getProtectedMessage()->toArray());
    }
}
