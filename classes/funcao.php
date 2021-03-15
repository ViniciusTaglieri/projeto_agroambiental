<?php
    require_once("conexao.php");
    class funcao{
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


        public function inserirFuncao($dados){
            try{
                $this->nome = $dados['nome'];
                $this->descricao = $dados['descricao'];
                $this->id_cbo = $dados['id_cbo'];
                $epi = $dados['epi'];
                $limite = count($epi)-1;
                for($i=0;$i<count($epi);$i++){
                    if($i==$limite){
                        $this->id_epi .= $epi[$i];
                    }else{
                        $this->id_epi .= $epi[$i].", ";
                    }
                }
                $robo = $this->conexao->conectar()->prepare("INSERT INTO funcao(nome,descricao,id_cbo,id_epi) VALUES(?,?,?,?);");
                $robo->bindParam(1,$this->nome);
                $robo->bindParam(2,$this->descricao);
                $robo->bindParam(3,$this->id_cbo);
                $robo->bindParam(4,$this->id_epi);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirFuncao

        public function selecionarFuncao(){
            try{
                $sql = "SELECT * FROM funcao";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarFuncao

        public function apagarfuncao($id){
            $sql = "DELETE FROM funcao WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarfuncao
		
		public function selecionarFuncaoWhere($id){
			try{
                $sql = "SELECT * FROM funcao WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarFuncaoWhere
		
		public function atualizarFuncao($id,$nome,$descricao,$id_cbo,$id_epi){
			try{
                $sql = "UPDATE funcao SET nome = ?, descricao = ?, id_cbo = ?, id_epi = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$nome);
                $robo->bindParam(2,$descricao);
                $robo->bindParam(3,$id_cbo);
                $robo->bindParam(4,$id_epi);

				return $robo->execute();
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarFuncao
    
    }
?>