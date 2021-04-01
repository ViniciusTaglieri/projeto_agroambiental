<?php
require_once("conexao.php");
class EpiEpc
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

    public function inserirTituloEpi($id_local, $tituloEpi)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO titulo_epi_local(id_local, titulo) VALUES(?,?);");
            $robo->bindParam(1, $id_local);
            $robo->bindParam(2, $tituloEpi);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirTituloEpi

    public function inserirTituloEpc($id_local, $tituloEpc)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO titulo_epc_local(id_local, titulo) VALUES(?,?);");
            $robo->bindParam(1, $id_local);
            $robo->bindParam(2, $tituloEpc);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirTituloEpc

    public function inserirDescricaoEpi($id_titulo_epi, $descricao)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO descricao_epi_local(id_titulo_epi, descricao) VALUES(?,?);");
            $robo->bindParam(1, $id_titulo_epi);
            $robo->bindParam(2, $descricao);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirDescricaoEpi

    public function inserirDescricaoEpc($id_titulo_epc, $descricao)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO descricao_epc_local(id_titulo_epc, descricao) VALUES(?,?);");
            $robo->bindParam(1, $id_titulo_epc);
            $robo->bindParam(2, $descricao);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirDescricaoEpc


    public function selecionarTituloEpi()
    {
        try {
            $sql = "SELECT * FROM titulo_epi_local";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloEpi

    public function selecionarTituloEpC()
    {
        try {
            $sql = "SELECT * FROM titulo_epc_local";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloEpC

    public function selecionarUltimoTituloEpi()
    {
        try {
            $sql = "SELECT * FROM titulo_epi_local where id = (SELECT max(id) from titulo_epi_local)";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarUltimoTituloEpi

    public function selecionarTituloEpiWhere($id)
    {
        try {
            $sql = "SELECT * FROM titulo_epi_local WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloEpiWhere

    public function selecionarTituloEpcWhere($id)
    {
        try {
            $sql = "SELECT * FROM titulo_epc_local WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloEpcWhere

    public function selecionarTituloEpiWhereLocal($id)
    {
        try {
            $sql = "SELECT * FROM titulo_epi_local WHERE id_local = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloEpiWhereLocal

    public function selecionarTituloEpcWhereLocal($id)
    {
        try {
            $sql = "SELECT * FROM titulo_epc_local WHERE id_local = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarTituloEpcWhereLocal

    public function selecionarDescricaoEpiWhere($id)
    {
        try {
            $sql = "SELECT * FROM descricao_epi_local WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarDescricaoEpiWhere

    public function selecionarDescricaoEpcWhere($id)
    {
        try {
            $sql = "SELECT * FROM descricao_epc_local WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarDescricaoEpcWhere

    public function selecionarDescricaoWhereTituloEpi($id)
    {
        try {
            $sql = "SELECT * FROM descricao_epi_local WHERE id_titulo_epi = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarDescricaoWhereTituloEpi

    public function selecionarDescricaoWhereTituloEpc($id)
    {
        try {
            $sql = "SELECT * FROM descricao_epc_local WHERE id_titulo_epc = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarDescricaoWhereTituloEpc

    public function apagarTituloEpi($id)
    {
        $sql = "DELETE FROM titulo_epi_local WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarTitulo

    public function apagarTituloEpc($id)
    {
        $sql = "DELETE FROM titulo_epc_local WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarTitulo
}
