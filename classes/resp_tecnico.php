<?php
    require_once("conexao.php");
    class RespTecnico{
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


        public function inserirRespTecnico($dados)
        {
            try{
                $this->nome = $dados['nome'];
                $this->crea = $dados['crea'];
                $this->func = $dados['func'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO resp_tecnico(nome, crea, func) VALUES(?,?,?);");
                $robo->bindParam(1,$this->nome);
                $robo->bindParam(2,$this->crea);
                $robo->bindParam(3,$this->func);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirRespTecnico

        public function selecionarRespTecnico()
        {
            try
            {
                $sql = "SELECT * FROM resp_tecnico";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarRespTecnico

        public function apagarRespTecnico($id){
            $sql = "DELETE FROM resp_tecnico WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarRespTecnico
		
		public function selecionarRespTecnicoWhere($id){
			try
            {
                $sql = "SELECT * FROM resp_tecnico WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarRespTecnicoWhere
		
		public function atualizarRespTecnico($id,$nome,$crea,$func){
			try
            {
                $sql = "UPDATE resp_tecnico SET nome = ?, crea = ?, func = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$nome);
                $robo->bindParam(2,$crea);
                $robo->bindParam(3,$func);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarEmpresaContratada
    
    }
?>