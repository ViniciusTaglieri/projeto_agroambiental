<?php
    require_once("classes/conexao.php");
    require_once("classes/epi.php");
    $objeto = new epi();
    if($objeto->inserirEpi($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_epi.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_epi.php';</script>";
    }

?>