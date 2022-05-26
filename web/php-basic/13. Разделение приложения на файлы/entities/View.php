<?php

abstract class View
{
    private object $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    abstract public function displayTextById($id): void;

    abstract public function displayTextByUrl($url): void;
}
