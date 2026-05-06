<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Book;


class BookRepository
{
    private  $conn;

    public function __construct( $conn)
    {
        $this->conn = $conn;
    }

    public function addBook(Book $book): int
    {
        $sql = 'INSERT INTO books (title, author, year, genre) VALUES (?, ?, ?, ?)';
        $statement = $this->conn->prepare($sql);

        $title = $book->getTitle();
        $author = $book->getAuthor();
        $year = $book->getYear();
        $genre = $book->getGenre();

        $statement->bind_param(
            'ssis',
            $title,
            $author,
            $year,
            $genre
        );
        $statement->execute();
        $statement->close();

        return $this->conn->insert_id;
    }
    
}
