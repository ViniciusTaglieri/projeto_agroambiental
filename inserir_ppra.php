<?php
    require_once("classes/conexao.php");
    require_once("classes/ppra.php");
    $objeto = new Ppra();
    if($objeto->inserirPpra($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_ppra.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_ppra.php';</script>";
    }

?>