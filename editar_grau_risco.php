<?php
    require_once ("classes/conexao.php");
    require_once ("classes/categ_risco_indicea.php");
    $id = $_GET['id'];
    $objeto = new risco();
    $resultado = $objeto->selecinaRisco($id);
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
<?php require_once('nav.php'); ?>

<section class="container mt-5">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form action="update_grau_risco.php" method="POST" class="formulario">
                    <h2 class="text-center py-4">Alterar Grau de Risco</h2>
                        <div class="form-group" style="display: none">
                            <input type="text" class="form-control" name="id" value="<?=$registro->id?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="condicao" placeholder="Digite a condição" maxlength="30" pattern="{0,30}" value="<?=$registro->condicao?>" required>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 30 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="descricao" placeholder="Digite a descrição" maxlength="255" pattern="{0,255}" value="<?=$registro->descricao?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 255 caracteres</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="pontos" placeholder="Digite os pontos" maxlength="2" pattern="[0-9]{0,2}" value="<?=$registro->pontos?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 2 números</div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="recomendacao" placeholder="Digite a recomendação" maxlength="100" pattern="{0,100}" value="<?=$registro->recomendacao?>">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter até 100 caracteres</div>
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