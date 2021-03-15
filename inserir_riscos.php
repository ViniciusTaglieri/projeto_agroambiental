<?php
    require_once("classes/conexao.php");
    require_once("classes/riscos.php");
    $objeto = new Riscos();
    if($objeto->inserirRiscos($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_riscos.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_riscos.php';</script>";
    }

?>