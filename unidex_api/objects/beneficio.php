<?php
class Beneficio{
 
    // database connection and table name
    private $conn;
    private $table_name = "beneficios";
 
    // object properties
    public $id;
    public $id_tipo;
    public $imagen;
    public $titulo;
    public $descripcion;
    //public $sucursales;
    public $solicitable;
	public $valido_desde;
	public $valido_hasta;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read products
	function read(){
	 
		// select all query
		$query = "SELECT
					ben.id, 
					ben.titulo, 
					ben.descripcion
				FROM
					" . $this->table_name . " ben";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
	}
}
?>