<?php

namespace App\Core\Application;

use App\Core\Domain\Task;
use App\Core\Domain\TaskRepositoryInterface;

class CreateTaskService
{
    private TaskRepositoryInterface $taskRepositoryInterface;

    public function __construct(TaskRepositoryInterface $taskRepositoryInterface)
    {
        $this->taskRepositoryInterface=$taskRepositoryInterface;
    }

    public function execute(string $id, string $name, string $description):void{
        $taskNueva = new Task($id, $name, $description);
        $this->taskRepositoryInterface->save($taskNueva);
    }
}
