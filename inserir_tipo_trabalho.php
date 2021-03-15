<?php
    require_once("classes/conexao.php");
    require_once("classes/tipo_trabalho.php");
    $objeto = new TipoTrabalho();
    if($objeto->inserirTipoTrabalho($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_tipo_trabalho.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_tipo_trabalho.php';</script>";
    }

?>