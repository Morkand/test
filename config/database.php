<?php 
//Configuracion de la base de datos
    class Database {
        private $host = "192.168.99.102";
        private $database_name = "testapidb";
        private $username = "test";
        private $password = "test";
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "No fue posible conectarse a la base de datos: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  