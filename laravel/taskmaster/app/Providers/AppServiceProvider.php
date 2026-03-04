<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Core\Domain\TaskRepositoryInterface;
use App\Core\Domain\NotifyServiceInterface;
use App\Core\Insfraestructure\EloquentTaskRepository;
use App\Core\Insfraestructure\LogNotifyService;

class AppServiceProvider extends ServiceProvider
{
    //Esto es para que funcione el guardado en un Json
    public function register(): void
{
    $this->app->bind(
        \App\Core\Domain\TaskRepositoryInterface::class, 
        \App\Core\Insfraestructure\JsonTaskRepository::class 
        //EloquentTaskRepository::class
    );

    $this->app->bind(
        \App\Core\Domain\NotifyServiceInterface::class, 
        \App\Core\Insfraestructure\LogNotifyService::class
    );
}

    public function boot(): void
    {

    }
}
