<?php
require_once("conexao.php");
class PlanoAcao
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


    public function inserirPlanoAcao($dados)
    {
        $this->id_empresa = $dados['id_empresa'];
        $this->metas = $dados['metas'];
        $this->prioridade = $dados['prioridade'];
        $this->responsavel = $dados['responsavel'];
        $this->data_inicio = $dados['data_inicio'];
        $this->data_fim = $dados['data_fim'];
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO plano_acao(id_empresa, metas, prioridade, responsavel, data_inicio, data_fim) VALUES(?,?,?,?,?,?);");
            $robo->bindParam(1, $this->id_empresa);
            $robo->bindParam(2, $this->metas);
            $robo->bindParam(3, $this->prioridade);
            $robo->bindParam(4, $this->responsavel);
            $robo->bindParam(5, $this->data_inicio);
            $robo->bindParam(6, $this->data_fim);

            var_dump($robo);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirPlanoAcao

    public function selecionarPlanoAcao()
    {
        try {
            $sql = "SELECT * FROM plano_acao";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarPlanoAcao

    public function apagarPlanoAcao($id)
    {
        $sql = "DELETE FROM plano_acao WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarPlanoAcao

    public function selecionarPlanoAcaoWhere($id)
    {
        try {
            $sql = "SELECT * FROM plano_acao WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarPlanoAcaoWhere

    public function selecionarPlanoAcaoWhereEmpresa($id_empresa)
    {
        try {
            $sql = "SELECT * FROM plano_acao WHERE id_empresa = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id_empresa);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarPlanoAcaoWhere

    public function selecionarPlanoAcaoWhereEmpresaMinDataInicio($id_empresa)
    {
        try {
            $sql = "SELECT * FROM plano_acao WHERE id_empresa = ? AND data_inicio = (SELECT MIN(data_inicio) FROM plano_acao WHERE id_empresa = ?)";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id_empresa);
            $busca->bindParam(2, $id_empresa);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarPlanoAcaoWhere

    public function selecionarPlanoAcaoWhereEmpresaMaxDataFim($id_empresa)
    {
        try {
            $sql = "SELECT * FROM plano_acao WHERE id_empresa = ? AND data_fim = (SELECT max(data_fim) FROM plano_acao WHERE id_empresa = ?)";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id_empresa);
            $busca->bindParam(2, $id_empresa);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarPlanoAcaoWhere
}
