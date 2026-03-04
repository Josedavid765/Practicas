<?php

namespace App\Core\Insfraestructure;

use App\Core\Domain\TaskRepositoryInterface;
use App\Core\Domain\Task;
use App\Models\TaskModel;


class EloquentTaskRepository implements TaskRepositoryInterface
{
    public function findById(string $id): ?Task
    {
        $eloquentTask = TaskModel::find($id);

        if(!$eloquentTask){
            return null;
        }

        return new Task($eloquentTask->id, $eloquentTask->name, $eloquentTask->description, $eloquentTask->iscompleted);
    }

    public function save(Task $task):void{
        $eloquentModel = TaskModel::find($task->getId());

        if ($eloquentModel) {
        $eloquentModel->iscompleted = $task->isCompleted();
        $eloquentModel->name = $task->getName();
        $eloquentModel->description = $task->getDescription();

        $eloquentModel->save();
    }
    }

    public function all():array{
        $eloquentTasks = TaskModel::all();

        $domainsTasks = [];

        foreach ($eloquentTasks as $eloquentTask) {
        $domainTasks[] = new Task(
            (string) $eloquentTask->id,
            $eloquentTask->name,
            $eloquentTask->description,
            (bool) $eloquentTask->iscompleted
            );
        }

        return $domainsTasks;

    }

    public function delete(string $id): void{
        TaskModel::destroy($id);
    }
}