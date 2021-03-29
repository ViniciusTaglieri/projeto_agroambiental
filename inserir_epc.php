<?php
require_once("classes/conexao.php");
require_once("classes/epc.php");
$objeto = new epc();
if ($objeto->inserirEpc($_POST) == 'ok') {
    //echo "<script> alert('Dados Gravados com sucesso');</script>";
    echo "<script> location.href='exibir_epc.php';</script>";
} else {
    echo "<script> alert('Erro ao gravar!!!');</script>";
    echo "<script> location.href='cad_epc.php';</script>";
}
