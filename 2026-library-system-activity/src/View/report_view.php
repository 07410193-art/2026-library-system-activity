<?php
namespace App\View;

use App\Config\DatabaseConfig;
use App\Repository\BorrowRepository;
use mysqli;
class ReportView
{
    private mysqli $conn;
    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }
    
    public function generateReport()
    {
        $totalBooks = $this->conn->query("SELECT COUNT(*) as c FROM books")->fetch_assoc()['c'];
        $totalBorrowed = $this->conn->query("SELECT COUNT(*) as c FROM borrow_records WHERE status='borrowed'")->fetch_assoc()['c'];
        $totalReturned = $this->conn->query("SELECT COUNT(*) as c FROM borrow_records WHERE status='returned'")->fetch_assoc()['c'];
        $totalFines = $this->conn->query("SELECT SUM(fine_amount) as s FROM borrow_records WHERE fine_amount>0")->fetch_assoc()['s'];
        echo "<h2>Library Report</h2>";
        echo "<p>Total Books: " . $totalBooks . "</p>";
        echo "<p>Borrowed: " . $totalBorrowed . "</p>";
        echo "<p>Returned: " . $totalReturned . "</p>";
        echo "<p>Total Fines Collected: $" . $totalFines . "</p>";
    
    }
    
}




