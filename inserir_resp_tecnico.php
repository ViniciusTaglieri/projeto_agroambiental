<?php
    require_once("classes/conexao.php");
    require_once("classes/resp_tecnico.php");
    $objeto = new RespTecnico();
    if($objeto->inserirRespTecnico($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_resp_tecnico.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_resp_tecnico.php';</script>";
    }

?>