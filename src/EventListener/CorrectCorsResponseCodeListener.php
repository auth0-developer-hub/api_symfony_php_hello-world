<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class CorrectCorsResponseCodeListener
{
    public function onKernelResponse(ResponseEvent $event)
    {
        if ($event->getRequest()->getMethod() !== Request::METHOD_OPTIONS) {
            return;
        }

        $response = $event->getResponse();
        $content = $response->getContent();

        if (empty($content)) {
            $response->setStatusCode(204);
        }
    }
}
