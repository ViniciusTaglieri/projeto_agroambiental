<?php
    require_once("conexao.php");
    class Risco{
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

        public function inserirGrauRisco($dados)
        {
            try{
                $this->condicao = $dados['condicao'];
                $this->descricao = $dados['descricao'];
                $this->pontos = $dados['pontos'];
                $this->recomendacao = $dados['recomendacao'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO categ_risco_indicea(condicao,descricao,pontos,recomendacao) VALUES(?,?,?,?);");
                $robo->bindParam(1,$this->condicao);
                $robo->bindParam(2,$this->descricao);
                $robo->bindParam(3,$this->pontos);
                $robo->bindParam(4,$this->recomendacao);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirGrauRisco

        public function selecionarRisco()
        {
            try
            {
                $sql = "SELECT * FROM categ_risco_indicea";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarRisco

        public function selecinaRisco($id_risco)
        {
            try
            {
                $sql = "SELECT * FROM categ_risco_indicea WHERE id='".$id_risco."'";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecinaRisco

        public function apagarGrauRisco($id){
            $sql = "DELETE FROM categ_risco_indicea WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarGrauRisco

         public function atualizarGrauRisco($id,$condicao,$descricao,$pontos,$recomendacao){
			try
            {
                $sql = "UPDATE categ_risco_indicea SET condicao = ?, descricao = ?, pontos = ?, recomendacao = ? WHERE id = '$id'";
				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$condicao);
                $robo->bindParam(2,$descricao);
                $robo->bindParam(3,$pontos);
                $robo->bindParam(4,$recomendacao);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarGrauRisco

    }
?>