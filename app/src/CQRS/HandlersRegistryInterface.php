<?php

namespace App\CQRS;

interface HandlersRegistryInterface
{
    /**
     * @param class-string<CommandInterface> $commandClass
     * @param callable                       $handler
     *
     * @return void
     */
    public function register(string $commandClass, callable $handler): void;
}