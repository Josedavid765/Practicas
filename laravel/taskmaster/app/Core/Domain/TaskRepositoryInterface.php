<?php

namespace App\Core\Domain;

use App\Core\Domain\Task;

interface TaskRepositoryInterface
{
    public function findById(string $id): ?Task;

    public function save(Task $task): void;

    public function all(): array;

    public function delete(string $id): void;
}
