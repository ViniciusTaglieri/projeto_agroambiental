<?php
    require_once("classes/conexao.php");
    require_once("classes/inventario.php");
    $objeto = new Inventario();
    if($objeto->inserirInventario($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_inventario.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_inventario.php';</script>";
    }

?>