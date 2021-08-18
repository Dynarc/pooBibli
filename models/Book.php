<?php

include_once 'BookManager.php';

class Book {
    private $id_book;
    private $title;
    private $image;
    private $pages;

    function __construct($id_book,$title,$image,$pages){
        $this->id_book = $id_book;
        $this->title = $title;
        $this->image = $image;
        $this->pages = $pages;
    }

    public function getId(){
        return htmlspecialchars($this->id_book);
    }

    public function getTitle(){
        return htmlspecialchars($this->title);
    }

    public function getImage(){
        return htmlspecialchars($this->image);
    }

    public function getPages(){
        return htmlspecialchars($this->pages);
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