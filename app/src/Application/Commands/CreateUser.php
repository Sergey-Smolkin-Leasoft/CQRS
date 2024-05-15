<?php

declare(strict_types=1);

namespace App\Application\Commands;

use App\CQRS\CommandInterface;

final readonly class CreateUser implements CommandInterface
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password
    ) {}
}