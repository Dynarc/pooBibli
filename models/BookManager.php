<?php

class BookManager {
    private static $bookList;

    public function addBook($book){
        self::$bookList[] = $book;
    }

    public function getAllBooks(){
        return self::$bookList;
    }

    public function loadingBooks(){
        $book1 = new Book(1,'Le seigneur des anneaux','https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcR_SkNnqiNqAgfbOw3-GR7QTDVzoLaIYHCLkgPx7xOz2UT7hyMnvqmFppfrUpGfLkEjhS6vzqB-BzRnFkuWxCXGlGdbO0GUoqJ4l9R9kfTm&usqp=CAE',899);;
        $book2 = new Book(2,'Harry Potter','https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQezg_TOF5UBztCTCBNBIpOY7_jHgdgFgj8xC70wBor_J1Cje0pxP_ytKSjsI9UxyygWok0QPbGtKEZLR-Dsz7v37rYR-C7SmZCVZOJSNsk&usqp=CAE',410);
        $book3 = new Book(3,'Twilight','https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQi03Ul7INw6u9u7umSTSmq9BUuX-euIOQPdYHmghpvAjIZ8Cio7F0MAeg5gGVhnCt8GqsdllGYjFZvz5-0H-_XVPxbkNi9VQWE7rJrM-4zntDdERUmCxDftA&usqp=CAE',75);
        $book4 = new Book(4,'Le livre de la jungle','https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRVn-vnq6JFM4WGpTE2Eqk1nQrhfsjPOoYCZzGnuFOIWUwiPZZImtWmGdCWGgNAvM2Jrr9xPG2LWtT43WweC_7nB6i3HTdIXXy-5zZ5NHlbbNP9EVwolWul&usqp=CAE',324);
    }
}