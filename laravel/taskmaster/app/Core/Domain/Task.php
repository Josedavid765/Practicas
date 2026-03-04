<?php

namespace App\Core\Domain;

use DomainException;

class Task
{
    private string $id;
    private string $name;
    private string $description;
    private bool $iscompleted;

    public function __construct(string $id, string $name, string $description, bool $iscompleted=false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->iscompleted = $iscompleted;
    }

    public function getId(): string { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getDescription(): string { return $this->description; }
    public function isCompleted(): bool { return $this->iscompleted; }

    public function complete(): void 
    {
        if($this->iscompleted) {
            throw new DomainException("L aytarea ya esta completa");
        }

        $this->iscompleted=true;

    }
}
