<?php
require_once("classes/conexao.php");
require_once("classes/empresa.php");
$cnpj = $_POST['id'];
$objeto = new empresa();
$resultado = $objeto->selecionarEmpresaWhere($cnpj);
foreach ($resultado as $empresa) {
}

require_once("classes/empresa.php");
require_once("classes/conexao.php");
require_once("classes/cidade.php");
require_once("classes/estado.php");
require_once("classes/categ_risco_indicea.php");
require_once("classes/carga_horaria.php");
$objeto = new empresa();
$cidade = new cidade();
$estado = new estado();
$risco = new risco();
$carga = new CargaHoraria();
?>
<section class="" style="margin-top:750px;">
    <div class="bg-menu header">
        <h1 onclick="off()" class="closer pr-3 py-1">X</h1>
    </div>
    <div class="content py-4">
        <div class="row mx-3">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="form-control py-1">
                        <?= $objeto->formataCnpj($empresa->cnpj) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->razao_social) {
                            echo $empresa->razao_social;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->fantasia) {
                            echo $empresa->fantasia;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->insc_estadual) {
                            echo $empresa->insc_estadual;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->insc_municip) {
                            echo $empresa->insc_municip;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->endereco) {
                            echo $empresa->endereco;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->distrito) {
                            echo $empresa->distrito;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->secao) {
                            echo $empresa->secao;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->grupo) {
                            echo $empresa->grupo;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->economica) {
                            echo $empresa->economica;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->numero) {
                            echo $empresa->numero;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->bairro) {
                            echo $empresa->bairro;
                        } ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->id_cidade) {
                            $resultado = $cidade->selecionaCidadeWhere($empresa->id_cidade);
                            foreach ($resultado as $nomeCidade) {
                            }
                            echo $nomeCidade->nome;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->uf) {
                            $resultado = $estado->selecinaEstado($empresa->uf);
                            foreach ($resultado as $sigla) {
                            }
                            echo $sigla->sigla;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->cep) {
                            echo $empresa->cep;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->telefone) {
                            echo $empresa->telefone;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->email) {
                            echo $empresa->email;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->cnae) {
                            echo $empresa->cnae;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->id_grau_risco) {
                            $resultado = $risco->selecinaRisco($empresa->id_grau_risco);
                            foreach ($resultado as $riscos) {
                            }
                            echo $riscos->pontos . " - " . $riscos->recomendacao;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->trab_admin) {
                            echo $empresa->trab_admin;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->carga_horaria_admin) {
                            $resultado = $carga->selecionarCargaHorariaWhere($empresa->carga_horaria_admin);
                            foreach ($resultado as $cargas) {
                            }
                            echo $cargas->horas;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->carga_horaria_operac) {
                            $resultado = $carga->selecionarCargaHorariaWhere($empresa->carga_horaria_operac);
                            foreach ($resultado as $cargas) {
                            }
                            echo $cargas->horas;
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-control py-1">
                        <?php
                        if ($empresa->carga_horaria_operac) {
                            echo $empresa->carga_horaria_operac;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#overlay').click(function() {
        off();
    });
</script>