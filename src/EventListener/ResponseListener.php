<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ResponseEvent;

class ResponseListener
{
    private array $headersToInclude = [];
    private array $headersToExclude = [];

    public function __construct(array $headersToInclude, array $headersToExclude)
    {
        $this->headersToInclude = $headersToInclude;
        $this->headersToExclude = $headersToExclude;
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $response = $event->getResponse();

        $response->headers->add($this->headersToInclude);

        foreach ($this->headersToExclude as $header) {
            header_remove($header);
        }
    }
}
