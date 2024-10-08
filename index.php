<?php

require 'vendor/autoload.php';

use LibrarySystem\Book as BookClass;
use LibrarySystem\Library as LibraryClass;

$book1 = new BookClass("Война и мир", "Лев Толстой", 1867, "Роман");
$book2 = new BookClass("Капитанская дочка", "Александр Пушкин", 1836, "Роман");
$book3 = new BookClass("Мёртвые души", "Николай Гоголь", 1842, "Сатира");

$library = new LibraryClass();

$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

$titleToRemove = "Мёртвые души";
if ($library->removeBookByTitle($titleToRemove)) {
    echo "Книга '$titleToRemove' удалена\n";
} else {
    echo "Книга '$titleToRemove' не найдена\n";
}

$authorToFind = "Лев Толстой";
$booksByAuthor = $library->findBooksByAuthor($authorToFind);
if (empty($booksByAuthor)) {
    echo "Книг от автора '$authorToFind' не найдено\n";
} else {
    echo "Книги от автора '$authorToFind':\n";
    foreach ($booksByAuthor as $book) {
        echo $book->getBookInfo() . "\n\n";
    }
}

echo "Информация о всех книгах в библиотеке:\n";
$allBooksInfo = $library->listAllBooks();
foreach ($allBooksInfo as $info) {
    echo $info . "\n\n";
}
