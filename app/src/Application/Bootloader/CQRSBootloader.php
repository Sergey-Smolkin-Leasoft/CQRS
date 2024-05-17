<?php

declare(strict_types=1);

namespace App\Application\Bootloader;

use App\CQRS\AttributesHandlersLocators;
use App\CQRS\CommandBus;
use App\CQRS\CommandBusInterface;
use Spiral\Boot\Bootloader\Bootloader;
use Symfony\Component\Messenger\Handler\HandlersLocatorInterface;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class CQRSBootloader extends Bootloader
{
    public function defineSingletons(): array
    {

        return [
            HandlersLocatorInterface::class => AttributesHandlersLocators::class,

            CommandBusInterface::class => static fn(
                HandlersLocatorInterface $handlersLocator
            ): CommandBusInterface => new CommandBus(
                messageBus: new MessageBus(
                    middlewareHandlers: [
                        new HandleMessageMiddleware(handlersLocator: $handlersLocator)
                    ]
                )
            )
        ];
    }
}