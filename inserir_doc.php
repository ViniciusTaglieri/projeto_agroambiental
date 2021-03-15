<?php
    require_once("classes/conexao.php");
    require_once("classes/documento.php");
    $objeto = new documento();
    if($objeto->inserirDocumento($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_doc.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_doc.php';</script>";
    }

?>