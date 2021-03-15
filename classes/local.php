<?php
    require_once("conexao.php");
    class Local{
        private $conexao;

        public function __construct(){
            $this->conexao = new Banco();
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function inserirLocal($dados){
            try{
                $this->nome = $dados['nome'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO local(nome) VALUES(?);");
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
        }//fim do metodo inserirLocal

        public function selecionarLocal(){
            try{
                $sql = "SELECT * FROM local";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarLocal

        public function apagarLocal($id){
            $sql = "DELETE FROM Local WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarLocal
		
		public function selecionarLocalWhere($id){
			try{
                $sql = "SELECT * FROM local WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarLocalWhere
		
		public function atualizarLocal($id,$nome){
			try{
                $sql = "UPDATE Local SET nome = ? WHERE id = '$id'";
				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$nome);
				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarLocal
    }
?>