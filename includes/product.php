<?php 
    class Product {
        private $conn;
        
        public $id;
        public $sku;
        public $name;
        public $price;
        public $category_id;

        
        
        function create() {
            $sql = "INSERT INTO `products`(`id`, `sku`, `name`, `price`, `category_id`) VALUES ('$this->id', '$this->sku', '$this->name', '$this->price', '$this->category_id')";
            $this->conn = new Database();
            $this->conn->getConnection();

            return $this->conn->query($sql);
        }

    }
?>