<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate tipo_mueble object
include_once '../objects/tipo_mueble.php';

$database = new Database();
$db = $database->getConnection();

$tipo_mueble = new Tipo_mueble($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if(
    !empty($data->descripcion)
){
    // set product property values
    $tipo_mueble->descripcion = $data->descripcion;
    $tipo_mueble->detalle = $data->detalle;
    
    // create the product
    if($tipo_mueble->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Se creó el tipo de mueble."));
    }
    else {
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "No se pudo crear el tipo de mueble."));
    }
}
// tell the user data is incomplete
else{
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "No se pudo crear el tipo de mueble. Los datos están incompletos."));
}

?>