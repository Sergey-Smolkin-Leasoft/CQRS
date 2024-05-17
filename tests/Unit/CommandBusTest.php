<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Application\Commands\CreateUser;
use App\CQRS\CommandBusInterface;
use Ramsey\Uuid\UuidInterface;
use Spiral\Testing\TestCase;
use Throwable;


final class CommandBusTest extends TestCase
{
    /**
     * @throws Throwable
     * @var CommandBusInterface $bus
     */
    public function testDispatchCommand(): void
    {
        $bus = $this->getContainer()->get(CommandBusInterface::class);

        $operation = $bus->dispatch(new CreateUser(
            name: 'John',
            email: 'myemail@gmail.com',
            password: 'pass'
        ));

        $this->assertInstanceOf(UuidInterface::class,$operation->getUuid());
    }
}