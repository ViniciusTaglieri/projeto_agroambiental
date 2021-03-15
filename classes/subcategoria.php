<?php
    require_once("conexao.php");
    class Subcategoria{
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

        public function inserirSubcategoria($dados){
            try{
                $this->nome = $dados['nome'];
                $this->descricao = $dados['descricao'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO servicos(nome,descricao) VALUES(?,?);");
                $robo->bindParam(1,$this->nome);
                $robo->bindParam(2,$this->descricao);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirSubcategoria

        public function selecionarSubcategoria(){
            try{
                $sql = "SELECT * FROM subcategoria";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarServico

        public function apagarSubcategoria($id){
            $sql = "DELETE FROM subcategoria WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarSubcategoria
		
		public function selecionarSubcategoriaWhere($id){
			try{
                $sql = "SELECT * FROM subcategoria WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarSubcategoriaWhere
		
		public function atualizarSubcategoria($id,$nome,$descricao){
			try{
                $sql = "UPDATE subcategoria SET nome = ?, descricao = ? WHERE id = '$id'";
				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$nome);
                $robo->bindParam(2,$descricao);
				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarSubcategoria
    
    }
?>