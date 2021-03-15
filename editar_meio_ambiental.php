<?php
    require_once ("classes/conexao.php");
    require_once ("classes/meio_ambiental.php");
    require_once ("classes/empresa.php");
    require_once ("classes/documento.php");
    $id = $_GET['id'];
    $objeto = new MeioAmbiental();
    $resultado = $objeto->selecionarMeioAmbientalWhere($id);
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
                    <form action="update_meio_ambiental.php" method="POST" class="formulario">
                    <h2 class="text-center py-4">Alterar Meio Ambiental</h2>
                        <div class="form-group" style="display: none">
                            <input type="text" class="form-control" name="id" value="<?=$registro->id?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="empresa" placeholder="Digite o cnpj da emresa" maxlength="14" value="<?=$registro->empresa?>" list="empresa" pattern="[0-9]{0,14}" required readonly>
                            <datalist id="empresa">
                            <?php
                                $empresa = new empresa();
                                $lista = $empresa->selecionarEmpresa();
                                foreach($lista as $empresas){
                                    echo '<option value="'.$empresas->cnpj.'"></option>';
                                }
                            ?>
                            </datalist>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">Deverá conter 14 números</div>
                        </div>
                        <div class="form-group">
                            <select name="documento" class="form-control">
                                <option value="" disabled selected>Selecione o documento</option>
                                <?php
                                    $documento = new documento();
                                    $lista = $documento->selecionarDocumento();
                                    foreach($lista as $documentos){
                                        if($documentos->id == $registro->documento){
                                            echo '<option selected value="'.$documentos->id.'">'.$documentos->nome.'</option>';
                                        }else{
                                            echo '<option value="'.$documentos->id.'">'.$documentos->nome.'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php $hoje = date('Y-m-d'); ?>
                            <input type="date" class="form-control" name="emissao" required value="<?=$registro->emissao?>">
                        </div>
                        <div class="form-group">
                            <?php 
                                $hoje = date('Y-m-d', strtotime('+30 days', strtotime('now')));
                            ?>
                            <input type="date" class="form-control" name="vencimento" required value="<?=$registro->vencimento?>">
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="lembrete" value="<?=$registro->lembrete?>" readonly>
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