<?php
  require_once("classes/conexao.php");
  require_once("classes/empresa_contratada.php");
  $id = $_POST['id'];
  $cnpj = $_POST['cnpj'];
  $razao_social = $_POST['razao_social'];
  $fantasia = $_POST['fantasia'];
  $endereco = $_POST['endereco'];
  $complemento = $_POST['complemento'];
  $bairro = $_POST['bairro'];
  $municipio = $_POST['id_cidade'];
  $uf = $_POST['uf'];
  $cep = $_POST['cep'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];
	
    $objeto = new empresaContratada();
    $resultado = $objeto->atualizarEmpresaContratada($id,$razao_social,$cnpj,$fantasia,$endereco,$complemento,$bairro,$municipio,$uf,$cep,$telefone,$email);
    if($resultado==true){
		echo "<script> alert('Dados atualizado com sucesso');</script>";
    	echo "<script> location.href='exibir_empresa_contratada.php';</script>";
    }else{
      echo "<script> alert('Não foi possivel atualizar!');</script>";
      echo "<script> location.href='exibir_empresa_contratada.php';</script>";
    }
?>
