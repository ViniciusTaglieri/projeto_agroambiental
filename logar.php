<?php
session_start();
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

require_once ('classes/conexao.php');
require_once ('classes/usuarios.php');

$objeto = new Usuario();
$lista = $objeto->selecionarUsuarioWhere($usuario,$senha);
if($lista){
	foreach($lista as $registro){
		$_SESSION['usuario'] = $usuario;
		$_SESSION['senha'] = $senha;
		$_SESSION['tipo_usuario'] = $registro->func; 
		header('location:index.php');
	}
}else{ 
	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['tipo_usuario']);
	header('location:login.php');
}
?>