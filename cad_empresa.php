<?php
require_once("classes/conexao.php");
require_once("classes/estado.php");
require_once("classes/cnae.php");
require_once("classes/categ_risco_indicea.php");
require_once("classes/carga_horaria.php");
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
    <script src="http://www.tidbits.com.br/download/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>
</head>

<body class="bg-body" onload="pegacidades()">
    <?php require_once('nav.php'); ?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="inserir_empresa.php" method="POST" class="needs-validation formulario" novalidate>
                            <h2 class="text-center py-4">Cadastro de Empresa</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cnpj" placeholder="Digite o cnpj da emresa" maxlength="14" pattern="[0-9]{14}" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter 14 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="razao_social" placeholder="Digite a razão social da empresa" pattern="[A-Za-z0-9\ w]{0,255}" maxlength="255">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 255 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="fantasia" placeholder="Digite o nome fantasia da empresa" pattern="[A-Za-z0-9\ w]{0,70}" maxlength="70">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 70 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="insc_estadual" placeholder="Digite a inscrição estadual da empresa" pattern="[A-Za-z0-9]{0,30}" maxlength="30">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 30 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="insc_municip" placeholder="Digite a inscrição municipal da empresa" pattern="[0-9]{0,14}" maxlength="14">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 14 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="endereco" placeholder="Digite o logradouro da empresa" pattern="[A-Za-z0-9\ w]{0,120}" maxlength="120">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 120 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="distrito" placeholder="Digite o distrito da empresa" pattern="[A-Za-z0-9\ w]{0,100}" maxlength="100">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 100 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="secao" placeholder="Digite a seção da empresa" pattern="[A-Za-z0-9\ w]{0,3}" maxlength="3">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 3 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="grupo" placeholder="Digite o grupo da empresa" pattern="[A-Za-z0-9\ w]{0,10}" maxlength="10">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 10 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="economica" placeholder="Digite a principal atividade econômica da empresa" pattern="[A-Za-z0-9\ w]{0,180}" maxlength="180">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 180 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="numero" placeholder="Digite o número do logradouro da empresa" pattern="[0-9]{0,6}" maxlength="6">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 6 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="bairro" placeholder="Digite o nome do bairro da empresa" pattern="[A-Za-z0-9\ w]{0,30}" maxlength="30">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 30 caracteres</div>
                            </div>
                            <div class="form-group">
                                <select name="uf" id="uf" class="form-control">
                                    <?php
                                    $objeto = new estado();
                                    $lista = $objeto->selecionarEstados();
                                    foreach ($lista as $estados) {
                                        if ($estados->id == 26) {
                                            echo '<option selected value="' . $estados->id . '">' . $estados->sigla . '</option>';
                                        } else {
                                            echo '<option value="' . $estados->id . '">' . $estados->sigla . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="id_cidade" id="cidades" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control cep-mask" name="cep" id="cep" placeholder="Digite o CEP da empresa" pattern="[A-Za-z0-9]{0,9}" maxlength="9">
                                <div id="invalid-cep" class="invalid-cep">CEP não encontrado</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefone" placeholder="Digite o telefone da empresa" pattern="[A-Za-z0-9]{0,13}" title="Deverá conter até 13 caracteres" maxlength="13">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter 14 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Digite o email da empresa" maxlength="120" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 120 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cnae" placeholder="Digite o cnae da empresa" list="cnae" pattern="[0-9]{0,7}" maxlength="7">
                                <datalist id="cnae">
                                    <?php
                                    $objeto = new cnae();
                                    $lista = $objeto->selecionarCnae();
                                    function soNumero($str)
                                    {
                                        return preg_replace("/[^0-9]/", "", $str);
                                    }
                                    foreach ($lista as $cnae) {
                                        $filtro = soNumero("$cnae->codigo_cnae");
                                        echo '<option value="' . $filtro . '"></option>';
                                    }
                                    ?>
                                </datalist>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 7 números</div>
                            </div>
                            <div class="form-group">
                                <select name="id_grau_risco" class="form-control" required>
                                    <option value="" selected disabled>Selecione o grau de risco da empresa</option>
                                    <?php
                                    $objeto = new risco();
                                    $lista = $objeto->selecionarRisco();
                                    foreach ($lista as $risco) {
                                        $filtro = $risco->pontos . " - " . $risco->recomendacao;
                                        echo '<option value="' . $risco->id . '">' . $filtro . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="trab_admin" placeholder="Digite o número do trabalho administrativo" pattern="[0-9]{0,7}" maxlength="7">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 7 números</div>
                            </div>
                            <div class="form-group">
                                <select name="carga_horaria_admin" class="form-control">
                                    <option disabled selected>Selecione a carga horaria administrativo</option>
                                    <?php
                                    $objeto = new CargaHoraria();
                                    $lista = $objeto->selecionarCargaHoraria();
                                    foreach ($lista as $carga) {
                                        $filtro = $carga->pontos . " - " . $carga->recomendacao;
                                        echo '<option value="' . $carga->id . '">' . $carga->horas . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="trab_operac" placeholder="Digite o número do trabalho operacional" pattern="[0-9]{0,7}" maxlength="7">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 7 números</div>
                            </div>
                            <div class="form-group">
                                <select name="carga_horaria_operac" class="form-control">
                                    <option disabled selected>Selecione a carga horaria operacional</option>
                                    <?php
                                    $objeto = new CargaHoraria();
                                    $lista = $objeto->selecionarCargaHoraria();
                                    foreach ($lista as $carga) {
                                        $filtro = $carga->pontos . " - " . $carga->recomendacao;
                                        echo '<option value="' . $carga->id . '">' . $carga->horas . '</option>';
                                    }
                                    ?>
                                </select>
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

    <script>
        $("#uf").on("change", function() {
            $.ajax({
                url: 'pega_cidades.php',
                type: 'POST',
                data: {
                    id: $("#uf").val()
                },
                beforeSend: function() {
                    $("#cidades").html("Carregando...");
                },
                success: function(data) {
                    $("#cidades").html(data);
                },
                error: function(data) {
                    $("#cidades").html("Houve um erro ao carregar");
                }
            });
        });

        function pegacidades() {
            $.ajax({
                url: 'pega_cidades.php',
                type: 'POST',
                data: {
                    id: $("#uf").val()
                },
                beforeSend: function() {
                    $("#cidades").html("Carregando...");
                },
                success: function(data) {
                    $("#cidades").html(data);
                },
                error: function(data) {
                    $("#cidades").html("Houve um erro ao carregar");
                }
            });
        };
    </script>

    <!--Validador de CEP-->
    <script>
        $(document).ready(function() {
            //Quando o campo cep perde o foco.
            // Localiza o elemento
            var cep_invalido = document.getElementById('invalid-cep');

            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                $('#cep').removeClass('is-invalid');
                                $('#cep').addClass('is-valid');
                                cep_invalido.style.display = "none";
                            } //end if.
                            else {
                                $('#cep').removeClass('is-valid');
                                $('#cep').addClass('is-invalid');
                                cep_invalido.style.display = "block";
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {}
            });
        });
    </script>

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