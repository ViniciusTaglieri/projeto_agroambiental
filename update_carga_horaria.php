<?php
require_once("classes/conexao.php");
require_once("classes/carga_horaria.php");
$id = $_POST['id'];
$horas = $_POST['horas'];
$entrada1 = $_POST['entrada1'];
$saida1 = $_POST['saida1'];
$entrada2 = $_POST['entrada2'];
$saida2 = $_POST['saida2'];
$jornada = $_POST['jornada'];
$id_tipo_trabalho = $_POST['id_tipo_trabalho'];

$objeto = new CargaHoraria();
$resultado = $objeto->atualizarCargaHoraria($id, $horas, $entrada1, $saida1, $entrada2, $saida2, $jornada, $id_tipo_trabalho);
if ($resultado == true) {
  echo "<script> alert('Dados atualizado com sucesso');</script>";
  echo "<script> location.href='exibir_carga_horaria.php';</script>";
} else {
  echo "<script> alert('Não foi possivel atualizar!');</script>";
  echo "<script> location.href='exibir_carga_horaria.php';</script>";
}
