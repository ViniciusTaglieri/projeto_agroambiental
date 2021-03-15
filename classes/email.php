<?php
    require_once("conexao.php");
    class email{
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

        public function selecionarEmail()
        {
            try
            {
                $sql = "SELECT * FROM email";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarEmail
		
		public function atualizarEmail($emailEnvia,$senhaEnvia,$emailRecebe,$nomeRecebe,$smtp,$portaSmtp){
			try
            {
                $sql = "UPDATE email SET emailEnvia = ?, senhaEnvia	= ?, emailRecebe = ?, nomeRecebe = ?, smtp = ?, portaSmtp = ?  WHERE id = '1'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$emailEnvia);
                $robo->bindParam(2,$senhaEnvia);
                $robo->bindParam(3,$emailRecebe);
                $robo->bindParam(4,$nomeRecebe);
                $robo->bindParam(5,$smtp);
                $robo->bindParam(6,$portaSmtp);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarEmail
    
    }
?>