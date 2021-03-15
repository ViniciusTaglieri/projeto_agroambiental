<?php
    require_once("classes/conexao.php");
    require_once("classes/empresa_contratada.php");
    $objeto = new EmpresaContratada();
    if($objeto->inserirEmpresaContratada($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_empresa_contratada.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_empresa_contratada.php';</script>";
    }

?>