<?php

class usuariospracticaClass {
    private $id_usupractica;
    private $cod_usu;
    private $id_usu;
    private $id_institucion;
    private $id_estado;
    private $id_practica;
    private $observaciones;
    
    function __construct() {

    }
    public function getId_usupractica() {
        return $this->id_usupractica;
    }

    public function getCod_usu() {
        return $this->cod_usu;
    }

    public function getId_usu() {
        return $this->id_usu;
    }

    public function getId_institucion() {
        return $this->id_institucion;
    }

    public function getId_estado() {
        return $this->id_estado;
    }

    public function getId_practica() {
        return $this->id_practica;
    }

    public function getObservaciones() {
        return $this->observaciones;
    }

    public function setId_usupractica($id_usupractica) {
        $this->id_usupractica = $id_usupractica;
    }

    public function setCod_usu($cod_usu) {
        $this->cod_usu = $cod_usu;
    }

    public function setId_usu($id_usu) {
        $this->id_usu = $id_usu;
    }

    public function setId_institucion($id_institucion) {
        $this->id_institucion = $id_institucion;
    }

    public function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }

    public function setId_practica($id_practica) {
        $this->id_practica = $id_practica;
    }

    public function setObservaciones($observaciones) {
        $this->observaciones = $observaciones;
    }
    
}

?>