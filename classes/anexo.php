<?php
require_once("conexao.php");
class Anexo
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


    public function inserirAnexo($dados)
    {
        try {
            $this->nome = $dados['nome'];
            $this->id_ghe = $dados['id_ghe'];
            $this->id_funcao = $dados['id_funcao'];

            $robo = $this->conexao->conectar()->prepare("INSERT INTO anexo(nome, id_ghe, id_funcao) VALUES(?, ?, ?);");
            $robo->bindParam(1, $this->nome);
            $robo->bindParam(2, $this->id_ghe);
            $robo->bindParam(3, $this->id_funcao);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirAnexo

    public function selecionarAnexo()
    {
        try {
            $sql = "SELECT * FROM anexo";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarAnexo

    public function apagarAnexo($id)
    {
        $sql = "DELETE FROM anexo WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarAnexo

    public function selecionarAnexoWhere($id)
    {
        try {
            $sql = "SELECT * FROM anexo WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarAnexoWhere

    public function selecionarAnexoWhereGhe($id)
    {
        try {
            $sql = "SELECT * FROM anexo WHERE id_ghe = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarAnexoWhereGhe
}
