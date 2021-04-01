<?php
require_once("classes/conexao.php");
require_once("classes/medidas_controle.php");
$id = $_POST['id'];
$id_ghe = $_POST['id_ghe'];
$insalubridade = $_POST['insalubridade'];
$periculosidade = $_POST['periculosidade'];

$objeto = new MedidasControle();
$resultado = $objeto->atualizarMedidasControle($id, $id_ghe, $insalubridade, $periculosidade);
if ($resultado == true) {
  echo "<script> alert('Dados atualizado com sucesso');</script>";
  echo "<script> location.href='exibir_medidas_controle.php';</script>";
} else {
  echo "<script> alert('Não foi possivel atualizar!');</script>";
  echo "<script> location.href='exibir_medidas_controle.php';</script>";
}
