<?php
class Tipo_mueble{
 
    // database connection and table name
    private $conn;
    private $table_name = "TIPO_MUEBLE";
 
    // object properties
    public $id;
    public $descipcion;
    public $detalle
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
	
	// read products
	function read(){
	 
		// select all query
		$query = "SELECT
					tm.id, 
					tm.descripcion,
                    tm.detalle
				FROM
					" . $this->table_name . " tm";
	 
		// prepare query statement
		$stmt = $this->conn->prepare($query);
	 
		// execute query
		$stmt->execute();
	 
		return $stmt;
    }
    
    // create product
    function create(){
    
        // query to insert record
        //INSERT INTO TIPO_MUEBLE(descripcion,detalle) VALUES ('asd','asd')
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    descripcion=:descripcion, detalle=:detalle";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->descripcion));
        $this->price=htmlspecialchars(strip_tags($this->detalle));
    
        // bind values
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":detalle", $this->detalle);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }
}
?>