<?php
    require_once("conexao.php");
    class Agentes{
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


        public function inserirAgentes($dados){
            try{
                $this->agente = $dados['agente'];
                $this->norma = $dados['norma'];
                $this->metodologia = $dados['metodologia'];
                $this->equipamento = $dados['equipamento'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO agentes_ambientais(agente,norma,metodologia,equipamento) VALUES(?,?,?,?);");
                $robo->bindParam(1,$this->agente);
                $robo->bindParam(2,$this->norma);
                $robo->bindParam(3,$this->metodologia);
                $robo->bindParam(4,$this->equipamento);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirAgentes

        public function selecionarAgentes(){
            try{
                $sql = "SELECT * FROM agentes_ambientais";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarAgentes

        public function apagarAgentes($id){
            $sql = "DELETE FROM agentes_ambientais WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarAgentes
		
		public function selecionarAgentesWhere($id){
			try{
                $sql = "SELECT * FROM agentes_ambientais WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarAgentesWhere
		
		public function atualizarAgentes($id,$agente,$norma,$metodologia,$equipamento){
			try{
                $sql = "UPDATE agentes_ambientais SET agente = ?, norma = ?, metodologia = ?, equipamento = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$agente);
                $robo->bindParam(2,$norma);
                $robo->bindParam(3,$metodologia);
                $robo->bindParam(4,$equipamento);

				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarAgentes
    
    }
?>