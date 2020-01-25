<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 
// include database and object files
include_once '../config/database.php';
include_once '../../objects/tipo_mueble_pdo.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$tipoMueble = new Tipo_mueble_pdo($db);
 
// set ID property of record to read
$tipoMueble->id = isset($_GET['id']) ? $_GET['id'] : die();

$tipoMueble->readOne();

http_response_code(200);

echo json_encode($tipoMueble);

?>