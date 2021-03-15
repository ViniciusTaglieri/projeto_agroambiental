<?php
    require_once("classes/conexao.php");
    require_once("classes/servico.php");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
	
    $objeto = new servico();
    $resultado = $objeto->atualizarServico($id,$nome);
    if($resultado==true){
		  echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_servicos.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_servicos.php';</script>";
    }
?>
