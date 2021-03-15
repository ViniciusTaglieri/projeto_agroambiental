<?php
require_once("classes/conexao.php");
require_once("classes/carga_horaria.php");
$objeto = new CargaHoraria();
if ($objeto->inserirCargaHoraria($_POST) == 'ok') {
    //echo "<script> alert('Dados Gravados com sucesso');</script>";
    echo "<script> location.href='exibir_carga_horaria.php';</script>";
} else {
    echo "<script> alert('Erro ao gravar!!!');</script>";
    echo "<script> location.href='cad_carga_horaria.php';</script>";
}
