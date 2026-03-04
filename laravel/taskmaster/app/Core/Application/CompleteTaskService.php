<?php

namespace App\Core\Application;

use App\Core\Domain\Task;
use App\Core\Domain\TaskRepositoryInterface;
use App\Core\Domain\NotifyServiceInterface;
use Exception;

class CompleteTaskService
{
    private TaskRepositoryInterface $taskRepositoryInterface;
    private NotifyServiceInterface $notifyServiceInterface;

    public function __construct(TaskRepositoryInterface $taskRepositoryInterface, NotifyServiceInterface $notifyServiceInterface)
    {
        $this->taskRepositoryInterface = $taskRepositoryInterface;
        $this->notifyServiceInterface = $notifyServiceInterface;
    }

    public function execute(string $taskId):void{
        $taskEncontrada = $this->taskRepositoryInterface->findById($taskId);

        if($taskEncontrada==null){
            throw new Exception("La tarea no fue encontrada porque no existe");
        }

        $taskEncontrada->complete();

        $this->taskRepositoryInterface->save($taskEncontrada);

        $this->notifyServiceInterface->send("¡Tarea Completada!");
    }
}
