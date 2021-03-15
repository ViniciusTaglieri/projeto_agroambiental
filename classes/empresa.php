<?php
require_once("conexao.php");
class Empresa
{
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


    public function inserirEmpresa($dados)
    {
        try {
            $this->cnpj = $dados['cnpj'];
            $this->razao_social = $dados['razao_social'];
            $this->fantasia = $dados['fantasia'];
            $this->insc_estadual = $dados['insc_estadual'];
            $this->insc_municip = $dados['insc_municip'];
            $this->endereco = $dados['endereco'];
            $this->distrito = $dados['distrito'];
            $this->secao = $dados['secao'];
            $this->grupo = $dados['grupo'];
            $this->economica = $dados['economica'];
            $this->numero = $dados['numero'];
            $this->bairro = $dados['bairro'];
            $this->id_cidade = $dados['id_cidade'];
            $this->uf = $dados['uf'];
            $this->cep = $dados['cep'];
            $this->telefone = $dados['telefone'];
            $this->email = $dados['email'];
            $this->cnae = $dados['cnae'];
            $this->id_grau_risco = $dados['id_grau_risco'];
            $this->trab_admin = $dados['trab_admin'];
            $this->trab_operac = $dados['trab_operac'];
            $this->carga_horaria_admin = $dados['carga_horaria_admin'];
            $this->carga_horaria_operac = $dados['carga_horaria_operac'];

            $robo = $this->conexao->conectar()->prepare("INSERT INTO cad_empresas(cnpj,razao_social,fantasia,insc_estadual,insc_municip,endereco,numero,bairro, id_cidade, uf, cep, telefone, email, cnae, id_grau_risco, trab_admin, trab_operac, carga_horaria_admin, carga_horaria_operac) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");

            $robo->bindParam(1, $this->cnpj);
            $robo->bindParam(2, $this->razao_social);
            $robo->bindParam(3, $this->fantasia);
            $robo->bindParam(4, $this->insc_estadual);
            $robo->bindParam(5, $this->insc_municip);
            $robo->bindParam(6, $this->endereco);
            $robo->bindParam(7, $this->distrito);
            $robo->bindParam(8, $this->secao);
            $robo->bindParam(9, $this->grupo);
            $robo->bindParam(10, $this->economica);
            $robo->bindParam(11, $this->numero);
            $robo->bindParam(12, $this->bairro);
            $robo->bindParam(13, $this->id_cidade);
            $robo->bindParam(14, $this->uf);
            $robo->bindParam(15, $this->cep);
            $robo->bindParam(16, $this->telefone);
            $robo->bindParam(17, $this->email);
            $robo->bindParam(18, $this->cnae);
            $robo->bindParam(19, $this->id_grau_risco);
            $robo->bindParam(20, $this->trab_admin);
            $robo->bindParam(21, $this->trab_operac);
            $robo->bindParam(22, $this->carga_horaria_admin);
            $robo->bindParam(23, $this->carga_horaria_operac);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirEmpresa

    public function selecionarEmpresa()
    {
        try {
            $sql = "SELECT * FROM cad_empresas";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarEmpresa

    public function apagarEmpresa($cnpj)
    {
        $sql = "DELETE FROM cad_empresas WHERE cnpj = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $cnpj);
        return $del->execute();
    }
    //fim do metodo apagarEmpresa

    public function selecionarEmpresaWhere($cnpj)
    {
        try {
            $sql = "SELECT * FROM cad_empresas WHERE cnpj= ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $cnpj);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarEmpresaWhere

    public function atualizarEmpresa($cnpj, $razao_social, $fantasia, $insc_estadual, $insc_municip, $endereco, $distrito, $secao, $grupo, $economica, $numero, $bairro, $id_cidade, $uf, $cep, $telefone, $email, $cnae, $id_grau_risco, $trab_admin, $trab_operac, $carga_horaria_admin, $carga_horaria_operac)
    {
        try {
            $sql = "UPDATE cad_empresas SET cnpj = ?, razao_social = ?, fantasia = ?, insc_estadual = ?, insc_municip = ?, endereco = ?, distrito = ?, secao = ?, grupo = ?, economica = ?, numero = ?, bairro = ?, id_cidade = ?, uf = ?, cep = ?, telefone = ?, email = ?, cnae = ?, id_grau_risco = ?, trab_admin = ?, trab_operac = ?, carga_horaria_admin = ?, carga_horaria_operac = ?  WHERE cnpj = '$cnpj'";

            $robo = $this->conexao->conectar()->prepare($sql);
            $robo->bindParam(1, $cnpj);
            $robo->bindParam(2, $razao_social);
            $robo->bindParam(3, $fantasia);
            $robo->bindParam(4, $insc_estadual);
            $robo->bindParam(5, $insc_municip);
            $robo->bindParam(6, $endereco);
            $robo->bindParam(7, $distrito);
            $robo->bindParam(8, $secao);
            $robo->bindParam(9, $grupo);
            $robo->bindParam(10, $economica);
            $robo->bindParam(11, $numero);
            $robo->bindParam(12, $bairro);
            $robo->bindParam(13, $id_cidade);
            $robo->bindParam(14, $uf);
            $robo->bindParam(15, $cep);
            $robo->bindParam(16, $telefone);
            $robo->bindParam(17, $email);
            $robo->bindParam(18, $cnae);
            $robo->bindParam(19, $id_grau_risco);
            $robo->bindParam(20, $trab_admin);
            $robo->bindParam(21, $trab_operac);
            $robo->bindParam(22, $carga_horaria_admin);
            $robo->bindParam(23, $carga_horaria_operac);

            return $robo->execute();
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo atualizarEmpresa

    public function formataCnpj($cnpj)
    {
        $cnpj_formatado = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4) . '-' . substr($cnpj, 12, 2);

        return $cnpj_formatado;
    }
}
