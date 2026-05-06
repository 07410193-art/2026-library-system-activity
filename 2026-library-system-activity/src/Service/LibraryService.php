<?php

declare(strict_types=1);

namespace App\Library\Service;

use mysqli;
use DateTime;

class LibraryService
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function generateReport() {
        
        $totalBooks = $this->conn->query("SELECT COUNT(*) as c FROM books")->fetch_assoc()['c'];
        $totalBorrowed = $this->conn->query("SELECT COUNT(*) as c FROM borrow_records WHERE status='borrowed'")->fetch_assoc()['c'];
        $totalReturned = $this->conn->query("SELECT COUNT(*) as c FROM borrow_records WHERE status='returned'")->fetch_assoc()['c'];
        $totalFines = $this->conn->query("SELECT SUM(fine_amount) as s FROM borrow_records WHERE fine_amount>0")->fetch_assoc()['s'];

        return [
            'total_books' => $totalBooks,
            'total_borrowed' => $totalBorrowed,
            'total_returned' => $totalReturned,
            'total_fines' => $totalFines 
            ];    
    }
    }