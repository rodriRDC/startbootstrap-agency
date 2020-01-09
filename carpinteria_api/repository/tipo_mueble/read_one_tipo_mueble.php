<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../../config/database.php';
include_once '../../objects/tipo_mueble_pdo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$tipoMueble = new TipoMueble($db);
 
// set ID property of record to read
$tipoMueble->id = isset($_GET['id']) ? $_GET['id'] : die();
 
// read the details of product to be edited
$tipoMueble->readOne();
 
if($tipoMueble->name!=null){
    // create array
    $tipoMueble_arr = array(
        "id" =>  $tipoMueble->id,
        "descripcion" => $tipoMueble->descripcion,
        "detalle" => $tipoMueble->detalle
 
    );
 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($tipoMueble_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user product does not exist
    echo json_encode(array("message" => "El tipo de mueble no existe."));
}
?>