<?php
require_once("conexao.php");
class Setor
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


    public function inserirSetor($dados)
    {
        try {
            $this->nome = $dados['nome'];

            $robo = $this->conexao->conectar()->prepare("INSERT INTO setor(nome) VALUES(?);");
            $robo->bindParam(1, $this->nome);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirSetor

    public function selecionarSetor()
    {
        try {
            $sql = "SELECT * FROM setor";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarSetor

    public function selecionarSetorWhere($id)
    {
        try {
            $sql = "SELECT * FROM setor WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarSetorWhere

    public function apagarSetor($id)
    {
        $sql = "DELETE FROM setor WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarSetor

    public function atualizarSetor($id, $nome)
    {
        try {
            $sql = "UPDATE setor SET nome = ? WHERE id = '$id'";
            $robo = $this->conexao->conectar()->prepare($sql);
            $robo->bindParam(1, $nome);
            return $robo->execute();
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo atualizarSetor
}
