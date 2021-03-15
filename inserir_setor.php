<?php
    require_once("classes/conexao.php");
    require_once("classes/setor.php");
    $objeto = new Setor();
    if($objeto->inserirSetor($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_setor.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_epi.php';</script>";
    }

?>