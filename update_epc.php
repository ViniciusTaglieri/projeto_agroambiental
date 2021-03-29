<?php
require_once("classes/conexao.php");
require_once("classes/epc.php");
$id = $_POST['id'];
$nome = $_POST['nome'];

$objeto = new epc();
$resultado = $objeto->atualizarEpc($id, $nome);
if ($resultado == true) {
    echo "<script> alert('Dados atualizado com sucesso');</script>";
    echo "<script> location.href='exibir_epc.php';</script>";
} else {
    echo "<script> alert('Não foi possivel atualizar!');</script>";
    echo "<script> location.href='exibir_epc.php';</script>";
}
