<?php


class notasClass {
    private $id_nota;
    private $archivo_entrega;
    private $calificacion;
    private $fecha_entrega;
    private $fecha_calificacion;
    private $observacion;
    private $id_usupractica;
    private $id_asignacion;
    private $id_estado;

    
    function __construct() {
    }
    //Funciones get
        public function getId_nota() {
            return $this->id_nota;
        }

        public function getArchivo_entrega() {
            return $this->archivo_entrega;
        }

        public function getCalificacion() {
            return $this->calificacion;
        }

        public function getFecha_entrega() {
            return $this->fecha_entrega;
        }

        public function getFecha_calificacion() {
            return $this->fecha_calificacion;
        }

        public function getObservacion() {
            return $this->observacion;
        }

        public function getId_usupractica() {
            return $this->id_usupractica;
        }

        public function getId_asignacion() {
            return $this->id_asignacion;
        }

        public function getId_estado() {
            return $this->id_estado;
        }
        // Funciones set
        public function setId_nota($id_nota) {
            $this->id_nota = $id_nota;
        }

        public function setArchivo_entrega($archivo_entrega) {
            $this->archivo_entrega = $archivo_entrega;
        }

        public function setCalificacion($calificacion) {
            $this->calificacion = $calificacion;
        }

        public function setFecha_entrega($fecha_entrega) {
            $this->fecha_entrega = $fecha_entrega;
        }

        public function setFecha_calificacion($fecha_calificacion) {
            $this->fecha_calificacion = $fecha_calificacion;
        }

        public function setObservacion($observacion) {
            $this->observacion = $observacion;
        }

        public function setId_usupractica($id_usupractica) {
            $this->id_usupractica = $id_usupractica;
        }

        public function setId_asignacion($id_asignacion) {
            $this->id_asignacion = $id_asignacion;
        }

        public function setId_estado($id_estado) {
            $this->id_estado = $id_estado;
        }

}// fin clase
