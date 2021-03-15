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
    <?php require_once('nav_padrao.php');?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="word/word.php" method="POST" class="needs-validation formulario" novalidate>
                            <h2 class="text-center py-4">Cadastro GHE</h2>
                                <!--Valores ppra 1 -->
                                <input type="hidden" name="cnpj" value="<?=$_POST['cnpj']?>">
                                <?php
                                $agente = $_POST['agente'];
                                for($i = 0; $i < count($agente); $i++){
                                    ?>
                                        <input type="hidden" name="agente[]" value="<?=$agente[$i]?>">
                                    <?php
                                }
                                ?>
                                <input type="hidden" name="indice_p" value="<?=$_POST['indice_p']?>">
                                <input type="hidden" name="indice_s" value="<?=$_POST['indice_s']?>">
                                <input type="hidden" name="prioridade" value="<?=$_POST['prioridade']?>">
                            <!--GHE-->
                            <div class="form-group">
                                <input type="text" class="form-control" name="ghe" placeholder="Digite o ghe" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                            </div>
                            <div class="form-group">
                                <select name="setor" class="form-control" required>
                                    <option value="" disabled selected>Selecione um setor</option>
                                    <?php
                                    require_once('classes/conexao.php');
                                    require_once('classes/setor.php');

                                    $objeto = new setor();
                                    $lista = $objeto->selecionarSetor();
                                    foreach ($lista as $setor) {
                                    ?>
                                        <option value="<?= $setor->nome ?>"><?= $setor->nome ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="local" class="form-control" required>
                                    <option value="" disabled selected>Selecione um local</option>
                                    <?php
                                    require_once('classes/conexao.php');
                                    require_once('classes/local.php');

                                    $objeto = new local();
                                    $lista = $objeto->selecionarLocal();
                                    foreach ($lista as $local) {
                                    ?>
                                        <option value="<?= $local->nome ?>"><?= $local->nome ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="jornada" class="form-control" required>
                                    <option value="" disabled selected>Selecione uma jornada de trabalho</option>
                                    <?php
                                    require_once('classes/conexao.php');
                                    require_once('classes/carga_horaria.php');

                                    $objeto = new CargaHoraria();
                                    $lista = $objeto->selecionarCargaHoraria();
                                    foreach ($lista as $jornada) {
                                    ?>
                                        <option value="<?= $jornada->id ?>"><?= $jornada->jornada ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="ambiente" placeholder="Digite a descrição do ambiente de trabalho" required rows="4"></textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                            </div>
                            <div class="form-group">
                                <div class="input_fields_wrap">
                                    <button class="add_field_button btn btn-primary btn-sm mb-2">Adicionar campo de Função</button>
                                    <div class="form-group input-group">
                                        <select name="funcao[]" class="form-control" required>
                                            <option value="" selected disabled>Selecione uma função</option>
                                            <?php
                                            require_once('classes/funcao.php');
                                            $funcao = new Funcao();
                                            $lista = $funcao->selecionarFuncao();
                                            foreach ($lista as $funcoes) {
                                                    echo '<option value="'.$funcoes->id.'">'.$funcoes->nome.'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="qt[]" placeholder="Digite a quantidade de trabalhadores expostos" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" class="form-control" name="respCargo[]" placeholder="Digite a responsabilidade do cargo" required rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input_fields_wrap_natureza">
                                    <button class="add_field_button_natureza btn btn-primary btn-sm mb-2">Adicionar campo de fonte geradora</button>
                                    <div class="form-group input-group">
                                        <select name="natureza[]" class="form-control" required>
                                            <option value="" selected disabled>Selecione a fonte geradora</option>
                                            <option value="inexistente">Ausência de Fator de Risco</option>
                                            <?php
                                                require_once('classes/inventario.php');
                                                $inventario = new Inventario();
                                                $lista = $inventario->selecionarInventario();
                                                foreach ($lista as $inventarios){
                                                    echo '<option value="'.$inventarios->id.'">'.$inventarios->fonte_geradora.'</option>';
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="submit" class="btn btn-block btn-success mt-4" value="Avançar">
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
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div><hr><div class="form-group input-group"><select name="funcao[]" class="form-control input-group" required><option value="" selected disabled>Selecione uma função</option><?php 
                    require_once('classes/funcao.php');
                    $funcao = new funcao();
                    $lista = $funcao->selecionarFuncao();
                    foreach ($lista as $funcoes) {
                            echo '<option value="'.$funcoes->id.'">'.$funcoes->nome.'</option>';
                    }
                        ?> </select> </div><div class="form-group"><input type="number" class="form-control" name="qt[]" placeholder="Digite a quantidade de trabalhadores expostos" required></div><div class="form-group"><textarea type="text" class="form-control" name="respCargo[]" placeholder="Digite a responsabilidade do cargo" required rows="4"></textarea></div><a href="#" class="remove_field input-group-text">Remover</a></div>'); //add input box
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
    // natureza
        $(document).ready(function() {
            var max_fields = 20; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap_natureza"); //Fields wrapper
            var add_button = $(".add_field_button_natureza"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="form-group input-group"><select name="natureza[]" class="form-control" required><option value="" selected disabled>Selecione a fonte geradora</option><option value="inexistente">Ausência de Fator de Risco</option><?php
                        $inventario = new Inventario();
                        $lista = $inventario->selecionarInventario();
                        foreach ($lista as $inventarios){
                            echo '<option value="'.$inventarios->id.'">'.$inventarios->fonte_geradora.'</option>';
                        }
                        ?></select><a href="#" class="remove_field input-group-text">Remover</a></div>'); //add input box
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