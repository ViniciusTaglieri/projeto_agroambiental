<?php
    require_once("classes/conexao.php");
    require_once("classes/meio_ambiental.php");
    $objeto = new MeioAmbiental();
    if($objeto->inserirMeioAmbiental($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_meio_ambiental.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_meio_ambiental.php';</script>";
    }

?>