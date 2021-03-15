<?php
    require_once ("classes/conexao.php");
    require_once ("classes/inventario.php");
    $id = $_GET['id'];
    $objeto = new Inventario();
    $resultado = $objeto->selecionarInventarioWhere($id);
    foreach($resultado as $registro){}
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
   

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
                    <form action="update_inventario.php" method="POST" class="needs-validation formulario" novalidate>
                        <h2 class="text-center py-4">Alterar Inventário de riscos</h2>
                        <input type="hidden" name="id" required value="<?=$registro->id?>">
                        <div class="form-group">
                            <select class="form-control" name="natureza" required>
                                <option value="" disabled>Selecione a natureza do risco</option>
                                <?php
                                    $natureza[] = "Físico";
                                    $natureza[] = "Químico";
                                    $natureza[] = "Biológico";
                                    $natureza[] = "Ergônomico";
                                    $natureza[] = "Mecânicos/Acidentes";

                                    for($i=0; $i < count($natureza); $i++){
                                        if($registro->natureza == $natureza[$i]){
                                            ?><option value="<?=$natureza[$i]?>" selected><?=$natureza[$i]?></option><?php
                                        }else{
                                            ?><option value="<?=$natureza[$i]?>"><?=$natureza[$i]?></option><?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="id_ghe" required>
                                <option value="" selected disabled>Selecione a natureza do risco</option>
                                <?php
                                require_once('classes/ghe.php');
                                $objeto = new ghe();
                                $lista = $objeto->selecionarGhe();
                                foreach($lista  as $ghe){
                                    if($ghe->id == $registro->id_ghe){
                                        ?><option value="<?=$ghe->id?>" selected><?=$ghe->nome?></option><?php
                                    }else{
                                        ?><option value="<?=$ghe->id?>"><?=$ghe->nome?></option><?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="agente" placeholder="Digite o agente" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required value="<?=$registro->agente?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="fonte_geradora" placeholder="Digite a fonte geradora" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required value="<?=$registro->fonte_geradora?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="propagacao" placeholder="Digite a propagação do agente" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required value="<?=$registro->propagacao?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="danos_saude" placeholder="Digite os possíveis danos a saúde" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required value="<?=$registro->danos_saude?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="avaliacao" required>
                                <option value="" selected disabled>Selecione o tipo de avaliação / tipo de exposição</option>
                                <?php
                                    if($registro->avaliacao == "Quantitativa / Intermitente"){
                                        ?><option value="Quantitativa / Intermitente">Quantitativa / Intermitente</option><?php
                                    }else if($registro->avaliacao == "Quantitativa / Eventural"){
                                        ?><option value="Quantitativa / Eventural">Quantitativa / Eventural</option><?php
                                    }else if($registro->avaliacao == "Quantitativa / Intermitente"){
                                        ?><option value="Quantitativa / Intermitente">Qualitativa / Intermitente</option><?php
                                    }else{
                                        ?><option value="Qualitativa / Eventual">Qualitativa / Eventual</option><?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="metodologia" placeholder="Digite a metodologia aplicada" maxlength="40" pattern="[A-Za-z0-9\ w]{0,40}" required value="<?=$registro->metodologia?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 40 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="intensidade" placeholder="Digite a intensidade da concentração" maxlength="60" pattern="[A-Za-z0-9\ w]{0,60}" required value="<?=$registro->intensidade?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tolerancia" placeholder="Digite o limite de tolerância" maxlength="10" pattern="[A-Za-z0-9\ w]{0,10}" required value="<?=$registro->tolerancia?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="anexo" placeholder="Digite o vide anexo" maxlength="60" pattern="[A-Za-z0-9\ w]{0,40}" required value="<?=$registro->anexo?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 60 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="risco" placeholder="Digite a *categoria de risco" maxlength="2" pattern="[A-Za-z0-9\ w]{0,2}" required value="<?=$registro->risco?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 2 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="protecao" placeholder="Digite a **categoria de proteção" maxlength="2" pattern="[A-Za-z0-9\ w]{0,2}" required value="<?=$registro->protecao?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 2 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tempo" placeholder="Digite a ***categoria de tempo" maxlength="2" pattern="[A-Za-z0-9\ w]{0,2}" required value="<?=$registro->tempo?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 2 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="grau_risco" placeholder="Digite o grau de risco" maxlength="40" pattern="[A-Za-z0-9\ w]{0,40}" required value="<?=$registro->grau_risco?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 40 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="codigo" placeholder="Digite o Código e-Social/Anexo I" maxlength="15" pattern="[A-Za-z0-9\ w]{0,15}" required value="<?=$registro->codigo?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 15 caracteres</div>
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