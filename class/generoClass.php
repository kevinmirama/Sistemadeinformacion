<?php

class generoClass {
    private $id_genero;
    private $genero;
    
    function __construct() {
    }
    //Funciones get
    public function getId_genero() {
        return $this->id_genero;
    }

    public function getGenero() {
        return $this->genero;
    }

    // Funciones set
    public function setId_genero($id_genero) {
        $this->id_genero = $id_genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }
}// fin clases
