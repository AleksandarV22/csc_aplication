<?php

class DatabaseConnection {
    public $conn;
    public function __construct() {
        $this->conn = new mysqli('localhost','root','','csc');
        
        if($this->conn->connect_error){
            die('<h1>Database COnnection failed! </h1>');
        }
        
    }
     public function prepare($sql) {
        if ($this->conn) {
            return $this->conn->prepare($sql);
        } else {
        // Konekcija nije uspostavljena
            die("Konekcija sa bazom podataka nije uspostavljena.");
        }
    }

    // Dodajte ostale metode prema potrebi...

    public function closeConnection() {
        $this->conn->close();
    }
}
