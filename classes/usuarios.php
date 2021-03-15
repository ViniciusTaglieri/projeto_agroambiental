<?php
    require_once("conexao.php");
    class Usuario{
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
		
		public function selecionarUsuarioWhere($usuario,$senha){
			try
            {
                $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?;";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->bindParam(1,$usuario);
                $busca->bindParam(2,$senha);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarUsuarioWhere
    }
?>