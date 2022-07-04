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
if (
    !empty($data->nombre) && !empty($data->puesto) &&
    !empty($data->email) && !empty($data->nombre)
) {
    $item->nombre = $data->nombre;
    $item->email = $data->email;
    $item->edad = $data->edad;
    $item->puesto = $data->puesto;
    $item->creado = date('Y-m-d H:i:s');

    if ($item->createEmpleado()) {
        http_response_code(201);         
        echo json_encode(array("message" => "El empleado fue creado correctamente."));
    } else {
        http_response_code(503);        
        echo json_encode(array("message" => "No se pudo crear el empleado."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "No se puede crear el empleado. Faltan datos"));
}
