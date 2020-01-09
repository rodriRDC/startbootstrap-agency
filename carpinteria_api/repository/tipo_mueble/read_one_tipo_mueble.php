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
 

 
    // set response code - 200 OK
    http_response_code(200);
 
    // make it json format
    echo json_encode($$tipoMueble->readOne());

?>