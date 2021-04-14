<?php
require_once("classes/conexao.php");
require_once("classes/plano_acao.php");

$objeto = new PlanoAcao();
if ($objeto->inserirPlanoAcao($_POST) == 'ok') {
    //echo "<script> alert('Dados Gravados com sucesso');</script>";
    echo "<script> location.href='exibir_plano_acao.php';</script>";
} else {
    echo "<script> alert('Erro ao gravar!!!');</script>";
    echo "<script> location.href='cad_plano_acao.php';</script>";
}
