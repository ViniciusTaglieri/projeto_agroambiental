<?php
    class Banco{
        private $servidor;
        private $usuario;
        private $senha;
        private $banco;
        private static $pdo;

        public function __construct()
        {
            $this->servidor = "localhost";
            $this->usuario = "root";
            $this->senha = "";
            $this->banco = "agro_ambiental";
        }

        public function conectar(){
            try{
                $pdo = new PDO("mysql:host=".$this->servidor.":3306;dbname=".$this->banco,$this->usuario,$this->senha);
                return $pdo;
            }catch(PDOException $ex){
                echo $ex;
            }
        }
    }


?>