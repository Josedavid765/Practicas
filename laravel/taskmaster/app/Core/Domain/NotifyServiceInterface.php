<?php

namespace App\Core\Domain;

interface NotifyServiceInterface
{
    public function send(string $message):void;
}
