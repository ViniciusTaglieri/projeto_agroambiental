<?php
require_once("classes/conexao.php");
require_once("classes/empresa_contratada.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $objeto = new EmpresaContratada();
    $resultado = $objeto->apagarEmpresaContratada($id);
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
    <link rel="stylesheet" href="css/overlay.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

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
            <div class="col-lg-1"></div>
            <div class="col-lg-10 table-responsive py-4">
                <!--Exibir e operações  de controle-->
                <table class="table table-hover table-bordered mt-5" style="background:white">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="vertical-align:middle">Cnpj</th>
                            <th scope="col" style="vertical-align:middle">Razão Social</th>
                            <th scope="col" style="vertical-align:middle">Fantasia</th>
                            <th scope="col" style="vertical-align:middle">Endereço</th>
                            <th scope="col" style="vertical-align:middle">Complemento</th>
                            <th scope="col" style="vertical-align:middle">CEP</th>
                            <th scope="col" style="vertical-align:middle">Bairro</th>
                            <th scope="col" style="vertical-align:middle">Estado</th>
                            <th scope="col" style="vertical-align:middle">Cidade</th>
                            <th scope="col" style="vertical-align:middle">Telefone</th>
                            <th scope="col" style="vertical-align:middle">Email</th>
                            <th scope="col" class="text-center" style="vertical-align:middle">Alterar</th>
                            <th scope="col" class="text-center" style="vertical-align:middle">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("classes/empresa.php");
                        require_once("classes/conexao.php");
                        require_once("classes/cidade.php");
                        require_once("classes/estado.php");
                        $objeto = new empresaContratada();
                        $cidade = new cidade();
                        $estado = new estado();
                        $lista = $objeto->selecionarEmpresaContratada();
                        foreach ($lista as $registro) {
                        ?>
                            <tr>
                                <td><?php echo $objeto->formataCnpj($registro->cnpj); ?></td>
                                <td><?= $registro->razao_social ?></td>
                                <td><?= $registro->fantasia ?></td>
                                <td><?= $registro->endereco ?></td>
                                <td><?= $registro->complemento ?></td>
                                <td><?= $registro->cep ?></td>
                                <td><?= $registro->bairro ?></td>
                                <td>
                                    <?php
                                    if ($registro->uf) {
                                        $resultado = $estado->selecinaEstado($registro->uf);
                                        foreach ($resultado as $nomeEstado) {
                                        }
                                        echo $nomeEstado->sigla;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($registro->municipio) {
                                        $resultado = $cidade->selecionaCidadeWhere($registro->municipio);
                                        foreach ($resultado as $nomeCidade) {
                                        }
                                        echo $nomeCidade->nome;
                                    }
                                    ?>
                                </td>
                                <td><?= $registro->telefone ?></td>
                                <td><?= $registro->email ?></td>
                                <?php
                                if (!($acesso == "disabled")) {
                                ?>
                                    <td class="text-center"><a href='editar_empresa_contratada.php?id=<?= $registro->id ?>'><i class='fas fa-edit'></i></a></td>
                                    <td class="text-center"><a href='exibir_empresa_contratada.php?id=<?= $registro->id ?>'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
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
            <div class="col-lg-1"></div>
        </div>
    </section>

    <script type="text/javascript">
        function vejamais(cnpj) {
            document.getElementById("overlay").style.display = "block";

            $.ajax({
                url: 'modal.php',
                type: 'POST',
                data: {
                    id: cnpj
                },
                beforeSend: function() {
                    $("#vermais").html("Carregando...");
                },
                success: function(data) {
                    $("#vermais").html(data);
                },
                error: function(data) {
                    $("#vermais").html("Houve um erro ao carregar");
                }
            });
        };

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>