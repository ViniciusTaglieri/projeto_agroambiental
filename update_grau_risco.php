<?php
    require_once("classes/conexao.php");
    require_once("classes/categ_risco_indicea.php");
    $id = $_POST['id'];
    $condicao = $_POST['condicao'];
    $descricao = $_POST['descricao'];
    $pontos = $_POST['pontos'];
    $recomendacao = $_POST['recomendacao'];
	
    $objeto = new Risco();
    $resultado = $objeto->atualizarGrauRisco($id,$condicao,$descricao,$pontos,$recomendacao);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_grau_risco.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_grau_risco.php';</script>";
    }
?>
