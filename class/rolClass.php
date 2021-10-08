<?php


class rolClass {
    private $id_rol;
    private $rol;
 
    function __construct() {

    }
     //Funciones get
     public function getId_rol() {
         return $this->id_rol;
     }

     public function getRol() {
         return $this->rol;
     }
     
    // Funciones set
    public function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }


}//fin clase
