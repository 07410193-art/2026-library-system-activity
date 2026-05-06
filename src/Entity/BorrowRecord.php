<?php
declare(strict_types=1);

namespace App\Entity;

use DateTime;

class BorrowRecord{
    private ?int $recordId;
    private int $studentId;
    private int $bookId;
    private DateTime $borrowDate;
    private DateTime $dueDate;
    private string $status;
    private float $fineAmount;

    public function __construct(
        ?int $recordId = null,
        int $studentId,
        int $bookId,
        DateTime $borrowDate,
        DateTime $dueDate,
        string $status = 'borrowed',
        float $fineAmount = 0.0
    )
    {
        $this->recordId = $recordId;
        $this->studentId = $studentId;
        $this->bookId = $bookId;
        $this->borrowDate = $borrowDate;
        $this->dueDate = $dueDate;
        $this->status = $status;
        $this->fineAmount = $fineAmount;
    }

    public function getRecordId(): ?int
    {
        return $this->recordId;
    }

    public function getStudentId(): int
    {
        return $this->studentId;
    }

    public function bookId(): int
    {
        return $this->bookId;
    }

    public function getBorrowData(): DateTime
    {
        return $this->borrowDate;
    }

    public function getDueDate(): DateTime
    {
        return $this->dueDate;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getFineAmmount(): float
    {
        return $this->fineAmount;
    }
}

?>