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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


</head>

<body class="bg-body">
    <?php require_once('nav_padrao.php'); ?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="word/word.php" method="POST" class="needs-validation formulario" novalidate>
                            <h2 class="text-center py-4">Cadastro PPRA</h2>
                            <div class="form-group">
                                <select name="cnpj" class="form-control" required>
                                    <option value="" disabled selected>Selecione uma empresa</option>
                                    <?php
                                    require_once('classes/conexao.php');
                                    require_once('classes/empresa.php');

                                    $objeto = new Empresa();
                                    $lista = $objeto->selecionarEmpresa();
                                    foreach ($lista as $empresa) {
                                    ?>
                                        <option value="<?= $empresa->cnpj ?>"><?= $empresa->fantasia ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="empregador_nome" placeholder="Digite o nome do empregador" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="empregador_rg" placeholder="Digite o rg do empregador" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="empregador_cpf" placeholder="Digite o cpf do empregador" required>
                            </div>
                            <div class="form-group">
                                <div class="input_fields_wrapAgentes">
                                    <button class="add_field_buttonAgentes btn btn-primary btn-sm mb-2">Adicionar campo de Agentes ambientais</button>
                                    <div class="form-group input-group">
                                        <select name="agente[]" class="form-control" required>
                                            <option value="" selected disabled>Selecione um agente</option>
                                            <?php
                                            require_once('classes/agentes_ambientais.php');
                                            $agentes = new agentes();
                                            $lista = $agentes->selecionarAgentes();
                                            foreach ($lista as $agente) {
                                                echo '<option value="' . $agente->id . '">' . $agente->agente . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group input-group">
                                    <select name="indice_p" class="form-control" required>
                                        <option value="" selected disabled>Selecione o ??ndice (P)</option>
                                        <option value="1">1 - Altamente Improv??vel</option>
                                        <option value="2">2 - Improv??vel</option>
                                        <option value="3">3 - Pouco prov??vel</option>
                                        <option value="4">4 - Prov??vel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group input-group">
                                    <select name="indice_s" class="form-control" required>
                                        <option value="" selected disabled>Selecione o ??ndice (S)</option>
                                        <option value="1">1 - Revers??vel Leve</option>
                                        <option value="2">2 - Revers??vel Severo</option>
                                        <option value="3">3 - Irrevers??vel</option>
                                        <option value="4">4 - Fatal ou Incapacitante</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group input-group">
                                    <select name="prioridade" class="form-control" required>
                                        <option value="" selected disabled>Selecione a prioridade das a????es</option>
                                        <option value="1">Alto - n??o toler??vel</option>
                                        <option value="2">Moderado - cr??tica</option>
                                        <option value="3">Baixo - de aten????o</option>
                                        <option value="4">Irrelevante</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" class="btn btn-block btn-success mt-4" value="Avan??ar">
                                </div>
                                <div class="col-lg-6">
                                    <input onclick="goBack()" class="btn btn-block btn-success mt-4" value="Voltar">
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



    <script>
        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrapAgentes"); //Fields wrapper
            var add_button = $(".add_field_buttonAgentes"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group input-group"><select name="agente[]" class="form-control input-group" required><option value="" selected disabled>Selecione um agente</option><?php
                                                                                                                                                                                                            require_once('classes/agentes_ambientais.php');
                                                                                                                                                                                                            $agentes = new agentes();
                                                                                                                                                                                                            $lista = $agentes->selecionarAgentes();
                                                                                                                                                                                                            foreach ($lista as $agente) {
                                                                                                                                                                                                                echo '<option value="' . $agente->id . '">' . $agente->agente . '</option>';
                                                                                                                                                                                                            } ?> ?> </select> <a href="#" class="remove_field input-group-text">Remover</a></div>'); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>