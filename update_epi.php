<?php
    require_once("classes/conexao.php");
    require_once("classes/epi.php");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
	
    $objeto = new epi();
    $resultado = $objeto->atualizarEpi($id,$nome);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_epi.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_epi.php';</script>";
    }
?>
