<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../clases/empleados.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Empleado($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleEmpleado();
    if($item->nombre != null){
        //creamos un arreglo de empleados
        $emp_arr = array(
            "id" =>  $item->id,
            "nombre" => $item->nombre,
            "email" => $item->email,
            "edad" => $item->edad,
            "puesto" => $item->puesto,
            "creado" => $item->creado
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Empleado no encontrado"); // en caso de no encontrar el empleado
    }
?>