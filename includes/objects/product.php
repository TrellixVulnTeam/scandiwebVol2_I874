<?php 
    class Product {
        private $conn;
        
        public $id;
        public $sku;
        public $name;
        public $price;
        public $category_id;

        public function __construct($db) {
            $this->conn = $db;
        }
        
        function create() {
            $sql = "INSERT INTO `products`(`sku`, `name`, `price`, `category_id`) ";
            $sql .= "VALUES ('$this->sku', '$this->name', '$this->price', '$this->category_id')";

            return $this->conn->query($sql);
        }

    }
?>