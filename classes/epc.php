<?php
    require_once("conexao.php");
    class Epc{
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


        public function inserirEpc($dados){
            try{
                $this->nome = $dados['nome'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO epc(nome) VALUES(?);");
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
        }//fim do metodo inserirEpc

        public function selecionarEpc(){
            try{
                $sql = "SELECT * FROM epc";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarEpc

        public function apagarEpc($id){
            $sql = "DELETE FROM epc WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarEpc
		
		public function selecionarEpcWhere($id){
			try{
                $sql = "SELECT * FROM epc WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarEpcWhere
		
		public function atualizarEpc($id,$nome){
			try{
                $sql = "UPDATE epc SET nome = ? WHERE id = '$id'";
				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$nome);
				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarEpc
    }
