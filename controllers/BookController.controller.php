<?php

include_once 'models/Book.php';
include_once 'controllers/global.controller.php';

class BookController {
    private $bookManager;
    private $globalController;

    function __construct(){
        $this->globalController = new GlobalController;
        $this->bookManager = new BookManager;
        $this->bookManager->loadingBooks();
    }

    public function randomBook(){
        return $this->bookManager->getAllBooks();
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
        try{
        if(!empty($_POST['title']) && strlen($_POST['title'])<255){
            if(!empty($_POST['pages']) && !preg_match('/[^0-9]/',$_POST['pages'])){
                if(!empty($_FILES) && !empty($_FILES['image']['name'])){

                    if($this->globalController->addImage()){
                        $this->bookManager->addBookDB($_POST['title'],$_POST['pages'],$_FILES['image']['name']);
                    } else throw new Exception("Erreur dans l'ajout de l'image");
                    
                    
                    header('Location:../livres');
                } else throw new Exception('Veuillez mettre une image');
            } else throw new Exception('Veuillez mettre un nombre de page valide');
        } else throw new Exception('Veuillez mettre un titre valide');
        } catch (Exception $e) {
            require_once('views/addbook.view.php');
            echo '<div class="container"><div class="alert alert-dismissible alert-danger mt-5">
            <h4 class="alert-heading">Attention !</h4>
            <p class="mb-0">'.$e->getMessage().' !</p>
          </div></div>';
        }
    }

    public function modifyBook($id){
        $book = $this->bookManager->getBookById($id);
        require_once 'views/modifyBook.view.php';
    }

    public function modifyBookModified(){
        if(!empty($_POST['title']) && strlen($_POST['title'])<255){
            if(!empty($_POST['pages']) && !preg_match('/[^0-9]/',$_POST['pages'])){

                $book = $this->bookManager->getBookById($_POST['id']);

                if(!empty($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
                    if($this->globalController->addImage()){
                        $this->bookManager->modifyBook($_POST['id'],$_POST['title'],$_POST['pages'],$_FILES['image']['name']);
                        if($book->getImage() != $_FILES['image']['name'])$this->globalController->deleteLocalImage($book->getImage());
                    }
                }
                else {
                    $this->bookManager->modifyBook($_POST['id'],$_POST['title'],$_POST['pages'],$book->getImage());
                }
            }  else throw new Exception('Veuillez mettre un nombre de page valide');
        } else throw new Exception('Veuillez mettre un titre valide');
        header('Location:'.URL.'livres');
    }

    public function deleteBook($id){
        $this->bookManager->deleteBook($id);
        $book = $this->bookManager->getBookById($id);
        $this->globalController->deleteLocalImage($book->getImage());
        header('Location:'.URL.'livres');
    }

}