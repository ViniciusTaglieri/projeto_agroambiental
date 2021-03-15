<?php
    require_once("conexao.php");
    class Documento{
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

        public function inserirDocumento($dados)
        {
            try{
                $this->nome = $dados['nome'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO documento(nome) VALUES(?);");
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
        }//fim do metodo inserirDocumento

        public function selecionarDocumento()
        {
            try
            {
                $sql = "SELECT * FROM documento";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarDocumento

        public function selecionarDocumentoWhere($id){
			try
            {
                $sql = "SELECT * FROM documento WHERE id= ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
			
        }//fim do metodo selecionarDocumentoWhere
        
        public function apagarDocumento($id){
            $sql = "DELETE FROM documento WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarDocumento

         public function atualizarDocumento($id,$nome){
			try
            {
                $sql = "UPDATE documento SET nome = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$nome);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarDocumento
    }
?>