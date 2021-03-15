<?php
    require_once("classes/conexao.php");
    require_once("classes/subcategoria.php");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
	
    $objeto = new subcategoria();
    $resultado = $objeto->atualizarSubcategoria($id,$nome,$descricao);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_subcategoria.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_subcategoria.php';</script>";
    }
?>
