<?php
    require_once("conexao.php");
    class Cnae{
        private $conexao;

        public function __construct()
        {
            $this->conexao = new Banco();
        }

        public function __set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function __get($atributo)
        {
            return $this->$atributo;
        }

        public function selecionarCnae()
        {
            try
            {
                $sql = "SELECT * FROM cnae";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarCnae

    }
?>