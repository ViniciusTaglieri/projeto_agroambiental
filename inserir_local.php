<?php
require_once("classes/conexao.php");
require_once("classes/local.php");
$objeto = new local();
if ($objeto->inserirLocal($_POST) == 'ok') {
    //echo "<script> alert('Dados Gravados com sucesso');</script>";
    echo "<script> location.href='exibir_local.php';</script>";
} else {
    echo "<script> alert('Erro ao gravar!!!');</script>";
    echo "<script> location.href='cad_epi.php';</script>";
}
