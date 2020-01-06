<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/tipo_mueble.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$tipo_mueble = new Tipo_mueble($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$tipo_mueble->id = $data->id;
 
// set product property values
$tipo_mueble->descripcion = $data->descripcion;
$tipo_mueble->detalle = $data->detalle;
 
// update the product
if($tipo_mueble->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "El tipo de mueble se actualizó."));
}
 
// if unable to update the product, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "No se pudo actualizar el tipo de mueble."));
}
?>