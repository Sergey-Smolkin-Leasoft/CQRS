<?php

declare(strict_types=1);

namespace App\CQRS;

use App\CQRS\Attributes\CommandHandler;
use Spiral\Core\Attribute\Singleton;
use Spiral\Tokenizer\Attribute\TargetAttribute;
use Spiral\Tokenizer\TokenizationListenerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\HandlerDescriptor;
use Symfony\Component\Messenger\Handler\HandlersLocatorInterface;

#[Singleton]
#[TargetAttribute(CommandHandler::class)]
final class AttributesHandlersLocators implements
    HandlersLocatorInterface,
    HandlersRegistryInterface,
    TokenizationListenerInterface
{
    private array $handlers = [];

    public function getHandlers(Envelope $envelope): iterable
    {
        foreach ($this->handlers as $commandClass => $handlers) {
            if( !$envelope->getMessage() instanceof $commandClass) {
                continue;
            }

            foreach ($handlers as $handler) {
                yield new HandlerDescriptor($handler);
            }
        }
    }

    /**
     * @param class-string<CommandInterface> $commandClass
     *
     * @return void
     */
    public function register(string $commandClass, callable $handler): void
    {
        $this->handlers[$commandClass][] = $handler;
    }

    /**
     * The method will be fired for each class that was found by Tokenizer.
     */
    public function listen(\ReflectionClass $class): void
    {
        if (!$class->isInstantiable()) {
            return;
        }

        foreach ($class->getMethods() as $method) {
            if (!$method->isPublic()) {
                continue;
            }

            $this->registerCommandHandler($method);
            $this->registerQueryHandler($method);
        }
    }

    /**
     * The method will be fired after all classes were processed by listen method.
     */
    public function finalize(): void
    {
        // TODO: Implement finalize() method.
    }
}