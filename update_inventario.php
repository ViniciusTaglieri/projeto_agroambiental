<?php
    require_once("classes/conexao.php");
    require_once("classes/inventario.php");
    $id = $_POST['id'];
    $natureza = $_POST['natureza'];
    $agente = $_POST['agente'];
    $fonte_geradora = $_POST['fonte_geradora'];
    $propagacao = $_POST['propagacao'];
    $danos_saude = $_POST['danos_saude'];
    $avaliacao = $_POST['avaliacao'];
    $metodologia = $_POST['metodologia'];
    $intensidade = $_POST['intensidade'];
    $tolerancia = $_POST['tolerancia'];
    $anexo = $_POST['anexo'];
    $risco = $_POST['risco'];
    $protecao = $_POST['protecao'];
    $tempo = $_POST['tempo'];
    $grau_risco = $_POST['grau_risco'];
    $codigo = $_POST['codigo'];
    $id_ghe = $_POST['id_ghe'];
	
    $objeto = new Inventario();
    $resultado = $objeto->atualizarInventario($id,$natureza,$agente,$fonte_geradora,$propagacao,$danos_saude,$avaliacao,$metodologia,$intensidade,$tolerancia,$anexo,$risco,$protecao,$tempo,$grau_risco,$codigo,$id_ghe);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_inventario.php';</script>";
    }else{
        echo "<script> alert('Não foi possivel atualizar!');</script>";
        echo "<script> location.href='exibir_inventario.php';</script>";
    }
?>
