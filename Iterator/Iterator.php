<?php

class Book
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class BookList implements Iterator, Countable
{
    private $books = [];

    private $currentIndex = 0;

    public function current()
    {
        return $this->books[$this->currentIndex];
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function next()
    {
        $this->currentIndex++;
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }

    public function valid()
    {
        return isset($this->books[$this->currentIndex]);
    }

    public function count()
    {
        return count($this->books);
    }

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getTitle() === $bookToRemove->getTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }
}

$bookList = new BookList();
$bookList->addBook(new Book('Design Pattern'));
$bookList->addBook(new Book('Head First Design Pattern'));
$bookList->addBook(new Book('Clean Code'));
$bookList->addBook(new Book('The Pragmatic Programmer'));

$bookList->removeBook(new Book('Design Pattern'));

foreach ($bookList as $book) {
    echo $book->getTitle() . PHP_EOL;
}
