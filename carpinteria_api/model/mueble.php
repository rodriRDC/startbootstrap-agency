<?php

class Mueble {
    private $ancho;
    private $largo;
    private $profundidad;

    public function getAncho(){
        return $this->ancho;
    }
    
    public function setAncho($ancho){
        $this->ancho = $ancho;
    }
    
    public function getLargo(){
        return $this->largo;
    }
    
    public function getLargo(){
        $this->largo = $largo;
    }
    
    public function getProfundidad(){
        return $this->profundidad;
    }
    
    public function getProfundidad(){
        $this->profundidad = $profundidad;
    }

    public function __construct($ancho, $largo, $profundidad){
        $this->title = $ancho;
        $this->title = $largo;
        $this->title = $profundidad;
    }

}

?>