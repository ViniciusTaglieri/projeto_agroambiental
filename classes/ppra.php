<?php
    require_once("conexao.php");
    class Ppra{
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


        public function inserirPpra($dados){
            try{
                $this->controle = $dados['controle'];
                $this->local = $dados['local'];
                $this->ghe = $dados['ghe'];
                $this->cbo = $dados['cbo'];
                $this->qt = $dados['qt'];
                $this->id_funcao = $dados['id_funcao'];

                $robo = $this->conexao->conectar()->prepare("INSERT INTO ppra(controle,local,ghe,cbo,qt,id_funcao) VALUES(?,?,?,?,?,?);");
                $robo->bindParam(1,$this->controle);
                $robo->bindParam(2,$this->local);
                $robo->bindParam(3,$this->ghe);
                $robo->bindParam(4,$this->cbo);
                $robo->bindParam(5,$this->qt);
                $robo->bindParam(6,$this->id_funcao);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirPpra

        public function selecionarPpra(){
            try{
                $sql = "SELECT * FROM ppra";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarPpra

        public function apagarPpra($id){
            $sql = "DELETE FROM ppra WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarPpra
		
		public function selecionarPpraWhere($id){
			try{
                $sql = "SELECT * FROM ppra WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarPpraWhere
		
		public function atualizarPpra($id,$controle,$local,$ghe,$cbo,$qt,$id_funcao){
			try{
                $sql = "UPDATE ppra SET controle = ?, local = ?, ghe = ?, cbo = ?, qt = ?, id_funcao = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$controle);
                $robo->bindParam(2,$local);
                $robo->bindParam(3,$ghe);
                $robo->bindParam(4,$cbo);
                $robo->bindParam(5,$qt);
                $robo->bindParam(6,$id_funcao);

				return $robo->execute();
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarPpra
    
    }
?>