<?php 
    class Category {
        private $conn;

        public $id;
        public $name;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = "SELECT * FROM `categories` ORDER BY name";
            
            $stmt = $this->conn->query($query);
            return $stmt;
        }

        // public function readName() {
        //     $query = "SELECT name FROM `categories` WHERE id = $this->id";

        //     $stmt = $this->conn->query($query);
        //     $row = $stmt->fetch_assoc($query);

        //     $this->name = $row['name'];
        // }
    }




?>