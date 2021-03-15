<?php
    require_once("conexao.php");
    class FuncaoGhe{
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


        public function inserirFuncaoGhe($id_ghe,$id_funcao,$qt,$resp_cargo){
            try{
                $robo = $this->conexao->conectar()->prepare("INSERT INTO funcao_ghe(id_ghe,id_funcao,qt,resp_cargo) VALUES(?,?,?,?);");
                $robo->bindParam(1,$id_ghe);
                $robo->bindParam(2,$id_funcao);
                $robo->bindParam(3,$qt);
                $robo->bindParam(4,$resp_cargo);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirFuncaoGhe

        public function selecionarFuncaoGhe(){
            try{
                $sql = "SELECT * FROM funcao_ghe";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarFuncaoGhe

        public function selecionarFuncaoGheWhere($id){
			try{
                $sql = "SELECT * FROM funcao_ghe WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarFuncaoGheWhere

        public function selecionarFuncaoGheWhereGhe($id){
			try{
                $sql = "SELECT * FROM funcao_ghe WHERE id_ghe = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarFuncaoGheWhere

        public function apagarFuncaoGhe($id){
            $sql = "DELETE FROM funcao_ghe WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarFuncaoGhe
		
		public function atualizarFuncaoGhe($id,$id_ghe,$id_funcao,$qt,$resp_cargo){
			try{
                $sql = "UPDATE funcao_ghe SET id_ghe = ?, id_funcao = ?, qt = ?, resp_cargo = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$id_ghe);
                $robo->bindParam(2,$id_funcao);
                $robo->bindParam(3,$qt);
                $robo->bindParam(4,$resp_cargo);

				return $robo->execute();
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarFuncaoGhe
    
    }
?>