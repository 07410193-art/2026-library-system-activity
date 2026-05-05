<?php

use App\Config\DatabaseConfig;

class BookRepository{
    private $connection;

    public function __construct(DatabaseConfig $database){
        $this->connection = $database->getConnection();
    }

    public function addBook(string $title, string $author, int $year, string $genre): int
    {
        $sql = "INSERT INTO books(title,author,year,genre) VALUES(:title, :author, :year, :genre)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'author' => $author,
            'year' => $year,
            'genre' => $genre
        ]);

        return (int) $this->connection->lastInsertId();
    }

    public function getBook(int $bookId): ?array{
        $sql = "SELECT * FROM books WHERE bookId = :bookId";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            'bookId' => $bookId
        ]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}

?>