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
    <?php require_once('nav_trab.php'); ?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="inserir_funcao.php" method="POST" class="needs-validation formulario" novalidate>
                            <h2 class="text-center py-4">Cadastro de Função</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome" placeholder="Digite o nome da função" maxlength="140" pattern="[A-Za-z0-9\ w]{0,140}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 140 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="descricao" placeholder="Digite a descrição da função" pattern="[A-Za-z0-9\ w]" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Erro</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="id_cbo" placeholder="Digite número do cbo" maxlength="60" list="cbo" pattern="[A-Za-z0-9\ w]{0,6}" required>
                                <datalist id="cbo">
                                    <?php
                                        require_once('classes/cbo.php');
                                        $objeto = new cbo();
                                        $lista = $objeto->selecionarCbo();
                                        foreach($lista as $cbo){
                                            echo '<option value="'.$cbo->id.'">'.$cbo->nome.'</option>';
                                        }
                                    ?>
                                </datalist>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 6 caracteres</div>
                            </div>
                            <div class="form-group">
                                <div class="input_fields_wrap">
                                    <button class="add_field_button btn btn-primary btn-sm mb-2">Adicionar campo de EPI</button>
                                    <div class="form-group input-group">
                                        <select name="epi[]" class="form-control" required>
                                            <option value="" selected disabled>Selecione um EPI</option>
                                            <?php
                                            require_once('classes/epi.php');
                                            $objeto = new epi();
                                            $lista = $objeto->selecionarEpi();
                                            foreach ($lista as $epi) {
                                                echo '<option value="' . $epi->nome . '">' . $epi->nome . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
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

    <script>
        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group input-group"><select name="epi[]" class="form-control input-group" required><option value="" selected disabled>Selecione um EPI</option><?php require_once('classes/epi.php');
                    $objeto = new epi();
                    $lista = $objeto->selecionarEpi();
                    foreach ($lista as $epi) {
                        echo '<option value="' . $epi->nome . '">' . $epi->nome . '</option>';
                    } ?> </select> <a href="#" class="remove_field input-group-text">Remove</a></div>'); //add input box
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