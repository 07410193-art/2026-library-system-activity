<?php


namespace App\Entity;

class Book{
    private ?int $bookId;
    private string $title;
    private string $author;
    private int $year;
    private string $genre;

    public function __construct(
        string $title, 
        string $author, 
        int $year, 
        string $genre, 
        ?int $bookId = null
    ){
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->genre = $genre;
        $this->bookId = $bookId;
    }

    public function getBookId(): ?int
    {
        return $this->bookId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getYear(): int 
    {
        return $this->year;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }
}

?>