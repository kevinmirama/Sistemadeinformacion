<?php


class programaClass {
    private $id_prog;
    private $programa;
    private $area;
    private $logo;
    
    function __construct() {

    }
     //Funciones get
     public function getId_prog() {
         return $this->id_prog;
     }

     public function getPrograma() {
         return $this->programa;
     }

     public function getArea() {
         return $this->area;
     }

     public function getLogo() {
         return $this->logo;
     }

    // Funciones set
    public function setId_prog($id_prog) {
        $this->id_prog = $id_prog;
    }

    public function setPrograma($programa) {
        $this->programa = $programa;
    }

    public function setArea($area) {
        $this->area = $area;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

      
}//fin clase
