<?php

declare(strict_types=1);

namespace App\CQRS;

use Symfony\Component\Messenger\MessageBusInterface;

final readonly class CommandBus implements CommandBusInterface
{

    public function __construct(
        private MessageBusInterface $messageBus
    )
    {}

    public function dispatch(CommandInterface $command): OperationInterface
    {
        $operation = Operation::create();

        $this->messageBus->dispatch($command);

        return $operation;
    }

    public function dispatchMany()
    {
        // TODO: Implement dispatchMany() method.
    }
}