<?php
    require_once("conexao.php");
    class Inventario{
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


        public function inserirInventario($dados){
            try{
                $this->natureza = $dados['natureza'];
                $this->agente = $dados['agente'];
                $this->fonte_geradora = $dados['fonte_geradora'];
                $this->propagacao = $dados['propagacao'];
                $this->danos_saude = $dados['danos_saude'];
                $this->avaliacao = $dados['avaliacao'];
                $this->metodologia = $dados['metodologia'];
                $this->intensidade = $dados['intensidade'];
                $this->tolerancia = $dados['tolerancia'];
                $this->anexo = $dados['anexo'];				
                $this->risco = $dados['risco'];
                $this->protecao = $dados['protecao'];
                $this->tempo = $dados['tempo'];
                $this->grau_risco = $dados['grau_risco'];
                $this->codigo = $dados['codigo'];
                $this->id_ghe = $dados['id_ghe'];

                $robo = $this->conexao->conectar()->prepare("INSERT INTO inventario_riscos(natureza, agente, fonte_geradora, propagacao, danos_saude, avaliacao, metodologia, intensidade, tolerancia, anexo, risco, protecao, tempo, grau_risco, codigo, id_ghe) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
                $robo->bindParam(1,$this->natureza);
                $robo->bindParam(2,$this->agente);
                $robo->bindParam(3,$this->fonte_geradora);
                $robo->bindParam(4,$this->propagacao);
                $robo->bindParam(5,$this->danos_saude);
                $robo->bindParam(6,$this->avaliacao);
                $robo->bindParam(7,$this->metodologia);
                $robo->bindParam(8,$this->intensidade);
                $robo->bindParam(9,$this->tolerancia);
                $robo->bindParam(10,$this->anexo);
                $robo->bindParam(11,$this->risco);
                $robo->bindParam(12,$this->protecao);
                $robo->bindParam(13,$this->tempo);
                $robo->bindParam(14,$this->grau_risco);
                $robo->bindParam(15,$this->codigo);
                $robo->bindParam(16,$this->id_ghe);

                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirInventario

        public function selecionarInventario(){
            try{
                $sql = "SELECT * FROM inventario_riscos";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo selecionarServico

        public function selecionarInventarioWhere($id){
			try{
                $sql = "SELECT * FROM inventario_riscos WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarInventarioWhere

        public function apagarInventario($id){
            $sql = "DELETE FROM inventario_riscos WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarInventario

        public function selecionarInventarioWhereGhe($id){
			try{
                $sql = "SELECT * FROM inventario_riscos WHERE id_ghe = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarInventarioWhere
		
		public function atualizarInventario($id,$natureza,$agente,$fonte_geradora,$propagacao,$danos_saude,$avaliacao,$metodologia,$intensidade,$tolerancia,$anexo,$risco,$protecao,$tempo,$grau_risco,$codigo,$id_ghe){
			try{
                $sql = "UPDATE inventario_riscos SET natureza = ?, agente = ?, fonte_geradora = ?, propagacao = ?, danos_saude = ?, avaliacao = ?, metodologia = ?, intensidade = ?, tolerancia = ?, anexo = ?, risco = ?, protecao = ?, tempo = ?, grau_risco = ?, codigo = ?, id_ghe = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
                $robo->bindParam(1,$natureza);
                $robo->bindParam(2,$agente);
                $robo->bindParam(3,$fonte_geradora);
                $robo->bindParam(4,$propagacao);
                $robo->bindParam(5,$danos_saude);
                $robo->bindParam(6,$avaliacao);
                $robo->bindParam(7,$metodologia);
                $robo->bindParam(8,$intensidade);
                $robo->bindParam(9,$tolerancia);
                $robo->bindParam(10,$anexo);
                $robo->bindParam(11,$risco);
                $robo->bindParam(12,$protecao);
                $robo->bindParam(13,$tempo);
                $robo->bindParam(14,$grau_risco);
                $robo->bindParam(15,$codigo);
                $robo->bindParam(16,$id_ghe);

				return $robo->execute();
            }catch(PDOException $erro){
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarInventario
    
    }
?>