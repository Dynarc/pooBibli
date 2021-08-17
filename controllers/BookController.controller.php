<?php

include_once 'models/Book.php';

class BookController {
    private $bookManager;

    function __construct(){
        $this->bookManager = new BookManager;
        $this->bookManager->loadingBooks();
    }

    public function displayBooks(){
        $books = $this->bookManager->getAllBooks();
        require_once 'views/books.view.php'; 
    }
}