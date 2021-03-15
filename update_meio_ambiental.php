<?php
    require_once("classes/conexao.php");
    require_once("classes/meio_ambiental.php");
    $id = $_POST['id'];
    $empresa = $_POST['empresa'];
    $documento = $_POST['documento'];
    $emissao = $_POST['emissao'];
    $vencimento = $_POST['vencimento'];
    $lembrete = $_POST['lembrete'];
	
    $objeto = new MeioAmbiental();
    $resultado = $objeto->atualizarMeioAmbiental($id,$documento,$empresa,$emissao,$vencimento,$lembrete);
    if($resultado==true){
		  echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_meio_ambiental.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_meio_ambiental.php';</script>";
    }
?>
