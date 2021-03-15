<?php
    require_once("conexao.php");
    class EmpresaContratada{
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


        public function inserirEmpresaContratada($dados)
        {
            try{
                $this->razao_social = $dados['razao_social'];
                $this->cnpj = $dados['cnpj'];
                $this->fantasia = $dados['fantasia'];
                $this->endereco = $dados['endereco'];
                $this->complemento = $dados['complemento'];
                $this->bairro = $dados['bairro'];
                $this->municipio = $dados['id_cidade'];
                $this->uf = $dados['uf'];
                $this->cep = $dados['cep'];
                $this->telefone = $dados['telefone'];
                $this->email = $dados['email'];
                
                $robo = $this->conexao->conectar()->prepare("INSERT INTO empresa_contratada(razao_social, cnpj, fantasia, endereco, complemento, bairro, municipio, uf, cep, telefone, email) VALUES(?,?,?,?,?,?,?,?,?,?,?);");
                $robo->bindParam(1,$this->razao_social);
                $robo->bindParam(2,$this->cnpj);
                $robo->bindParam(3,$this->fantasia);
                $robo->bindParam(4,$this->endereco);
                $robo->bindParam(5,$this->complemento);
                $robo->bindParam(6,$this->bairro);
                $robo->bindParam(7,$this->municipio);
                $robo->bindParam(8,$this->uf);
                $robo->bindParam(9,$this->cep);
                $robo->bindParam(10,$this->telefone);
                $robo->bindParam(11,$this->email);
                
                if($robo->execute()){
                    return 'ok';
                }
                else{
                    return 'erro';
                }
            }catch(PDOException $ex){
                return 'Error: '.$ex->getMessage();
            }
        }//fim do metodo inserirEmpresaContratada

        public function selecionarEmpresaContratada()
        {
            try
            {
                $sql = "SELECT * FROM empresa_contratada";
                $busca = $this->conexao->conectar()->prepare($sql);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }

        }//fim do metodo selecionarEmpresaContratada

        public function apagarEmpresaContratada($id){
            $sql = "DELETE FROM empresa_contratada WHERE id = ?";
            $del = $this->conexao->conectar()->prepare($sql);
            $del->bindParam(1,$id);
            return $del->execute();
         }//fim do metodo apagarEmpresaContratada
		
		public function selecionarEmpresaContratadaWhere($id){
			try
            {
                $sql = "SELECT * FROM empresa_contratada WHERE id = ?";
                $busca = $this->conexao->conectar()->prepare($sql);
				$busca->bindParam(1,$id);
                $busca->execute();
                return $busca->fetchALL(PDO::FETCH_OBJ);
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }	
		}//fim do metodo selecionarEmpresaContratadaWhere
		
		public function atualizarEmpresaContratada($id,$razao_social,$cnpj,$fantasia,$endereco,$complemento,$bairro,$municipio,$uf,$cep,$telefone,$email){
			try
            {
                $sql = "UPDATE empresa_contratada SET razao_social = ?, cnpj = ?, fantasia = ?, endereco = ?, complemento = ?, bairro = ?, municipio = ?, uf = ?, cep = ?, telefone = ?, email = ? WHERE id = '$id'";

				$robo = $this->conexao->conectar()->prepare($sql);
				$robo->bindParam(1,$razao_social);
                $robo->bindParam(2,$cnpj);
                $robo->bindParam(3,$fantasia);
                $robo->bindParam(4,$endereco);
                $robo->bindParam(5,$complemento);
                $robo->bindParam(6,$bairro);
                $robo->bindParam(7,$municipio);
                $robo->bindParam(8,$uf);
                $robo->bindParam(9,$cep);
                $robo->bindParam(10,$telefone);
                $robo->bindParam(11,$email);

				return $robo->execute();
            }
            catch(PDOException $erro)
            {
                echo "Erro" . $erro->getMessage();
            }
        }//fim do metodo atualizarEmpresaContratada

        public function formataCnpj($cnpj){
            $cnpj_formatado = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);
            
            return $cnpj_formatado;
        }//formataCnpj
    
    }
?>