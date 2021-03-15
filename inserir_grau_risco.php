<?php
    require_once("classes/conexao.php");
    require_once("classes/categ_risco_indicea.php");
    $objeto = new Risco();
    if($objeto->inserirGrauRisco($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_grau_risco.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_grau_risco.php';</script>";
    }

?>