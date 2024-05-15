<?php

declare(strict_types=1);

namespace Tests\Unit;

final class CommandBusTest extends TestCase
{
    final public function testDispatchCommand(): void
    {
        $bus = new CommandBus();
    }
}