<?php

declare(strict_types=1);

namespace App\Application\Handlers;

use App\CQRS\Attributes\CommandHandler;

final class CreateUserHandler
{
    #[CommandHandler]
    public function __invoke(): void
    {
        /*$this->em->persist(new User(
            ''
        ));*/
    }
}