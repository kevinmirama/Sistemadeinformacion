<?php


class institucionClass {
    private $id_institucion;
    private $nom_institucion;
    private $direccion;
    private $telefono;
    private $nom_rector;
    private $fecha;
    private $nombre_cambio;
    
    function __construct() {
    }
     //Funciones get
        public function getId_institucion() {
            return $this->id_institucion;
        }

        public function getNom_institucion() {
            return $this->nom_institucion;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        public function getNom_rector() {
            return $this->nom_rector;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getNombre_cambio() {
            return $this->nombre_cambio;
        }

         // Funciones set
         public function setId_institucion($id_institucion) {
             $this->id_institucion = $id_institucion;
         }

         public function setNom_institucion($nom_institucion) {
             $this->nom_institucion = $nom_institucion;
         }

         public function setDireccion($direccion) {
             $this->direccion = $direccion;
         }

         public function setTelefono($telefono) {
             $this->telefono = $telefono;
         }

         public function setNom_rector($nom_rector) {
             $this->nom_rector = $nom_rector;
         }

         public function setFecha($fecha) {
             $this->fecha = $fecha;
         }

         public function setNombre_cambio($nombre_cambio) {
             $this->nombre_cambio = $nombre_cambio;
         }

}//fin clase
