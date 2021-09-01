<?php


include_once 'models/Book.php';
include_once 'controllers/global.controller.php';

class BookController {
    private $bookManager;

    function __construct(){
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
                if(!empty($_POST['pages']) && !preg_match('/\D/',$_POST['pages']) && $_POST['pages'] < 2147483648){
                    if(!empty($_FILES['image']['name'])){
                        
                        if(GlobalController::addImage()){
                            $this->bookManager->addBookDB($_POST['title'],$_POST['pages'],$_FILES['image']['name']);
                            $_SESSION['success'] = "L'ajout a été réussi";
                        } else throw new Exception("Erreur dans l'ajout de l'image");
                        
                        header('Location:'.URL.'livres');
                    } else throw new Exception('Veuillez mettre une image');
                } else throw new Exception('Veuillez mettre un nombre de page valide');
            } else throw new Exception('Veuillez mettre un titre valide');

        } catch (Exception $e) {

            require_once('views/addbook.view.php');
            echo '<div class="container"><div class="alert alert-dismissible alert-danger mt-5">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
        try{

            if(!empty($_POST['title']) && strlen($_POST['title'])<255){
                if(!empty($_POST['pages']) && !preg_match('/\D/',$_POST['pages']) && $_POST['pages'] < 2147483648){

                    $book = $this->bookManager->getBookById($_POST['id']);

                    if(!empty($_FILES['image']['name'])){

                        if(GlobalController::addImage()){

                            $this->bookManager->modifyBook($_POST['id'],$_POST['title'],$_POST['pages'],$_FILES['image']['name']);
                            $_SESSION['success'] = "La modification a été réussie";

                            if($book->getImage() != $_FILES['image']['name']){
                                GlobalController::deleteLocalImage($book->getImage());
                            }

                        }

                    }
                    else {

                        $this->bookManager->modifyBook($_POST['id'],$_POST['title'],$_POST['pages'],$book->getImage());
                        $_SESSION['success'] = "La modification a été réussie";
                        
                    }
                }  else throw new Exception('Veuillez mettre un nombre de page valide');
            } else throw new Exception('Veuillez mettre un titre valide');
            header('Location:'.URL.'livres');

        } catch (Exception $e){
            $this->modifyBook($_POST['id']);
            echo '<div class="container"><div class="alert alert-dismissible alert-danger mt-3">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <h4 class="alert-heading">Attention !</h4>
            <p class="mb-0">'.$e->getMessage().' !</p>
            </div></div>';
        }
    }

    public function deleteBook($id){
        $this->bookManager->deleteBook($id);
        $book = $this->bookManager->getBookById($id);
        GlobalController::deleteLocalImage($book->getImage());
        $_SESSION['success'] = "La suppression a été réussie";
        header('Location:'.URL.'livres');
    }

}