<?php
    require_once("conexao.php");
    class Riscos{
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


        public function inserirRiscos($dados){
            try{
                $this->categoria = $dados['categoria'];
                $this->subcategoria = $dados['subcategoria'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO riscos(categoria,id_subcategoria) VALUES(?,?);");
                $robo->bindParam(1,$this->categoria);
                $robo->bindParam(2,$this->subcategoria);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirRiscos

        public function selecionarRiscos(){
            try{
                $sql = "SELECT * FROM riscos";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarServico

        public function apagarRiscos($id){
            $sql = "DELETE FROM riscos WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarRiscos
		
		public function selecionarRiscosWhere($id){
			try{
                $sql = "SELECT * FROM riscos WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarRiscosWhere
		
		public function atualizarRiscos($id,$categoria,$subcategoria){
			try{
                $sql = "UPDATE riscos SET categoria = ?, id_subcategoria = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$categoria);
                $robo->bindParam(2,$subcategoria);

				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarRiscos
    
    }
?>