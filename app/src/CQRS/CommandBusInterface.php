<?php

declare(strict_types=1);

namespace App\CQRS;

interface CommandBusInterface 
{
    public function dispatch(CommandInterface $command): OperationInterface;
}