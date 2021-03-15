<?php
    require_once("classes/conexao.php");
    require_once("classes/funcao.php");
    $objeto = new funcao();
    print_r($epi = $_POST['epi']);
    if($objeto->inserirFuncao($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_funcao.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_funcao.php';</script>";
    }

?>