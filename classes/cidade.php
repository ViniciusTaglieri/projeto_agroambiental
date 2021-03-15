<?php
    require_once("conexao.php");
    class Cidade{
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

        public function selecionarCidades()
        {
            try
            {
                $sql = "SELECT * FROM cidades WHERE estados_id='".$_POST['id']."'";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarCidades

        public function selecinaCidade($uf)
        {
            try
            {
                $sql = "SELECT * FROM cidades WHERE estados_id ='".$uf."'";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecinaCidade

        public function selecionaCidadeWhere($id_cidade)
        {
            try
            {
                $sql = "SELECT * FROM cidades WHERE id ='".$id_cidade."'";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionaCidadeWhere

    }
?>