<?php
//variaveis
$local = $_POST['local'];
$titulo = $_POST['titulo'];
$descricoes = $_POST['descricao'];

//medidas locais
require_once("classes/medidas_local.php");
$obj_medidas = new MedidasLocal();

//titulo
$obj_medidas->inserirTitulo($local, $titulo);

//descrição
$lista_titulo = $obj_medidas->selecionarUltimoTitulo();
foreach ($lista_titulo as $ultimoTitulo) {
    foreach ($descricoes as $descricao) {
        $obj_medidas->inserirDescricao($ultimoTitulo->id, $descricao);
    }
}

echo "<script> location.href='exibir_medida_local.php';</script>";
