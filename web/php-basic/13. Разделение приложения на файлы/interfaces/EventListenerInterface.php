<?php

interface EventListenerInterface
{
    public function attachEvent(string $nameFunc, callable $callbackFunc): void;

    public function detouchEvent(string $nameFunc): void;
}
