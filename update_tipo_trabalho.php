<?php
    require_once("classes/conexao.php");
    require_once("classes/tipo_trabalho.php");
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
	
    $objeto = new tipoTrabalho();
    $resultado = $objeto->atualizarTipoTrabalho($id,$tipo);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_tipo_trabalho.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_tipo_trabalho.php';</script>";
    }
?>
