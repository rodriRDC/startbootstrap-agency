<?php
class Tipo_mueble_pdo{
 
    // database connection and table name
    private $conn;
    private $table_name = "TIPO_MUEBLE";
 
    // object properties
    public $id;
    public $descripcion;
    public $detalle;
 
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
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    descripcion=:descripcion, detalle=:detalle";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->detalle=htmlspecialchars(strip_tags($this->detalle));
    
        // bind values
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":detalle", $this->detalle);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    // delete the product
    function delete(){
    
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    descripcion = :descripcion,
                    detalle = :detalle
                WHERE
                    id = :id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
        $this->detalle=htmlspecialchars(strip_tags($this->detalle));
    
        // bind new values
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':detalle', $this->detalle);
        $stmt->bindParam(':id', $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // used when filling up the update product form
    function readOne(){
 
        // query to read single record
        $query = "SELECT
                    id, descripcion, detalle
                FROM
                    " . $this->table_name . "
                WHERE
                    id = :id";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->descripcion = $row['descripcion'];
        $this->detalle = $row['detalle'];
    }
}
?>