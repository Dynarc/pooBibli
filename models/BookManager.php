<?php

require 'models/model.class.php';

class BookManager extends Model{
    private $bookList;
    private $id = 5;

    public function addBook($book){
        $this->bookList[] = $book;
    }

    public function getAllBooks(){
        return $this->bookList;
    }

    public function loadingBooks(){
        $sql = "SELECT * FROM livre";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $books = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($books as $book){
            $add = new Book($book->idLivre,$book->nom,$book->image,$book->nbPages);
            $this->addbook($add);
        }

    }

    public function getBookById($id){
        $test = $this->bookList;
        foreach($this->bookList as $book){
            if($book->getId() == $id){
                return $book;
            }
        }
        throw new Exception("Le Bouquin n'existe pas !");
    }

    public function addBookDB(){
        new Book($this->id,$_POST['title'],$_POST['image'],$_POST['pages']);
        $this->id+=1;
    }
}