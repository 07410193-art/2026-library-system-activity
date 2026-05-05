<?php
declare(strict_types=1);

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
}

?>