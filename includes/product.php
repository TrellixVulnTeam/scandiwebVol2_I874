<?php 
    class Product {
        private $connection;
        
        public $id;
        public $sku;
        public $name;
        public $price;

        
        
        function create() {
            $sql = "INSERT INTO `products`(`id`, `sku`, `name`, `price`) VALUES ('$this->id', '$this->sku', '$this->name', '$this->price')";
            $this->connection = new Database();
            $this->connection->getConnection();


            return $this->connection->query($sql);
        }

        function readAll($from_record_num, $records_per_page) {
            $query = "SELECT
                id, name, description, price, category_id
            FROM
                " . $this->table_name . "
            ORDER BY
                name ASC
            LIMIT
                {$from_record_num}, {$records_per_page}";
  
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
        
            return $stmt;
        }
    }
?>