<?php
    class Empleado{
        
        private $conn; //conexión con la base de datos
        private $db_table = "Empleado"; //representacion de la tabla Empleado 
        // Columnas de la tabla empleado
        public $id;
        public $nombre;
        public $email;
        public $edad;
        public $puesto;
        public $creado;
        //Conectar con la BD
        public function __construct($db){
            $this->conn = $db;
        }
        // Traer todos los empleados
        public function getEmpleados(){
            $sqlQuery = "SELECT id, nombre, email, edad, puesto, creado FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // Crear un empleado
        public function createEmpleado(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nombre = :nombre, 
                        email = :email, 
                        edad = :edad, 
                        puesto = :puesto, 
                        creado = :creado";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // limpiar caracteres basura
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->edad=htmlspecialchars(strip_tags($this->edad));
            $this->puesto=htmlspecialchars(strip_tags($this->puesto));
            $this->creado=htmlspecialchars(strip_tags($this->creado));
        
            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":edad", $this->edad);
            $stmt->bindParam(":puesto", $this->puesto);
            $stmt->bindParam(":creado", $this->creado);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        //Leer un solo empleado
        public function getSingleEmpleado(){
            $sqlQuery = "SELECT
                        id, 
                        nombre, 
                        email, 
                        edad, 
                        puesto, 
                        creado
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nombre = $dataRow['nombre'];
            $this->email = $dataRow['email'];
            $this->edad = $dataRow['edad'];
            $this->puesto = $dataRow['puesto'];
            $this->creado = $dataRow['creado'];
        }        
        // actualizar un empleado
        public function updateEmpleado(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        nombre = :nombre, 
                        email = :email, 
                        edad = :edad, 
                        puesto = :puesto, 
                        creado = :creado
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->edad=htmlspecialchars(strip_tags($this->edad));
            $this->puesto=htmlspecialchars(strip_tags($this->puesto));
            $this->creado=htmlspecialchars(strip_tags($this->creado));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":edad", $this->edad);
            $stmt->bindParam(":puesto", $this->puesto);
            $stmt->bindParam(":creado", $this->creado);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // Eliminar un empleado
        public function deleteEmpleado(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
