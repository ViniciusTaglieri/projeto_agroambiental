<?php
require_once("classes/conexao.php");
require_once("classes/ghe.php");
$ghe = new ghe();
if ($ghe->inserirGhe($_POST) == 'ok') {
    //echo "<script> alert('Dados Gravados com sucesso');</script>";
    //echo "<script> location.href='exibir_ghe.php';</script>";
} else {
    //echo "<script> alert('Erro ao gravar!!!');</script>";
    //echo "<script> location.href='cad_ghe.php';</script>";
}

//função ghe
require_once("classes/funcao_ghe.php");
$objeto = new FuncaoGhe();

$funcao = $_POST['funcao'];
$qts = $_POST['qt'];
$resp_cargos = $_POST['resp_Cargo'];

for ($i = 0; $i < count($funcao); $i++) {
    $lista = $ghe->selecionarUltimoGhe();
    foreach ($lista as $ghes) {
    }
    echo "<br>" . $id_ghe = $ghes->id;
    echo "<br>" . $id_funcao = $funcao[$i];
    echo "<br>" . $qt = $qts[$i];
    echo "<br>" . $resp_cargo = $resp_cargos[$i];
    echo "<hr>";
    if ($objeto->inserirFuncaoGhe($id_ghe, $id_funcao, $qt, $resp_cargo) == 'ok') {
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_ghe.php';</script>";
    } else {
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_ghe.php';</script>";
    }
}
