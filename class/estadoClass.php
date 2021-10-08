<?php


class estadoClass {
    private $id_estado;
    private $estado;
    
    function __construct() {
    }
    //Funciones get
    public function getId_estado() {
        return $this->id_estado;
    }

    public function getEstado() {
        return $this->estado;
    }
 
    // Funciones set
    public function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }
}// fin clase
