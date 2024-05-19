<?php

declare(strict_types=1);

namespace App\Modules\Notification\Handlers;

use App\Application\Commands\CreateUser;
use App\CQRS\Attributes\CommandHandler;

final class NotifyAdminHandler
{
    #[CommandHandler]
    public function __invoke(CreateUser $command): void
    {
        dump($command);
    }
}