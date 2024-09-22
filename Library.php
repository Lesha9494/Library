<?php

namespace LibrarySystem;

class Library
{
    private array $books = [];

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeBookByTitle(string $title): bool
    {
        foreach ($this->books as $index => $book) {
            if ($book->getTitle() === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return true;
            }
        }
        return false;
    }

    public function findBooksByAuthor(string $author): array
    {
        $result = [];
        foreach ($this->books as $book) {
            if ($book->getAuthor() === $author) {
                $result[] = $book;
            }
        }
        return $result;
    }

    public function listAllBooks(): array
    {
        $booksInfo = [];
        foreach ($this->books as $book) {
            $booksInfo[] = $book->getBookInfo();
        }
        return $booksInfo;
    }
}
