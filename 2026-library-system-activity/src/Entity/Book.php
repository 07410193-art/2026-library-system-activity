<?php

declare(strict_types=1);

namespace App\Entity;

/**
 * Class Book
 * 
 * Represents a book entity with basic metadata such as title, author, year, and genre.
 */
class Book
{
    private ?int $id;
    private string $title;
    private string $author;
    private int $year;
    private string $genre;

    /**
     * Book constructor.
     *
     * @param string   $title  The title of the book
     * @param string   $author The author of the book
     * @param int      $year   The publication year
     * @param string   $genre  The genre of the book
     * @param int|null $id     The unique identifier (optional, usually set by database)
     */
    public function __construct(
        string $title,
        string $author,
        int $year,
        string $genre,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->genre = $genre;
    }

    /**
     * Get the book ID.
     *
     * @return int|null The book ID or null if not set
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the book title.
     *
     * @return string The title of the book
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the book author.
     *
     * @return string The author of the book
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Get the publication year.
     *
     * @return int The year the book was published
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * Get the book genre.
     *
     * @return string The genre of the book
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * Set the book ID.
     *
     * @param int $id The unique identifier
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Set the book title.
     *
     * @param string $title The title to set
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Set the book author.
     *
     * @param string $author The author to set
     * @return void
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    /**
     * Set the publication year.
     *
     * @param int $year The year to set
     * @return void
     */
    public function setYear(int $year)
    {
        $this->year = $year;
    }

    /**
     * Set the book genre.
     *
     * @param string $genre The genre to set
     * @return void
     */
    public function setGenre(string $genre)
    {
        $this->genre = $genre;
    }
}