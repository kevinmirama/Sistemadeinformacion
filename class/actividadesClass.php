<?php


class actividadesClass {
    private $id_actividad;
    private $actividad;
    private $archivo;
    private $id_usu_creador;
    
            
     public function __construct() {

    }
     //Funciones get
     public function  getId_actividad() {
        return $this->id_actividad;
     }
     public function  getActividad() {
        return $this->actividad;
     }
     public function  getArchivo() {
        return $this->archivo;
     }
     public function getId_usu_creador() {
         return $this->id_usu_creador;
     }

         // Funciones set
    public function setId_actividad($id_actividad): void {
        $this->id_actividad = $id_actividad ;
    }
    public function setActividad($actividad): void {
        $this->actividad = $actividad ;
    }
     
    public function setArchivo($archivo): void {
        $this->archivo = $archivo ;
    }
    public function setId_usu_creador($id_usu_creador): void {
        $this->id_usu_creador = $id_usu_creador;
    }


}// fin clase
