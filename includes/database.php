<?php 
    class Database {
        private $host = 'localhost';
        private $db_name = 'scandiweb';
        private $user = 'root';
        private $pass = '';
        public $conn;

        function getConnection() {
            $this->open_db_connetction();
        }

        public function open_db_connetction() {
            // $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

            if($this->conn->connect_errno) {
                die("Database connection FA1L3D. " . $this->conn->connect_error);
            }
        }

        public function query($sql) {
            $result = $this->conn->query($sql);
            $this->confirm_query($result);
            
            return $result;
        }

        private function confirm_query($result) {
            if(!$result) {
                die("Query FA1L3D " . $this->conn->error);
            }
        }

        public function escape_string($string) {
            $escaped_string = $this->conn->real_escape_string($string);

            return $escaped_string;
        }
    }

    
?>