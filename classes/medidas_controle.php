<?php
    require_once("conexao.php");
    class MedidasControle{
        private $conexao;

        public function __construct(){
            $this->conexao = new Banco();
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function inserirMedidasControle($dados){
            try{
                $this->id_ghe = $dados['id_ghe'];
                $this->trabalhador = $dados['trabalhador'];
                $this->empregador = $dados['empregador'];
                $this->ergonomico = $dados['ergonomico'];
                $this->epc = $dados['epc'];
                $this->epi = $dados['epi'];
                $this->parecer_tecnico = $dados['parecer_tecnico'];
                $this->insalubridade = $dados['insalubridade'];
                $this->periculosidade = $dados['periculosidade'];
                $this->observacao = $dados['observacao'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO medidas_controle(id_ghe,trabalhador,empregador,ergonomico,epc,epi,parecer_tecnico,insalubridade,periculosidade,observacao) VALUES(?,?,?,?,?,?,?,?,?,?);");
                $robo->bindParam(1,$this->id_ghe);
                $robo->bindParam(2,$this->trabalhador);
                $robo->bindParam(3,$this->empregador);
                $robo->bindParam(4,$this->ergonomico);
                $robo->bindParam(5,$this->epc);
                $robo->bindParam(6,$this->epi);
                $robo->bindParam(7,$this->parecer_tecnico);
                $robo->bindParam(8,$this->insalubridade);
                $robo->bindParam(9,$this->periculosidade);
                $robo->bindParam(10,$this->observacao);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirMedidasControle

        public function selecionarMedidasControle(){
            try{
                $sql = "SELECT * FROM medidas_controle";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarMedidasControle

        public function apagarMedidasControle($id){
            $sql = "DELETE FROM medidas_controle WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarMedidasControle
		
		public function selecionarMedidasControleWhere($id){
			try{
                $sql = "SELECT * FROM medidas_controle WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarMedidasControleWhere

        public function selecionarMedidasControleWhereGhe($id_ghe){
			try{
                $sql = "SELECT * FROM medidas_controle WHERE id_ghe = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id_ghe);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarMedidasControleWhereEmpresa
		
		public function atualizarMedidasControle($id,$id_ghe,$trabalhador,$empregador,$ergonomico,$epc,$epi,$parecer_tecnico,$insalubridade,$periculosidade,$observacao){
			try{
                $sql = "UPDATE medidas_controle SET id_ghe = ?, trabalhador = ?, empregador = ?, ergonomico = ?, epc = ?, epi = ?, parecer_tecnico = ?, insalubridade = ?, periculosidade = ?, observacao = ? WHERE id = '$id'";
				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$id_ghe);
                $robo->bindParam(2,$trabalhador);
                $robo->bindParam(3,$empregador);
                $robo->bindParam(4,$ergonomico);
                $robo->bindParam(5,$epc);
                $robo->bindParam(6,$epi);
                $robo->bindParam(7,$parecer_tecnico);
                $robo->bindParam(8,$insalubridade);
                $robo->bindParam(9,$periculosidade);
                $robo->bindParam(10,$observacao);
				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarMedidasControle
    }
?>