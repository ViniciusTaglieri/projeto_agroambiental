<?php
    require_once("conexao.php");
    class Prevencao{
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


        public function inserirPrevencao($dados)
        {
            try{
                $this->texto = $dados['texto'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO prevencao(texto) VALUES(?);");
                $robo->bindParam(1,$this->texto);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirPrevencao

        public function selecionarPrevencao()
        {
            try{
                $sql = "SELECT * FROM prevencao";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarPrevencao

        public function apagarPrevencao($id){
            $sql = "DELETE FROM prevencao WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarPrevencao
		
		public function selecionarPrevencaoWhere($id){
			try{
                $sql = "SELECT * FROM prevencao WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarPrevencao
		
		public function atualizarPrevencao($id,$texto){
			try{
                $sql = "UPDATE prevencao SET texto = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$texto);

				return $robo->execute();
            }
            catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarEmpresaContratada
    
    }
?>