<?php

require 'models/model.class.php';

class BookManager extends Model{
    private $bookList;

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
        foreach($this->bookList as $book){
            if($book->getId() == $id){
                return $book;
            }
        }
        throw new Exception("Le Bouquin n'existe pas !");
    }

    public function addBookDB($nom,$pages,$image){
        $sql = "INSERT INTO livre(nom,nbPages,image) VALUES (:nom,:pages,:image)";
        $req = $this->getDB()->prepare($sql);
        $req->execute([
            ':nom'=>$nom,
            ':pages'=>$pages,
            ':image'=>$image
        ]);
    }

    public function modifyBookTitle($id,$title){
        $sql = "UPDATE livre SET nom=:title WHERE idLivre = :id";
        $req = $this->getDB()->prepare($sql);
        $req->execute([
            ':id'=>$id,
            ':title'=>$title
        ]);
    }

    public function modifyBookPages($id,$pages){
        $sql = "UPDATE livre SET nbPages=:pages WHERE idLivre = :id";
        $req = $this->getDB()->prepare($sql);
        $req->execute([
            ':id'=>$id,
            ':pages'=>$pages
        ]);
    }

    public function modifyBookImage($id,$image){
        $sql = "UPDATE livre SET image=:image WHERE idLivre = :id";
        $req = $this->getDB()->prepare($sql);
        $req->execute([
            ':id'=>$id,
            ':image'=>$image
        ]);
    }

    public function modifyBook($id,$title,$pages,$image){
        $sql = "UPDATE livre SET nom=:title,nbPages=:pages,image=:image WHERE idLivre = :id";
        $req = $this->getDB()->prepare($sql);
        $req->execute([
            ':id'=>$id,
            ':title'=>$title,
            ':pages'=>$pages,
            ':image'=>$image
        ]);
    }

    public function deleteBook($id){
        $sql = "DELETE FROM livre WHERE idLivre = :id";
        $req = $this->getDB()->prepare($sql);
        $req->execute([
            ':id'=>$id,
        ]);
    }
}