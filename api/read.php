<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../clases/empleados.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Empleado($db);
    $stmt = $items->getEmpleados();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["empleados"] = array();//array de empleados
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "nombre" => $nombre,
                "email" => $email,
                "edad" => $edad,
                "puesto" => $puesto,
                "creado" => $creado
            );
            array_push($employeeArr["empleados"], $e);
        }
        echo json_encode($employeeArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No se encontraron registros")
        );
    }
?>