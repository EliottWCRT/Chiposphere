<?php

class Chirp {
    private $id;
    private $message;
    private $author;
    private $date;

    public function __construct($id, $message, $author, $date) {
        $this->id = $id;
        $this->message = $message;
        $this->author = $author;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDate() {
        return $this->date;
    }
}
?>
