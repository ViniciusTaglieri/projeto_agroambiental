<?php
require_once("classes/conexao.php");
require_once("classes/empresa.php");
$cnpj = $_POST['cnpj'];
$razao_social = $_POST['razao_social'];
$fantasia = $_POST['fantasia'];
$insc_estadual = $_POST['insc_estadual'];
$insc_municip = $_POST['insc_municip'];
$endereco = $_POST['endereco'];
$distrito = $_POST['distrito'];
$secao = $_POST['secao'];
$grupo = $_POST['grupo'];
$economica = $_POST['economica'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$id_cidade = $_POST['id_cidade'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cnae = $_POST['cnae'];
$id_grau_risco = $_POST['id_grau_risco'];
$trab_admin = $_POST['trab_admin'];
$trab_operac = $_POST['trab_operac'];
$carga_horaria_admin = $_POST['carga_horaria_admin'];
$carga_horaria_operac = $_POST['carga_horaria_operac'];

$objeto = new empresa();
$resultado = $objeto->atualizarEmpresa($cnpj, $razao_social, $fantasia, $insc_estadual, $insc_municip, $endereco, $distrito, $secao, $grupo, $economica, $numero, $bairro, $id_cidade, $uf, $cep, $telefone, $email, $cnae, $id_grau_risco, $trab_admin, $trab_operac, $carga_horaria_admin, $carga_horaria_operac);
if ($resultado == true) {
  echo "<script> alert('Dados atualizado com sucesso');</script>";
  echo "<script> location.href='exibir_empresas.php';</script>";
} else {
  echo "<script> alert('Não foi possivel atualizar!');</script>";
  echo "<script> location.href='exibir_empresas.php';</script>";
}
