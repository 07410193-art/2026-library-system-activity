<?php
declare(strict_types=1);
use App\Config\DatabaseConfig;

class BorrowRepository{
    private $connection;

    public function __construct(DatabaseConfig $database){
        $this->connection = $database->getConnection();
    }
    
    public function borrowBook(int $StudentId, int $bookId, int $days): int{
        $dueDate = date('Y-m-d', strtotime('+' . $days . ' days'));
        $sql = "INSERT INTO borrow_records(studentId, bookId, borrowDate, dueDate, status) 
                VALUES(:studentId, :bookId, :borrowDate, :dueDate, :status)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            'studentId' => $StudentId,
            'bookId' => $bookId,
            'borrowDate' => date('Y-m-d'),
            'dueDate' => $dueDate,
            'status' => 'borrowed'
        ]);

        return (int) $this->connection->lastInsertId();
    }

    public function returnBook(int $recordId){
        try{
            $this->connection->beginTransaction();
            
            $sql = "SELECT * FROM borrowRecords WHERE recordId = :recordId";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([
                'recordId' => $recordId
            ]);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            $dueDate = strtotime($result['dueDate']);
            $today = strtotime(date('Y-m-d'));
            $different = (($today - $dueDate));



        }catch(\PDOException $error){
            throw new RuntimeException("Returned Book Failed: " . $error->getMessage());
        }
    }
}

?>