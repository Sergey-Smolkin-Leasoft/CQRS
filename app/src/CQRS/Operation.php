<?php

declare(strict_types=1);

namespace App\CQRS;

use Ramsey\Uuid\UuidInterface;

final readonly class Operation implements OperationInterface
{

    public static function create(): OperationInterface
    {
        return new self(
            uuid: Uuid::uuid7()
        );
    }

    private function __construct(
        private UuidInterface $uuid
    ) {}

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }
}