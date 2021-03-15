<?php
    require_once("conexao.php");
    class TipoTrabalho{
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

        public function inserirTipoTrabalho($dados)
        {
            try{
                $this->tipo = $dados['tipo'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO tipo_trabalho(tipo) VALUES(?);");
                $robo->bindParam(1,$this->tipo);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirTipoTrabalho

        public function selecionarTipoTrabalho()
        {
            try
            {
                $sql = "SELECT * FROM tipo_trabalho";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarTipoTrabalho

        public function selecionarTipoTrabalhoWhere($id){
			try
            {
                $sql = "SELECT * FROM tipo_trabalho WHERE id= ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
			
        }//fim do metodo selecionarTipoTrabalhoWhere
        
        public function apagarTipoTrabalho($id){
            $sql = "DELETE FROM tipo_trabalho WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarTipoTrabalho

         public function atualizarTipoTrabalho($id,$tipo){
			try
            {
                $sql = "UPDATE tipo_trabalho SET tipo = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$tipo);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarTipoTrabalho
    }
?>