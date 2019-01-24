<?php

namespace AppBundle\Service;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class AcmeCacheListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();
        $response->headers->addCacheControlDirective('no-cache', true);
        //$response->headers->addCacheControlDirective('must-revalidate', true);
    }
}