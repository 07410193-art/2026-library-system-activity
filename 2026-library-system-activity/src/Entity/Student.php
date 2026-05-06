<?php
namespace App\Entity;
class Student
{
    private int $student_id;
    private string $name;
    private string $email;

    public function __construct(int $student_id, string $name, string $email)
    {
        $this->student_id = $student_id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getStudentId(): int
    {
        return $this->student_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
