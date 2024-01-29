<?php

class Book{

    public $title ;
    public $author ;
    public $pubdate ;

    public function Details($title,$author, $pubdate){
        $this->title = $title;
        $this->author = $author;
        $this->pubdate = $pubdate;

    }
    public function showDetails() {
        echo "Title: " . $this->title . "  ";
        echo "Author: " . $this->author . "  ";
        echo "Publish Date : " .$this->pubdate . "  ";
    }
}
class Ebook extends Book{

    public $filesize;
    
    public function Details2($filesize){
        $this->filesize = $filesize;
    }
    public function eShowDetails() {
        echo "Filesize : " .$this->filesize . "  ";
    }
}


$Book = new Book();
$Book->Details("A", "B", "2000");

$Ebook = new Ebook();
$Ebook->Details("C", "D", "2001");
$Ebook->Details2("10MB");

?>