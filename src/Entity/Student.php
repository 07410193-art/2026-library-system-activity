<?php


namespace App\Entity;

class Student{
    private ?int $StudentId;
    private string $name;

    public function __construct(
        ?int $StudentId,
        string $name
    ){
        $this->StudentId = $StudentId;
        $this->name = $name;
    }

    public function getStudentId(): ?int
    {
        return $this->StudentId;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

?>