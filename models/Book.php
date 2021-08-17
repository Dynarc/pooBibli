<?php

include_once 'BookManager.php';

class Book {
    private $id_book;
    private $title;
    private $image;
    private $pages;

    function __construct($id_book,$title,$image,$pages){
        $this->title = $title;
        $this->image = $image;
        $this->pages = $pages;
        // self::$books[] = $this;
        (new BookManager)->addBook($this);
    }

    public function getId(){
        return $this->id_book;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getImage(){
        return $this->image;
    }

    public function getPages(){
        return $this->pages;
    }

    public function setId($id){
        $this->id_book = $id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function setPages($pages){
        $this->pages = $pages;
    }

    
}