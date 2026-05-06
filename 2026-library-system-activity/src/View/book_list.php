<?php

declare(strict_types=1);

namespace App\View;

class BookList
{
    private  $conn;

    public function __construct( $conn)
    {
        $this->conn = $conn;
    }

    public function listBooks()
    {
        $sql = "SELECT * FROM books";
        $result = $this->conn->query($sql);

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        return $books;
    }
    public function searchBooks(string $keyword)
    {
        $sql = "SELECT * FROM books WHERE title LIKE ? OR author LIKE ?";
        $stmt = $this->conn->prepare($sql);

        $param = "%" . $keyword . "%";
        $stmt->bind_param("ss", $param, $param);

        $stmt->execute();
        $result = $stmt->get_result();

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }

        return $books;
    }
    public function getOverdueBooks()
    {
        $today = date('Y-m-d');

        $sql = "SELECT br.*, books.title, students.name 
            FROM borrow_records br 
            JOIN books ON br.book_id = books.book_id 
            JOIN students ON br.student_id = students.student_id 
            WHERE br.due_date < ? AND br.status = 'borrowed'";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $today);
        $stmt->execute();

        $result = $stmt->get_result();
        $list = [];

        while ($row = $result->fetch_assoc()) {
            $list[] = $row;
        }

        return $list;
    }
}
