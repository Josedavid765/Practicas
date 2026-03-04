<?php

namespace App\Core\Application;
use App\Core\Domain\TaskRepositoryInterface;

class ListTaskService
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute():array{
        return $this->repository->all();
    }
}