<?php
namespace App\Entity;

/* * 
 * @Class BorrowRecord
 * Represents a record of a book borrowing transaction, including details about the student, book, borrow date, due date, return date, fine amount, and status.
 * @author Kit Brian D. Banzuela
 * @since 2024-05-06
 */

class BorrowRecord
{   /**
     * @var int $record_id Unique identifier for the borrow record
     * @var int $student_id ID of the student who borrowed the book
     * @var int $book_id ID of the book that was borrowed
     * @var string $borrow_date Date when the book was borrowed
     * @var string $due_date Date when the book is due to be returned
     * @var string $return_date Date when the book was actually returned (if applicable)
     * @var float $fine_amount Amount of fine incurred for late return (if applicable)
     * @var string $status Current status of the borrow record (e.g., 'borrowed', 'returned')
     */

    private int $record_id;
    private int $student_id;
    private int $book_id;
    private string $borrow_date;
    private string $due_date ;
    private string $return_date;
    private float $fine_amount = 0.0;
    private string $status = 'borrowed';

    /**
     * BorrowRecord constructor.
     * @param int $record_id Unique identifier for the borrow record
     * @param int $student_id ID of the student who borrowed the book
     * @param int $book_id ID of the book that was borrowed
     * @param string $borrow_date Date when the book was borrowed
     * @param string $due_date Date when the book is due to be returned
     * @param string $return_date Date when the book was actually returned (if applicable) 
     * @param float $fine_amount Amount of fine incurred for late return (if applicable)
     * @param string $status Current status of the borrow record (e.g., 'borrowed', 'returned')
     */
    public function __construct(int $record_id, int $student_id, int $book_id, string $borrow_date, string $due_date, string $return_date, float $fine_amount, string $status)
    {
        $this->record_id = $record_id;
        $this->student_id = $student_id;
        $this->book_id = $book_id;
        $this->borrow_date = $borrow_date;
        $this->due_date = $due_date;
        $this->return_date = $return_date;
        $this->fine_amount = $fine_amount;
        $this->status = $status;
    }
    /**
     * Get the record ID.
     *
     * @return int The unique identifier for the borrow record
     */
    public function getRecordId(): int
    {
        return $this->record_id;
    }

    public function getStudentId(): int
    {
        return $this->student_id;
    }

    public function getBookId(): int
    {
        return $this->book_id;
    }

    public function getBorrowDate(): string
    {
        return $this->borrow_date;
    }

    public function getDueDate(): string
    {
        return $this->due_date;
    }

    public function getReturnDate(): string
    {
        return $this->return_date;
    }

    public function getFineAmount(): float
    {
        return $this->fine_amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}