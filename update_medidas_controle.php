<?php
    require_once("classes/conexao.php");
    require_once("classes/medidas_controle.php");
    $id = $_POST['id'];
    $id_ghe = $_POST['id_ghe'];
    $trabalhador = $_POST['trabalhador'];
    $empregador = $_POST['empregador'];
    $ergonomico = $_POST['ergonomico'];
    $epc = $_POST['epc'];
    $epi = $_POST['epi'];
    $parecer_tecnico = $_POST['parecer_tecnico'];
    $insalubridade = $_POST['insalubridade'];
    $periculosidade = $_POST['periculosidade'];
    $observacao = $_POST['observacao'];
	
    $objeto = new MedidasControle();
    $resultado = $objeto->atualizarMedidasControle($id,$id_ghe,$trabalhador,$empregador,$ergonomico,$epc,$epi,$parecer_tecnico,$insalubridade,$periculosidade,$observacao);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_medidas_controle.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_medidas_controle.php';</script>";
    }
?>
