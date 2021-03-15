<?php
    require_once("classes/conexao.php");
    require_once("classes/agentes_ambientais.php");
    $id = $_POST['id'];
    $agente = $_POST['agente'];
    $norma = $_POST['norma'];
    $metodologia = $_POST['metodologia'];
    $equipamento = $_POST['equipamento'];
	
    $objeto = new agentes();
    $resultado = $objeto->atualizarAgentes($id,$agente,$norma,$metodologia,$equipamento);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_agentes.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_agentes.php';</script>";
    }
?>
