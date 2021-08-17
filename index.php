<?php

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

if(empty($_GET['page'])){

    require_once 'views/accueil.view.php';

} else{

    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

    try {

        switch ($url[0]){

            case 'accueil':
                require_once 'views/accueil.view.php';
                break;

            case 'livres':

                require_once 'controllers/BookController.controller.php';
                $bookController = new BookController;

                if(empty($url[1])){
                    $bookController->displayBooks();
                } else{

                    switch ($url[1]){                
                        case 'lire':
                            if(!empty($url[2])){
                                $bookController->displayBook($url[2]);
                            } else throw new Exception("Aucun livre n'est selectionné !");
                            
                            break;

                        case 'ajouter':
                            
                            $bookController->addBook();
                            break;

                        case 'validate':
                            $bookController->addBookValidate();
                            break;

                        case 'modifier':
                            echo 'modifier';
                            break;

                        case 'supprimer' :
                            echo 'supprimer';
                            break;

                        default:
                            throw new Exception("La page n'existe pas");
                            break;
                    }

                };
            break;

            default:
                throw new Exception("La page n'existe pas");
                break;

        }

    }catch (Exception $e){
        echo $e->getMessage();
    }
    
}