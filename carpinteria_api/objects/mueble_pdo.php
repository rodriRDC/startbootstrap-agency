<?php
class Mueble_pdo {
 
    // database connection and table name
    private $conn;
    private $table_name = "MUEBLE_AMOBLAMIENTO";
 
    // object properties
    public $id;
    public $tipo_mueble;
    public $amoblamiento;
    public $comentarios;
    public $altura;
    public $ancho;
    public $profundidad;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // create object
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    tipo_mueble=:tipo_mueble,
                    amoblamiento=:amoblamiento,
                    comentarios=:comentarios,
                    altura=:altura,
                    ancho=:ancho,
                    profundidad=:idprofundidad";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->altura=htmlspecialchars(strip_tags($this->altura));
        $this->ancho=htmlspecialchars(strip_tags($this->ancho));
        $this->profundidad=htmlspecialchars(strip_tags($this->profundidad));
    
        // bind values
        $stmt->bindParam(":altura", $this->altura);
        $stmt->bindParam(":ancho", $this->ancho);
        $stmt->bindParam(":profundidad", $this->profundidad);
        $stmt->bindParam(":tipo_mueble", 1);
        $stmt->bindParam(":amoblamiento", 1);
        $stmt->bindParam(":comentarios", "un comentario");
    
        // execute query
        $stmt->execute();

        $mueble = new Mueble();
    
        return true;
        
    }

}

?>