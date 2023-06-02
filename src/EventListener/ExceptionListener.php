<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Exceptions\ApiException;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();

        if ($exception instanceof NotFoundHttpException) {
            $this->setEventResponse($event, [
                'message' => 'Not Found'
            ], 404);
        } elseif ($exception instanceof AccessDeniedHttpException) {
            $this->setEventResponse($event, [
                'error'=> 'insufficient_permissions',
                'error_description' => 'Insufficient permissions to access resource',
                'message' => "Permission denied"
            ], 403);
        } elseif ($exception instanceof ApiException) {
            $body = [];

            if ($exception->hasDetails()) {
                $body = $exception->getDetails();
            } else {
                $body = ['message' => $exception->getMessage()];
            }

            $this->setEventResponse($event, $body, $exception->getCode());
        } else {
            $this->setEventResponse($event, ['message' => 'Internal Server Error'], 500);
        }
    }

    private function setEventResponse(ExceptionEvent $event, array $data, $status = 500)
    {
        $event->setResponse($this->jsonResponse($data, $status));
    }

    private function jsonResponse(array $data, $status = 200): JsonResponse
    {
        return new JsonResponse($data, $status);
    }
}
