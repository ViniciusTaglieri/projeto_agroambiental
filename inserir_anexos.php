<?php
require_once("classes/conexao.php");
require_once("classes/anexo.php");
$objeto = new Anexo();
if ($objeto->inserirAnexo($_POST) == 'ok') {
    //echo "<script> alert('Dados Gravados com sucesso');</script>";
    echo "<script> location.href='exibir_anexo.php';</script>";
} else {
    echo "<script> alert('Erro ao gravar!!!');</script>";
    echo "<script> location.href='cad_anexo.php';</script>";
}
