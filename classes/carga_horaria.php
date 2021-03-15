<?php
require_once("conexao.php");
class CargaHoraria
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


    public function inserirCargaHoraria($dados)
    {
        try {
            $this->horas = $dados['horas'];
            $this->entrada1 = $dados['entrada1'];
            $this->saida1 = $dados['saida1'];
            $this->entrada2 = $dados['entrada2'];
            $this->saida2 = $dados['saida2'];
            $this->id_tipo_trabalho = $dados['id_tipo_trabalho'];
            $this->jornada = $dados['jornada'];

            $robo = $this->conexao->conectar()->prepare("INSERT INTO carga_horaria(horas,entrada1,saida1,entrada2,saida2,id_tipo_trabalho,jornada) VALUES(?,?,?,?,?,?,?);");
            $robo->bindParam(1, $this->horas);
            $robo->bindParam(2, $this->entrada1);
            $robo->bindParam(3, $this->saida1);
            $robo->bindParam(4, $this->entrada2);
            $robo->bindParam(5, $this->saida2);
            $robo->bindParam(6, $this->id_tipo_trabalho);
            $robo->bindParam(7, $this->jornada);

            if ($robo->execute()) {
                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'Error: ' . $ex->getMessage();
        }
    } //fim do metodo inserirCargaHoraria

    public function selecionarCargaHoraria()
    {
        try {
            $sql = "SELECT * FROM carga_horaria";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarCargaHoraria

    public function apagarCargaHoraria($id)
    {
        $sql = "DELETE FROM carga_horaria WHERE id = ?";
        $del = $this->conexao->conectar()->prepare($sql);
        $del->bindParam(1, $id);
        return $del->execute();
    } //fim do metodo apagarCargaHoraria

    public function selecionarCargaHorariaWhere($id)
    {
        try {
            $sql = "SELECT * FROM carga_horaria WHERE id = ?";
            $busca = $this->conexao->conectar()->prepare($sql);
            $busca->bindParam(1, $id);
            $busca->execute();
            return $busca->fetchALL(PDO::FETCH_OBJ);
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo selecionarCargaHorariaWhere

    public function atualizarCargaHoraria($id, $horas, $entrada1, $saida1, $entrada2, $saida2, $jornada)
    {
        try {
            $sql = "UPDATE carga_horaria SET horas = ?, entrada1 = ?, saida1 = ?, entrada2 = ?, saida2 = ?, jornada = ? WHERE id = '$id'";

            $robo = $this->conexao->conectar()->prepare($sql);
            $robo->bindParam(1, $horas);
            $robo->bindParam(2, $entrada1);
            $robo->bindParam(3, $saida1);
            $robo->bindParam(4, $entrada2);
            $robo->bindParam(5, $saida2);
            $robo->bindParam(6, $jornada);

            return $robo->execute();
        } catch (PDOException $erro) {
            echo "Erro" . $erro->getMessage();
        }
    } //fim do metodo atualizarCargaHoraria

}
