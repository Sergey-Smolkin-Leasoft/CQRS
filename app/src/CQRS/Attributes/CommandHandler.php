<?php

declare(strict_types=1);

namespace App\CQRS\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
final readonly class CommandHandler
{

}