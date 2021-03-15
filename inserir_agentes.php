<?php
    require_once("classes/conexao.php");
    require_once("classes/agentes_ambientais.php");
    $objeto = new Agentes();
    if($objeto->inserirAgentes($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_agentes.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_agentes.php';</script>";
    }

?>