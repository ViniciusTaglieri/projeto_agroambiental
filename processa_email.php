<?php
    require_once("classes/conexao.php");
    require_once("classes/email.php");

    $emailEnvia = $_POST['emailEnvia'];
    $senhaEnvia = $_POST['senhaEnvia'];
    $emailRecebe = $_POST['emailRecebe'];
    $nomeRecebe = $_POST['nomeRecebe'];
    $smtp = $_POST['smtp'];
    $portaSmtp = $_POST['portaSmtp'];
	
    $objeto = new email();
    $resultado = $objeto->atualizarEmail($emailEnvia,$senhaEnvia,$emailRecebe,$nomeRecebe,$smtp,$portaSmtp);

    if($resultado==true){
		  echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> window.history.go(-2);</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> window.history.go(-1);</script>";
    }
?>
