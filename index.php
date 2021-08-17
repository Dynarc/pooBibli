<?php

if(empty($_GET['page'])){
    require_once 'views/accueil.view.php';
} else{

    switch ($_GET['page']){

        case 'accueil':
            require_once 'views/accueil.view.php';
            break;

        case 'livres':
            require_once 'controllers/BookController.controller.php';
            $bookController = new BookController;
            $bookController->displayBooks();
            break;

    }
    
}