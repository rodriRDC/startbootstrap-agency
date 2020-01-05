<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/tipo_mueble.php';
 
// instantiate database and tipo_mueble object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$tipo_mueble = new Tipo_mueble($db);
 
// query tipos de muebles
$stmt = $tipo_mueble->read();
$num = $stmt->rowCount();
 
if($num>0){
 
    $tipo_mueble_arr=array();
    $tipo_mueble_arr["records"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
 
        $product_item=array(
            "id" => $id,
            "descripcion" => $descripcion
        );
 
        array_push($tipo_mueble_arr["records"], $product_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show beneficios data in json format
    echo json_encode($tipo_mueble_arr);

}
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no beneficios found
    echo json_encode(
        array("message" => "No products found.")
    );
}