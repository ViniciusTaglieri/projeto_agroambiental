<?php
    require_once("conexao.php");
    class MeioAmbiental{
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


        public function inserirMeioAmbiental($dados)
        {
            try{
                $this->documento = $dados['documento'];
                $this->empresa = $dados['empresa'];
                $this->emissao = $dados['emissao'];
                $this->vencimento = $dados['vencimento'];
                $this->lembrete = $dados['lembrete'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO meio_ambiental(documento,empresa,emissao,vencimento,lembrete) VALUES(?,?,?,?,?);");

                $robo->bindParam(1,$this->documento);
                $robo->bindParam(2,$this->empresa);
                $robo->bindParam(3,$this->emissao);
                $robo->bindParam(4,$this->vencimento);
                $robo->bindParam(5,$this->lembrete);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirMeioAmbiental

        public function selecionarMeioAmbiental()
        {
            try
            {
                $sql = "SELECT * FROM meio_ambiental";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarMeioAmbiental

        public function apagarMeioAmbiental($id){
            $sql = "DELETE FROM meio_ambiental WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarMeioAmbiental
		
		public function selecionarMeioAmbientalWhere($id){
			try
            {
                $sql = "SELECT * FROM meio_ambiental WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarMeioAmbientalWhere
		
		public function atualizarMeioAmbiental($id,$documento,$empresa,$emissao,$vencimento,$lembrete){
			try
            {
                $sql = "UPDATE meio_ambiental SET documento = ?, empresa = ?, emissao = ?, vencimento = ?, lembrete = ?  WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$documento);
                $robo->bindParam(2,$empresa);
                $robo->bindParam(3,$emissao);
                $robo->bindParam(4,$vencimento);
                $robo->bindParam(5,$lembrete);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo atualizarMeioAmbiental

        public function atualizarLembrete($id,$lembrete){
			try
            {
                $sql = "UPDATE meio_ambiental SET lembrete = ?  WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$lembrete);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo atualizarMeioAmbiental
    
    }
?>