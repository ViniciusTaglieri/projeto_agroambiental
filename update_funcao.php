<?php
    require_once("classes/conexao.php");
    require_once("classes/funcao.php");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $id_cbo = $_POST['id_cbo'];
    $id_epi = $_POST['id_epi'];
	
    $objeto = new funcao();
    $resultado = $objeto->atualizarFuncao($id,$nome,$descricao,$id_cbo,$id_epi);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_funcao.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_funcao.php';</script>";
    }
?>
