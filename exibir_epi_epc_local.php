<?php
require_once("classes/conexao.php");
require_once("classes/epi_epc_local.php");
if (isset($_GET['idEpi'])) {
    $id = $_GET['idEpi'];
    $objeto = new EpiEpc();
    $resultado = $objeto->apagarTituloEpi($id);
}
?>
<?php
require_once("classes/conexao.php");
require_once("classes/epi_epc_local.php");
if (isset($_GET['idEpc'])) {
    $id = $_GET['idEpc'];
    $objeto = new EpiEpc();
    $resultado = $objeto->apagarTituloEpc($id);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agroambiental</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.png" />

    <!--Links do Css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body class="bg-body" style="overflow-x: hidden">
    <?php require_once('nav_trab.php'); ?>
    <?php
    if ($_SESSION['tipo_usuario'] == "func") {
        $acesso = "disabled";
    } else {
        $acesso = "enabled";
    }
    ?>
    <section class="">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 table-responsive py-4">
                <!--Exibir e operações  de controle-->
                <table class="table table-hover table-bordered mt-5" style="background:white">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="align-middle text-center">Local</th>
                            <th scope="col" class="align-middle text-center">Titulo</th>
                            <th scope="col" class="align-middle text-center">Tipo</th>
                            <th scope="col" class="align-middle text-center">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("classes/conexao.php");
                        require_once("classes/epi_epc_local.php");
                        require_once("classes/local.php");
                        $obj_local = new Local();
                        $obj_epi_epc = new EpiEpc();
                        $lista_tituloEpi = $obj_epi_epc->selecionarTituloEpi();
                        foreach ($lista_tituloEpi as $tituloEpi) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    $lista_local = $obj_local->selecionarLocalWhere($tituloEpi->id_local);
                                    foreach ($lista_local as $local) {
                                        echo $local->nome;
                                    }
                                    ?>
                                </td>
                                <td><?= $tituloEpi->titulo ?></td>
                                <td>Epi</td>
                                <?php
                                if (!($acesso == "disabled")) {
                                ?>
                                    <td class="text-center"><a href='exibir_epi_epc_local.php?idEpi=<?= $tituloEpi->id ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></i></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>

                        <?php
                        $lista_tituloEpc = $obj_epi_epc->selecionarTituloEpc();
                        foreach ($lista_tituloEpc as $tituloEpc) {
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    $lista_local = $obj_local->selecionarLocalWhere($tituloEpc->id_local);
                                    foreach ($lista_local as $local) {
                                        echo $local->nome;
                                    }
                                    ?>
                                </td>
                                <td><?= $tituloEpi->titulo ?></td>
                                <td>Epc</td>
                                <?php
                                if (!($acesso == "disabled")) {
                                ?>
                                    <td class="text-center"><a href='exibir_epi_epc_local.php?idEpc=<?= $tituloEpc->id ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></i></td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </section>



    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>