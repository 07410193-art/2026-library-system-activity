<?php

namespace App\Repository;

use DateTime;
use App\Entity\BorrowRecord;
class BorrowRepository
{
    private  $conn;

    public function __construct( $conn)
    {
        $this->conn = $conn;
    }

    public function borrowBook($conn, $student_id, $book_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO borrow_records (student_id, book_id, borrow_date, status) VALUES (?, ?, NOW(), 'borrowed')");
        $stmt->bind_param("ii", $student_id, $book_id);
        return $stmt->execute();
    }

    public function returnBook($record_id)
    {
        $stmt = $this->conn->prepare("UPDATE borrow_records SET return_date = NOW(), status = 'returned' WHERE id = ?");
        $stmt->bind_param("i", $record_id);
        return $stmt->execute();
    }
    public function calculateOverdueFine(DateTime $dueDate, float $dailyRate): float
    {
        $today = new DateTime();
        $diff = $today->diff($dueDate);
        $daysOverdue = (int) $diff->format('%r%a');

        return $daysOverdue > 0 ? $daysOverdue * $dailyRate : 0.0;
    }
}
