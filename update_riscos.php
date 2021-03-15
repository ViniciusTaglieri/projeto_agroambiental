<?php
    require_once("classes/conexao.php");
    require_once("classes/riscos.php");
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];
    $subcategoria = $_POST['subcategoria'];
	
    $objeto = new riscos();
    $resultado = $objeto->atualizarRiscos($id,$categoria,$subcategoria);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_riscos.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_riscos.php';</script>";
    }
?>
