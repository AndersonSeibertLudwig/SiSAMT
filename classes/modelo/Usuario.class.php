<?php
    class Usuario {
        private $id_usuario;
        private $usuario;
        private $senha;
        private $tipo_usuario;
        private $nome;
        private $email;
        
        public function __construct($usuario, $senha, $tipo_usuario, $nome, $email, $id_usuario = ''){
            $this->id_usuario = $id_usuario;
            $this->usuario = $usuario;
            $this->senha = $senha;
            $this->tipo_usuario = $tipo_usuario;
            $this->nome = $nome;
            $this->email = $email;
        }
    
        public function getId_usuario() {
            return $this->id_usuario;
        }

        public function getUsuario() {
            return $this->usuario;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function getTipo_usuario() {
            return $this->tipo_usuario;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setId_usuario($id_usuario) {
            $this->id_usuario = $id_usuario;
        }

        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function setTipo_usuario($tipo_usuario) {
            $this->tipo_usuario = $tipo_usuario;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

    }