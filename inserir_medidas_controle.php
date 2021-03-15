<?php
    require_once("classes/conexao.php");
    require_once("classes/medidas_controle.php");
    $objeto = new MedidasControle();
    if($objeto->inserirMedidasControle($_POST)== 'ok'){
        //echo "<script> alert('Dados Gravados com sucesso');</script>";
        echo "<script> location.href='exibir_medidas_controle.php';</script>";
    }
    else{
        echo "<script> alert('Erro ao gravar!!!');</script>";
        echo "<script> location.href='cad_medidas_controle.php';</script>";
    }

?>