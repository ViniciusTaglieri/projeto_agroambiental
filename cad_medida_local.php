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
                        <form action="inserir_medida_local.php" method="POST" class="needs-validation formulario" novalidate>
                            <h2 class="text-center py-4">Cadastro Medida Local</h2>
                            <div class="form-group">
                                <select class="form-control" name="local" required>
                                    <option value="" selected disabled>Selecione um local</option>
                                    <?php
                                    require_once('classes/local.php');
                                    $objeto = new Local();
                                    $lista = $objeto->selecionarLocal();
                                    foreach ($lista as $local) {
                                        echo "<option value='$local->id'>$local->nome</option>";
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Erro</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="titulo" placeholder="Digite a ??rea" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Dever?? conter at?? 60 caracteres</div>
                            </div>
                            <div class="form-group">
                                <button class="add_field_button btn btn-primary btn-sm mb-2">Adicionar campo de Descri????o</button>
                                <div class="input_fields_wrap">
                                    <input type="text" class="form-control" name="descricao[]" placeholder="Digite a descri????o" required>
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Dever?? conter uma descri????o</div>
                                    <select class="form-control mt-3" name="destaque[]" required>
                                        <option value="0">Selecione o destaque</option>
                                        <option value="1">Vermelho</option>
                                        <option value="2">Negrito</option>
                                    </select>
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
        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment

                    var html = '<div class="mb-3"><hr>';
                    html += '<div class="form-group input-group">';
                    html += '<input type="text" class="form-control" name="descricao[]" placeholder="Digite a descri????o" required>';
                    html += '<div class="valid-feedback"></div>';
                    html += '<div class="invalid-feedback">Dever?? conter uma descri????o</div></div>';
                    html += '<select class="form-control mb-3" name="destaque[]" required>';
                    html += '<option value="0">Selecione o destaque</option>';
                    html += '<option value="1">Vermelho</option>';
                    html += '<option value="2">Negrito</option>';
                    html += '</select>';
                    html += '<a href="#" class="remove_field input-group-text mb-3">Remove</a></div>';

                    $(wrapper).append(html);
                    // $(wrapper).append('<div class="mb-3"><div class="form-group input-group"><input type="text" class="form-control" name="descricao[]" placeholder="Digite a descri????o" required><div class="valid-feedback"></div></div><label class="user-select-none"><input type = "checkbox" name = "destaque[]" value = "1">Destaque</label><a href="#" class = "remove_field input-group-text">Remove<a></div >');
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
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