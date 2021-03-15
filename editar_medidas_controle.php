<?php
    require_once ("classes/conexao.php");
    require_once ("classes/medidas_controle.php");
    $id = $_GET['id'];
    $objeto = new MedidasControle();
    $resultado = $objeto->selecionarMedidasControleWhere($id);
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
                    <form action="update_medidas_controle.php" method="POST" class="formulario">
                    <h2 class="text-center py-4">Alterar Medidas de Controle</h2>
                    <div class="form-group">
                                <select class="form-control" name="id_ghe" require>
                                    <option value="" disabled selected>Escolha o ghe:</option>
                                    <?php
                                        require_once('classes/ghe.php');
                                        $objeto = new ghe();
                                        $lista = $objeto->selecionarGhe();
                                        foreach($lista as $ghe){
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
                                <textarea type="text" class="form-control" name="trabalhador" placeholder="Cabe ao trabalhador" required rows="3"><?=$registro->trabalhador?></textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="empregador" placeholder="Cabe ao empregador" required rows="3"><?=$registro->empregador?></textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="ergonomico" placeholder="Para agente ergonomico" required rows="3"><?=$registro->ergonomico?></textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="epc" placeholder="ecp" required value="<?=$registro->epc?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="epi" placeholder="epi" required value="<?=$registro->epi?>">
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="parecer_tecnico" placeholder="Digite o parecer técnico" required rows="3"><?=$registro->parecer_tecnico?></textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Insalubridade:</label>
                                        <?php
                                        if($registro->insalubridade == 0){
                                            ?>
                                                <div class="form-check">
                                                    <input checked class="form-check-input" type="radio" name="insalubridade" value="0">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Não
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="insalubridade" value="1">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Sim
                                                    </label>
                                                </div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="insalubridade" value="0">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Não
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input checked class="form-check-input" type="radio" name="insalubridade" value="1">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Sim
                                                    </label>
                                                </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6">
                                    <label>Periculosidade:</label>
                                    <?php
                                        if($registro->insalubridade == 0){
                                            ?>
                                                <div class="form-check">
                                                    <input checked class="form-check-input" type="radio" name="periculosidade" value="0">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Não
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="periculosidade" value="1">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Sim
                                                    </label>
                                                </div>
                                            <?php
                                        }else{
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="periculosidade" value="0">
                                                    <label class="form-check-label" for="periculosidade">
                                                        Não
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input checked class="form-check-input" type="radio" name="insalubridade" value="1">
                                                    <label class="form-check-label" for="insalubridade">
                                                        Sim
                                                    </label>
                                                </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="observacao" placeholder="Observação" required rows="3"><?=$registro->observacao?></textarea>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback"></div>
                            </div>
                        <div class="form-group" style="display:none">
                            <input type="text" class="form-control" name="id" value="<?=$registro->id?>" readonly>
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