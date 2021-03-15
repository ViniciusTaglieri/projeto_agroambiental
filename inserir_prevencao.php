<?php
    require_once("classes/conexao.php");
    require_once("classes/prevencao.php");
    $objeto = new Prevencao();
    if($objeto->inserirPrevencao($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_prevencao.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_prevencao.php';</script>";
    }

?>