<?php
    require_once("conexao.php");
    class Epi{
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


        public function inserirEpi($dados){
            try{
                $this->nome = $dados['nome'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO epi(nome) VALUES(?);");
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
        }//fim do metodo inserirEpi

        public function selecionarEpi(){
            try{
                $sql = "SELECT * FROM epi";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarEpi

        public function apagarEpi($id){
            $sql = "DELETE FROM epi WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarEpi
		
		public function selecionarEpiWhere($id){
			try{
                $sql = "SELECT * FROM epi WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarEpiWhere
		
		public function atualizarEpi($id,$nome){
			try{
                $sql = "UPDATE epi SET nome = ? WHERE id = '$id'";
				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$nome);
				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarEpi
    }
?>