<?php
    require_once("classes/conexao.php");
    require_once("classes/empresa.php");
    $objeto = new Empresa();
    if($objeto->inserirEmpresa($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_empresas.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_empresa.php';</script>";
    }

?>