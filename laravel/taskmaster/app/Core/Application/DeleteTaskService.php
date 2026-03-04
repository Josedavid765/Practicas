<?php

namespace App\Core\Application;

use App\Core\Domain\TaskRepositoryInterface;

class DeleteTaskService
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $id): void
    {
        $this->repository->delete($id);
    }
}
