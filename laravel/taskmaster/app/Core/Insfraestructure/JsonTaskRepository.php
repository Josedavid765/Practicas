<?php

namespace App\Core\Insfraestructure;

use App\Core\Domain\TaskRepositoryInterface;
use App\Core\Domain\Task;

class JsonTaskRepository implements TaskRepositoryInterface
{
    private string $filePath;

    public function __construct()
    {
        $this->filePath = storage_path('app/tasks.json');
    }

        private function loadTasks(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }
        return json_decode(file_get_contents($this->filePath), true) ?: [];
    }

    public function findById(string $id): ?Task
    {
        $tasks = $this->loadTasks();
        
        if (!isset($tasks[$id])) {
            return null;
        }

        $data = $tasks[$id];
        return new Task($data['id'], $data['name'], $data['description'], $data['iscompleted']);
    }

    public function save(Task $task): void
    {
        $tasks = $this->loadTasks();
        $tasks[$task->getId()] = [
            'id' => $task->getId(),
            'name' => $task->getName(),
            'description' => $task->getDescription(),
            'iscompleted' => $task->isCompleted(),
        ];

        file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT));
    }

    public function all(): array{
        $tasksData = $this->loadTasks();
        $domainTasks = [];

        foreach($tasksData as $data){
            $domainTasks[] = new Task(
                $data['id'],
                $data['name'],
                $data['description'],
                $data['iscompleted']
            );
        }

        return $domainTasks;
    }

    public function delete(string $id): void{
        $task = $this->loadTasks();

        if(isset($task[$id])){
            unset($task[$id]);

            file_put_contents($this->filePath, json_encode($task, JSON_PRETTY_PRINT));
        }

    }
}
