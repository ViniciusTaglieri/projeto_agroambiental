<?php
require_once("conexao.php");
class Ghe
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


    public function inserirGhe($dados)
    {
        try {
            $this->id_empresa = $dados['id_empresa'];
            $this->nome = $dados['nome'];
            $this->setor = $dados['setor'];
            $this->local = $dados['local'];
            $this->carga_horaria = $dados['carga_horaria'];
            $this->desc_ambiente = $dados['desc_ambiente'];

            $robo = $this->conexao->conectar()->prepare("INSERT INTO ghe(id_empresa,nome,setor,local,carga_horaria,desc_ambiente) VALUES(?,?,?,?,?,?);");
            $robo->bindParam(1, $this->id_empresa);
            $robo->bindParam(2, $this->nome);
            $robo->bindParam(3, $this->setor);
            $robo->bindParam(4, $this->local);
            $robo->bindParam(5, $this->carga_horaria);
            $robo->bindParam(6, $this->desc_ambiente);
            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirGhe

    public function selecionarGhe()
    {
        try {
            $sql = "SELECT * FROM ghe";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarServico

    public function selecionarGheWhere($id)
    {
        try {
            $sql = "SELECT * FROM ghe WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarGheWhere

    public function selecionarGheWhereSetor($setor, $empresa)
    {
        try {
            $sql = "SELECT * FROM ghe WHERE setor = ? and id_empresa = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $setor);
            $busca->bindParam(2, $empresa);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarGheWhereSetor

    public function selecionarGheWhereLocal($local, $empresa)
    {
        try {
            $sql = "SELECT * FROM ghe WHERE local = ? and id_empresa = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $local);
            $busca->bindParam(2, $empresa);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarGheWhereLocal

    public function selecionarGheWhereEmpresa($id)
    {
        try {
            $sql = "SELECT * FROM ghe WHERE id_empresa = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarGheWhere

    public function selecionarGheWhereSetorLocal($setor, $local, $empresa)
    {
        try {
            $sql = "SELECT * FROM ghe WHERE setor = ? AND local = ? AND id_empresa = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $setor);
            $busca->bindParam(2, $local);
            $busca->bindParam(3, $empresa);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarGheWhere

    public function selecionarUltimoGhe()
    {
        try {
            $sql = "SELECT * FROM ghe where (select max(id) from ghe) = id";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarServico

    public function apagarGhe($id)
    {
        $sql = "DELETE FROM ghe WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarGhe
}
