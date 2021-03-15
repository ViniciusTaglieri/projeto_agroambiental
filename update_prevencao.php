<?php
    require_once("classes/conexao.php");
    require_once("classes/prevencao.php");
    $id = $_POST['id'];
    $texto = $_POST['texto'];
	
    $objeto = new prevencao();
    $resultado = $objeto->atualizarPrevencao($id,$texto);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_prevencao.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_prevencao.php';</script>";
    }
?>
