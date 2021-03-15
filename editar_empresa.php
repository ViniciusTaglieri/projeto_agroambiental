<?php
require_once("classes/conexao.php");
require_once("classes/empresa.php");
$cnpj = $_GET['cnpj'];
$objeto = new empresa();
$resultado = $objeto->selecionarEmpresaWhere($cnpj);
foreach ($resultado as $empresa) {
}
?>
<?php
require_once("classes/conexao.php");
require_once("classes/estado.php");
require_once("classes/cnae.php");
require_once("classes/categ_risco_indicea.php");
require_once("classes/cidade.php")
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

<body class="bg-body">
    <?php require_once('nav.php'); ?>

    <section class="container mt-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <form action="update_empresa.php" method="POST" class="formulario">
                            <h2 class="text-center py-4">Alterar Empresa</h2>
                            <div class="form-group">
                                <input type="text" id="cnpj" class="form-control" name="cnpj" placeholder="Digite o cnpj da emresa" maxlength="14" pattern="[0-9]{14}" value="<?= $empresa->cnpj ?>" readonly>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter 14 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="razao_social" placeholder="Digite a razão social da empresa" maxlength="255" pattern="[A-Za-z0-9\ w]{0,255}" value="<?= $empresa->razao_social ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 255 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="fantasia" placeholder="Digite o nome fantasia da empresa" maxlength="70" pattern="[A-Za-z0-9\ w]{0,70}" value="<?= $empresa->fantasia ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 70 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="insc_estadual" placeholder="Digite a inscrição estadual da empresa" maxlength="30" pattern="[A-Za-z0-9]{0,30}" value="<?= $empresa->insc_estadual ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 30 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="insc_municip" placeholder="Digite a inscrição municipal da empresa" maxlength="14" pattern="[0-9]{0,14}" value="<?= $empresa->insc_municip ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 14 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="endereco" placeholder="Digite o logradouro da empresa" maxlength="120" pattern="[A-Za-z0-9\ w]{0,120}" value="<?= $empresa->endereco ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 120 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="distrito" placeholder="Digite o distrito da empresa" pattern="[A-Za-z0-9\ w]{0,100}" maxlength="100" value="<?= $empresa->distrito ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 100 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="secao" placeholder="Digite a seção da empresa" pattern="[A-Za-z0-9\ w]{0,3}" maxlength="3" value="<?= $empresa->secao ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 3 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="grupo" placeholder="Digite o grupo da empresa" pattern="[A-Za-z0-9\ w]{0,10}" maxlength="10" value="<?= $empresa->grupo ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 10 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="economica" placeholder="Digite a principal atividade econômica da empresa" pattern="[A-Za-z0-9\ w]{0,180}" maxlength="180" value="<?= $empresa->economica ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 180 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="numero" placeholder="Digite o número do logradouro da empresa" maxlength="6" pattern="[0-9]{0,6}" value="<?= $empresa->numero ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 6 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="bairro" placeholder="Digite o nome do bairro da empresa" maxlength="30" pattern="[A-Za-z0-9\ w]{0,30}" value="<?= $empresa->bairro ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 30 caracteres</div>
                            </div>
                            <div class="form-group">
                                <select name="uf" id="uf" class="form-control">
                                    <?php
                                    $objeto = new estado();
                                    $lista = $objeto->selecionarEstados();
                                    foreach ($lista as $estados) {
                                        if ($estados->id == $empresa->uf) {
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
                                    <?php
                                    $contador = 1;
                                    if ($contador == 1) {
                                        $objeto = new cidade();
                                        $lista = $objeto->selecinaCidade($empresa->uf);
                                        foreach ($lista as $cidades) {
                                            if ($cidades->id == $empresa->id_cidade) {
                                                echo '<option selected value="' . $cidades->id . '">' . $cidades->nome . '</option>';
                                            } else {
                                                echo '<option value="' . $cidades->id . '">' . $cidades->nome . '</option>';
                                            }
                                        }
                                        $contador = 0;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control cep-mask" name="cep" id="cep" placeholder="Digite o CEP da empresa" maxlength="9" pattern="[A-Za-z0-9]{0,9}" value="<?= $empresa->cep ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="telefone" placeholder="Digite o telefone da empresa" maxlength="13" pattern="[A-Za-z0-9]{0,13}" value="<?= $empresa->telefone ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter 14 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Digite o email da empresa" maxlength="120" value="<?= $empresa->email ?>" required>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 120 caracteres</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cnae" placeholder="Digite o cnae da empresa" list="cnae" maxlength="7" pattern="[0-9]{0,7}" value="<?= $empresa->cnae ?>" readonly>
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
                            </div>
                            <div class="form-group">
                                <select name="id_grau_risco" class="form-control" readonly>
                                    <option disabled selected>Selecione o grau de risco da empresa</option>
                                    <?php
                                    $objeto = new risco();
                                    $lista = $objeto->selecionarRisco();
                                    foreach ($lista as $risco) {
                                        $filtro = $risco->pontos . " - " . $risco->recomendacao;
                                        if ($risco->id == $empresa->id_grau_risco) {
                                            echo '<option selected value="' . $risco->id . '">' . $filtro . '</option>';
                                        } else {
                                            echo '<option value="' . $risco->id . '">' . $filtro . '</option>';
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="trab_admin" placeholder="Digite o número do trabalho administrativo" maxlength="7" pattern="[0-9]{0,7}" value="<?= $empresa->trab_admin ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 7 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="carga_horaria_admin" placeholder="Digite a carga horária do trabalho administrativo" maxlength="2" value="<?= $empresa->carga_horaria_admin ?>" readonly>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="trab_operac" placeholder="Digite o número do trabalho operacional" maxlength="7" pattern="[0-9]{0,7}" value="<?= $empresa->trab_operac ?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Deverá conter até 7 números</div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="carga_horaria_operac" placeholder="Digite a carga horária do trabalho operacional" maxlength="2" value="<?= $empresa->carga_horaria_operac ?>" readonly>
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

    <!--Validador de CEP-->
    <script>
        $(document).ready(function() {
            //Quando o campo cep perde o foco.
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
                                alert("CEP encontrado.");
                            } //end if.
                            else {
                                alert("CEP não encontrado.");
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

    <!--Formata o cnpj-->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cnpj").mask("99.999.999/9999-99");
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