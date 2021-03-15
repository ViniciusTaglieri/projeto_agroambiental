<?php
    require_once("classes/conexao.php");
    require_once("classes/subcategoria.php");
    $objeto = new subcategoria();
    if($objeto->inserirSubcategoria($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_subcategoria.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_subcategoria.php';</script>";
    }

?>