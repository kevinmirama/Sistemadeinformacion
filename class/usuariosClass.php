<?php

class usuariosClass {
    private $id_usu;
    private $cod_usu;
    private $nom_usu;
    private $ape_usu;
    private $tel_usu;
    private $email_usu;
    private $pass_usu;
    private $id_genero;
    private $id_estado;
    private $id_rol;
    private $id_prog;
            
   
    function __construct() {
    }
    //Funciones get
        public function getId_usu() {
            return $this->id_usu;
        }

        public function getCod_usu() {
            return $this->cod_usu;
        }

        public function getNom_usu() {
            return $this->nom_usu;
        }

        public function getApe_usu() {
            return $this->ape_usu;
        }

        public function getTel_usu() {
            return $this->tel_usu;
        }

        public function getEmail_usu() {
            return $this->email_usu;
        }

        public function getPass_usu() {
            return $this->pass_usu;
        }

        public function getId_genero() {
            return $this->id_genero;
        }

        public function getId_estado() {
            return $this->id_estado;
        }

        public function getId_rol() {
            return $this->id_rol;
        }
        public function getId_prog() {
            return $this->id_prog;
        }

        

        //Funciones set
        public function setId_usu($id_usu) {
            $this->id_usu = $id_usu;
        }

        public function setCod_usu($cod_usu) {
            $this->cod_usu = $cod_usu;
        }

        public function setNom_usu($nom_usu) {
            $this->nom_usu = $nom_usu;
        }

        public function setApe_usu($ape_usu) {
            $this->ape_usu = $ape_usu;
        }

        public function setTel_usu($tel_usu) {
            $this->tel_usu = $tel_usu;
        }

        public function setEmail_usu($email_usu) {
            $this->email_usu = $email_usu;
        }

        public function setPass_usu($pass_usu) {
            $this->pass_usu = $pass_usu;
        }

        public function setId_genero($id_genero) {
            $this->id_genero = $id_genero;
        }

        public function setId_estado($id_estado) {
            $this->id_estado = $id_estado;
        }

        public function setId_rol($id_rol) {
            $this->id_rol = $id_rol;
        }
        public function setId_prog($id_prog) {
            $this->id_prog = $id_prog;
        }

    
 }// fin clases
    

    
