<?php
require_once("classes/conexao.php");
require_once("classes/carga_horaria.php");
$id = $_GET['id'];
$objeto = new cargaHoraria();
$resultado = $objeto->selecionarCargaHoraria($id);
foreach ($resultado as $registro) {
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agroambiental</title>
    <!--JS-->
    <script type="text/javascript" src="js/jquery.js"></script>

    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.png" />

    <!--Links do Css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


</head>

<body class="bg-body">
    <?php require_once('nav.php'); ?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="update_carga_horaria.php" method="POST" class="formulario">
                            <h2 class="text-center py-4">Alterar Carga Horária</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="horas" placeholder="Digite a carga horaria do trabalho" maxlength="2" value="<?= $registro->horas ?>" pattern="[0-9]{0,2}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 2 números</div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <!-- entrada1 -->
                                        <input type="text" class="form-control" name="entrada1" placeholder="Digite o horário de entrada" maxlength="50" value="<?= $registro->entrada1 ?>" pattern="[A-Za-z0-9\ w]{0,60}{1,50}" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Deverá conter até 50 caracteres</div>
                                    </div>
                                    <div class="col">
                                        <!-- saida1 -->
                                        <input type="text" class="form-control" name="saida1" placeholder="Digite o horário de saída" maxlength="50" value="<?= $registro->saida1 ?>" pattern="[A-Za-z0-9\ w]{0,60}{1,50}" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Deverá conter 50 caracteres</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <!-- entrada2 -->
                                        <input type="text" class="form-control" name="entrada2" placeholder="Digite o horário de entrada" maxlength="50" value="<?= $registro->entrada2 ?>" pattern="[A-Za-z0-9\ w]{0,60}{1,50}" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Deverá conter até 50 caracteres</div>
                                    </div>
                                    <div class="col">
                                        <!-- saida2 -->
                                        <input type="text" class="form-control" name="saida2" placeholder="Digite o horário de saída" maxlength="50" value="<?= $registro->saida2 ?>" pattern="[A-Za-z0-9\ w]{0,60}{1,50}" required>
                                        <div class="valid-feedback"></div>
                                        <div class="invalid-feedback">Deverá conter 50 caracteres</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="jornada" placeholder="Digite a jornada da carga horaria do trabalho" maxlength="120" value="<?= $registro->jornada ?>" pattern="[A-Za-z0-9\ w]{1,120}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 120 caracteres</div>
                            </div>
                            <div class="form-group">
                                <select name="id_tipo_trabalho" class="form-control" readonly>
                                    <option disabled selected>Selecione o tipo do trabalho</option>
                                    <?php
                                    require_once('classes/tipo_trabalho.php');
                                    $objeto = new TipoTrabalho();
                                    $lista = $objeto->selecionarTipoTrabalho();
                                    foreach ($lista as $tipo) {
                                        if ($tipo->id == $registro->id_tipo_trabalho) {
                                            echo '<option selected value="' . $tipo->id . '">' . $tipo->tipo . '</option>';
                                        } else {
                                            echo '<option value="' . $tipo->id . '">' . $tipo->tipo . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group" style="display:none">
                                <input type="text" class="form-control" name="id" value="<?= $registro->id ?>" readonly>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <input type="submit" class="btn btn-block btn-success mt-4" value="Salvar">
                                </div>
                                <div class="col-lg-4">
                                    <input type="reset" class="btn btn-block btn-success mt-4" value="Limpar">
                                </div>
                                <div class="col-lg-4">
                                    <input onclick="goBack()" class="btn btn-block btn-success mt-4" value="Cancelar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
            <div class="col-lg-1"></div>

        </div>
    </section>

    <!--Validar formulario needs-validation-->
    <script>
        // Disable form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <script>
        function goBack() {
            window.history.go(-1);
        }
    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>