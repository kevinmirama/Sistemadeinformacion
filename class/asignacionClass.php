<?php

class asignacionClass {
    private $id_asignacion ;
    private $fecha_ini;
    private $fecha_fin;
    private $id_practica;
    private $id_actividad;
    private $id_estado;
    
   function __construct() {
    }
        public function getId_asignacion() {
            return $this->id_asignacion;
        }

        public function getFecha_ini() {
            return $this->fecha_ini;
        }

        public function getFecha_fin() {
            return $this->fecha_fin;
        }

        public function getId_practica() {
            return $this->id_practica;
        }

        public function getId_actividad() {
            return $this->id_actividad;
        }

        public function getId_estado() {
            return $this->id_estado;
        }

        //Funciones set
        public function setId_asignacion($id_asignacion) {
            $this->id_asignacion = $id_asignacion;
        }

        public function setFecha_ini($fecha_ini) {
            $this->fecha_ini = $fecha_ini;
        }

        public function setFecha_fin($fecha_fin) {
            $this->fecha_fin = $fecha_fin;
        }

        public function setId_practica($id_practica) {
            $this->id_practica = $id_practica;
        }

        public function setId_actividad($id_actividad) {
            $this->id_actividad = $id_actividad;
        }

        public function setId_estado($id_estado) {
            $this->id_estado = $id_estado;
        }


}// fin clase
