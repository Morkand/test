<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../clases/empleados.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Empleado($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    if(!empty($data->id)) {
        $item->id = $data->id;
        if($item->deleteEmpleado()){    
            http_response_code(200); 
            echo json_encode(array("message" => "Empleado eliminado."));
        } else {    
            http_response_code(503);   
            echo json_encode(array("message" => "No se pudo eliminar al empleado."));
        }
    } else {
        http_response_code(400);    
        echo json_encode(array("message" => "No se pudo eliminar al empleado. Faltan datos."));
    }
?>