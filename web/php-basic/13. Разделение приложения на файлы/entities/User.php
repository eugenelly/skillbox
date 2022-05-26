<?php

require_once 'interfaces/EventListenerInterface.php';

abstract class User implements EventListenerInterface
{
    protected int $id;
    protected string $name;
    protected string $role;

    abstract public function getTextsToEdit(): void;

    public function attachEvent(string $nameFunc, callable $callbackFunc): void
    {
        echo '[User] Присвоиние событию обработчика' . PHP_EOL;
    }

    public function detouchEvent(string $nameFunc): void
    {
        echo '[User] Удаление обработчика события' . PHP_EOL;
    }
}
