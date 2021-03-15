<?php
    require_once("classes/conexao.php");
    require_once("classes/resp_tecnico.php");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $crea = $_POST['crea'];
    $func = $_POST['func'];
	
    $objeto = new respTecnico();
    $resultado = $objeto->atualizarRespTecnico($id,$nome,$crea,$func);
    if($resultado==true){
		  echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_resp_tecnico.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_resp_tecnico.php';</script>";
    }
?>
