<?php

interface LoggerInterface
{
    public function logMessage(string $test): void;

    public function lastMessages(int $messageCount): array;
}
