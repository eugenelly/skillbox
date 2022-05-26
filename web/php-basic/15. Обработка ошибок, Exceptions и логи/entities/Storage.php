<?php

require_once 'interfaces/LoggerInterface.php';
require_once 'interfaces/EventListenerInterface.php';

abstract class Storage implements LoggerInterface, EventListenerInterface
{
    abstract public function create(object $obj): string;

    abstract public function read(string $slug): object|null;

    abstract public function update(string $slug, object $obj): void;

    abstract public function delete(string $slug): void;

    abstract public function list(): array;

    public function logMessage(string $test): void
    {
        echo '[Storage] Запись сообщения в лог' . PHP_EOL;
    }

    public function lastMessages(int $messageCount): array
    {
        echo '[Storage] Получение списка ' . $messageCount . ' последних сообщений из лога' . PHP_EOL;
        return [];
    }

    public function attachEvent(string $nameFunc, callable $callbackFunc): void
    {
        echo '[Storage] Присвоиние событию обработчика' . PHP_EOL;
    }

    public function detouchEvent(string $nameFunc): void
    {
        echo '[Storage] Удаление обработчика события' . PHP_EOL;
    }
}
