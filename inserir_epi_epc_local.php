<?php
//variaveis
$local = $_POST['local'];
$titulo = $_POST['titulo'];
$descricoes = $_POST['descricao'];
$destaques = $_POST['destaque'];
$tipo = $_POST['tipo'];

if ($tipo == 0) {
    // epi
    require_once("classes/epi_epc_local.php");
    $obj_epi = new EpiEpc();

    //titulo
    $obj_epi->inserirTituloEpi($local, $titulo);

    //descrição
    $lista_titulo_epi = $obj_epi->selecionarUltimoTituloEpi();
    foreach ($lista_titulo_epi as $ultimoTituloEpi) {
        foreach ($descricoes as $key => $descricao) {
            $obj_epi->inserirDescricaoEpi($ultimoTituloEpi->id, $descricao, $destaques[$key]);
        }
    }

    echo "<script> location.href='exibir_epi_epc_local.php';</script>";
} else {
    // epi
    require_once("classes/epi_epc_local.php");
    $obj_epc = new EpiEpc();

    //titulo
    $obj_epc->inserirTituloEpc($local, $titulo);

    //descrição
    $lista_titulo_epc = $obj_epc->selecionarUltimoTituloEpi();
    foreach ($lista_titulo_epc as $ultimoTituloEpc) {
        foreach ($descricoes as $key => $descricao) {
            $obj_epc->inserirDescricaoEpc($ultimoTituloEpc->id, $descricao, $destaques[$key]);
        }
    }

    echo "<script> location.href='exibir_epi_epc_local.php';</script>";
}
