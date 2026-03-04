<?php

namespace App\Core\Insfraestructure;

use App\Core\Domain\NotifyServiceInterface;
use Illuminate\Support\Facades\Log;

class LogNotifyService implements NotifyServiceInterface
{
    public function send(string $message):void{
        Log::info($message);
    }
}
