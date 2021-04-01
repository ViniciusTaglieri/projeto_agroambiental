<?php
require_once("conexao.php");
class MedidasLocal
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

    public function inserirTitulo($id_local, $titulo)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO titulo_local(id_local, titulo) VALUES(?,?);");
            $robo->bindParam(1, $id_local);
            $robo->bindParam(2, $titulo);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirLocal

    public function inserirDescricao($id_titulo, $descricao)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO descricao_local(id_titulo, descricao) VALUES(?,?);");
            $robo->bindParam(1, $id_titulo);
            $robo->bindParam(2, $descricao);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirLocal

    public function selecionarTitulo()
    {
        try {
            $sql = "SELECT * FROM titulo_local";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTitulo

    public function selecionarUltimoTitulo()
    {
        try {
            $sql = "SELECT * FROM titulo_local where id = (SELECT max(id) from titulo_local)";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTitulo

    public function selecionarTituloWhere($id)
    {
        try {
            $sql = "SELECT * FROM titulo_local WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloWhere

    public function selecionarTituloWhereLocal($id)
    {
        try {
            $sql = "SELECT * FROM titulo_local WHERE id_local = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloWhere

    public function selecionarDescricaoWhere($id)
    {
        try {
            $sql = "SELECT * FROM descricao_local WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloWhere

    public function selecionarDescricaoWhereTitulo($id)
    {
        try {
            $sql = "SELECT * FROM descricao_local WHERE id_titulo = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloWhere

    public function apagarTitulo($id)
    {
        $sql = "DELETE FROM titulo_local WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarTitulo

    public function apagarDescricao($id)
    {
        $sql = "DELETE FROM titulo_local WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarTitulo
}
