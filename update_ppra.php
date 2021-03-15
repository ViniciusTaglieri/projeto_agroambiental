<?php
    require_once("classes/conexao.php");
    require_once("classes/ppra.php");
    $id = $_POST['id'];
    $controle = $_POST['controle'];
    $local = $_POST['local'];
    $ghe = $_POST['ghe'];
    $cbo = $_POST['cbo'];
    $qt = $_POST['qt'];
    $id_funcao = $_POST['id_funcao'];

    $objeto = new ppra();
    $resultado = $objeto->atualizarPpra($id,$controle,$local,$ghe,$cbo,$qt,$id_funcao);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_ppra.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_ppra.php';</script>";
    }
?>
