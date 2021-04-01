<?php
require_once("conexao.php");
class MedidasControle
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

    public function inserirMedidasControle($dados)
    {
        try {
            $robo = $this->conexao->conectar()->prepare("INSERT INTO medidas_controle(id_ghe,insalubridade,periculosidade) VALUES(?,?,?);");
            $robo->bindParam(1, $dados['id_ghe']);
            $robo->bindParam(2, $dados['insalubridade']);
            $robo->bindParam(3, $dados['periculosidade']);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirMedidasControle

    public function selecionarMedidasControle()
    {
        try {
            $sql = "SELECT * FROM medidas_controle";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarMedidasControle

    public function apagarMedidasControle($id)
    {
        $sql = "DELETE FROM medidas_controle WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarMedidasControle

    public function selecionarMedidasControleWhere($id)
    {
        try {
            $sql = "SELECT * FROM medidas_controle WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarMedidasControleWhere

    public function selecionarMedidasControleWhereGhe($id_ghe)
    {
        try {
            $sql = "SELECT * FROM medidas_controle WHERE id_ghe = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id_ghe);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarMedidasControleWhereEmpresa

    public function atualizarMedidasControle($id, $id_ghe, $insalubridade, $periculosidade)
    {
        try {
            $sql = "UPDATE medidas_controle SET id_ghe = ?, insalubridade = ?, periculosidade = ? WHERE id = '$id'";
            $robo = $this->conexao->conectar()->prepare($sql);
            $robo->bindParam(1, $id_ghe);
            $robo->bindParam(2, $insalubridade);
            $robo->bindParam(3, $periculosidade);
            return $robo->execute();
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo atualizarMedidasControle
}
