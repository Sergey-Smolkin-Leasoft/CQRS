<?php

declare(strict_types=1);

namespace App\CQRS;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\HandlersLocatorInterface;

final class AttributesHandlersLocators implements HandlersLocatorInterface
{

    public function getHandlers(Envelope $envelope): iterable
    {
        // TODO: Implement getHandlers() method.
    }
}