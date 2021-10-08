<?php


class planesclasesClass {
    private $id_planclases;
    private $descripcion;
    private $grado;
    private $archivo;
    private $id_usupractica;
    
    function __construct() {

    }
     //Funciones get
     public function getId_planclases() {
         return $this->id_planclases;
     }

     public function getDescripcion() {
         return $this->descripcion;
     }

     public function getGrado() {
         return $this->grado;
     }

     public function getArchivo() {
         return $this->archivo;
     }

     public function getId_usupractica() {
         return $this->id_usupractica;
     }

    // Funciones set
    public function setId_planclases($id_planclases) {
        $this->id_planclases = $id_planclases;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setGrado($grado) {
        $this->grado = $grado;
    }

    public function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    public function setId_usupractica($id_usupractica) {
        $this->id_usupractica = $id_usupractica;
    }
 
}//fin clase
