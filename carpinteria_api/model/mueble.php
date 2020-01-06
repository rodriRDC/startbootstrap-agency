<?php

class Mueble {
    private $ancho;
    private $altura;
    private $profundidad;
    
    public function getAltura() {
        return $this->altura;
    }
    
    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function getAncho() {
        return $this->ancho;
    }
    
    public function setAncho($ancho) {
        $this->ancho = $ancho;
    }
    
    public function getProfundidad() {
        return $this->profundidad;
    }
    
    public function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    public function __construct($altura, $ancho, $profundidad) {
        $this->altura = $altura;
        $this->ancho = $ancho;
        $this->profundidad = $profundidad;
    }

}

?>