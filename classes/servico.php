<?php
    require_once("conexao.php");
    class servico{
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


        public function inserirServico($dados)
        {
            try{
                $this->nome = $dados['nome'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO servicos(nome) VALUES(?);");
                $robo->bindParam(1,$this->nome);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirServico

        public function selecionarServico()
        {
            try
            {
                $sql = "SELECT * FROM servicos";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarServico

        public function apagarServico($id){
            $sql = "DELETE FROM servicos WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarServico
		
		public function selecionarServicoWhere($id){
			try
            {
                $sql = "SELECT * FROM servicos WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarServicoWhere
		
		public function atualizarServico($id,$nome){
			try
            {
                $sql = "UPDATE servicos SET nome = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$nome);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarServico
    
    }
?>