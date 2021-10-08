<?php

class practicaClass {
    private $id_practica;
    private $nombre_practica;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_estado;
    private $id_usu;

    
    function __construct() {
     }
      // Funciones get
      public function getId_practica() {
          return $this->id_practica;
      }

      public function getNombre_practica() {
          return $this->nombre_practica;
      }

      public function getFecha_inicio() {
          return $this->fecha_inicio;
      }

      public function getFecha_fin() {
          return $this->fecha_fin;
      }

      public function getId_estado() {
          return $this->id_estado;
      }

      public function getId_usu() {
          return $this->id_usu;
      }


      
     // Funciones set
     public function setId_practica($id_practica) {
         $this->id_practica = $id_practica;
     }

     public function setNombre_practica($nombre_practica) {
         $this->nombre_practica = $nombre_practica;
     }

     public function setFecha_inicio($fecha_inicio) {
         $this->fecha_inicio = $fecha_inicio;
     }

     public function setFecha_fin($fecha_fin) {
         $this->fecha_fin = $fecha_fin;
     }

     public function setId_estado($id_estado) {
         $this->id_estado = $id_estado;
     }

     public function setId_usu($id_usu) {
         $this->id_usu = $id_usu;
     }


     
}// fin clase
