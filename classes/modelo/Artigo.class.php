<?php
    class Artigo {
        //atributos
        private $id_artigo;
        private $evento;
        private $autor;
        private $dt_submissao;
        private $area_conhecimento;
        private $resumo;
        private $situacao;
        private $avaliador;
        private $nota_1;
        private $nota_2;
        private $nota_3;
        private $nota_4;
        
        //métodos
        
        public function __construct($id_artigo, $evento, $autor, $dt_submissao, $area_conhecimento, $resumo, $situacao, $avaliador, $nota_1, $nota_2, $nota_3, $nota_4) {
            $this->id_artigo = $id_artigo;
            $this->evento = $evento;
            $this->autor = $autor;
            $this->dt_submissao = $dt_submissao;
            $this->area_conhecimento = $area_conhecimento;
            $this->resumo = $resumo;
            $this->situacao = $situacao;
            $this->avaliador = $avaliador;
            $this->nota_1 = $nota_1;
            $this->nota_2 = $nota_2;
            $this->nota_3 = $nota_3;
            $this->nota_4 = $nota_4;
        }
        public function getId_artigo() {
            return $this->id_artigo;
        }

        public function getEvento() {
            return $this->evento;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function getDt_submissao() {
            return $this->dt_submissao;
        }

        public function getArea_conhecimento() {
            return $this->area_conhecimento;
        }

        public function getResumo() {
            return $this->resumo;
        }

        public function getSituacao() {
            return $this->situacao;
        }

        public function getAvaliador() {
            return $this->avaliador;
        }

        public function getNota_1() {
            return $this->nota_1;
        }

        public function getNota_2() {
            return $this->nota_2;
        }

        public function getNota_3() {
            return $this->nota_3;
        }

        public function getNota_4() {
            return $this->nota_4;
        }

        public function setId_artigo($id_artigo) {
            $this->id_artigo = $id_artigo;
        }

        public function setEvento($evento) {
            $this->evento = $evento;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }

        public function setDt_submissao($dt_submissao) {
            $this->dt_submissao = $dt_submissao;
        }

        public function setArea_conhecimento($area_conhecimento) {
            $this->area_conhecimento = $area_conhecimento;
        }

        public function setResumo($resumo) {
            $this->resumo = $resumo;
        }

        public function setSituacao($situacao) {
            $this->situacao = $situacao;
        }

        public function setAvaliador($avaliador) {
            $this->avaliador = $avaliador;
        }

        public function setNota_1($nota_1) {
            $this->nota_1 = $nota_1;
        }

        public function setNota_2($nota_2) {
            $this->nota_2 = $nota_2;
        }

        public function setNota_3($nota_3) {
            $this->nota_3 = $nota_3;
        }

        public function setNota_4($nota_4) {
            $this->nota_4 = $nota_4;
        }

        
    }
