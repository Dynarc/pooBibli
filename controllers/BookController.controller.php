<?php

include_once 'models/Book.php';
include_once 'controllers/global.controller.php';

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

    public function displayBook($id){
        $book = $this->bookManager->getBookById($id);
        require_once 'views/book.view.php';
    }

    public function addBook(){
        require_once 'views/addBook.view.php';
    }

    public function addBookValidate(){
        $this->bookManager->addBookDB();
    }
}