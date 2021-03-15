<?php
  require_once("classes/conexao.php");
  require_once("classes/medidas_controle.php");
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $objeto = new MedidasControle();
    $resultado = $objeto->apagarMedidasControle($id);
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agroambiental</title>
    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.png" />

    <!--Links do Css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css"> 

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body class="bg-body" style="overflow-x: hidden">
<?php require_once('nav_trab.php'); ?>
<?php
if ($_SESSION['tipo_usuario'] == "func"){
    $acesso = "disabled";
}else{
    $acesso = "enabled";
}
?>
<section class="">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 table-responsive py-4">
            <!--Exibir e operações  de controle-->
            <table class="table table-hover table-bordered mt-5" style="background:white">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col" style="vertical-align:middle;">GHE</th>
                        <th scope="col" style="vertical-align:middle;">Trabalhador</th>
                        <th scope="col" style="vertical-align:middle;">Empregador</th>
                        <th scope="col" style="vertical-align:middle;">Agente ergonômico</th>
                        <th scope="col" style="vertical-align:middle;">Epc</th>
                        <th scope="col" style="vertical-align:middle;">Epi</th>
                        <th scope="col" style="vertical-align:middle;">Parecer técnico	</th>
                        <th scope="col" style="vertical-align:middle;">Insalubridade</th>
                        <th scope="col" style="vertical-align:middle;">Periculosidade</th>
                        <th scope="col" style="vertical-align:middle;">Observação</th>
                        <th scope="col" class="text-center" style="vertical-align:middle">Alterar</th>
                        <th scope="col" class="text-center" style="vertical-align:middle">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require_once("classes/conexao.php");
                    require_once("classes/medidas_controle.php");
                    $objeto = new MedidasControle();
                    $lista = $objeto->selecionarMedidasControle();
                    foreach($lista as $registro)
                    {
                ?>
                        <tr class="text-center">
                            <td>
                            <?php
                                    require_once('classes/ghe.php');
                                    $obj_ghe = new ghe();
                                    $lista_ghe = $obj_ghe->selecionarGheWhere($registro->id_ghe);
                                    foreach($lista_ghe as $ghe){
                                        echo "$ghe->nome";
                                    }
                                ?>
                            </td>
                            <td><?=$registro->trabalhador?></td>
                            <td><?=$registro->empregador?></td>
                            <td><?=$registro->ergonomico?></td>
                            <td><?=$registro->epc?></td>
                            <td><?=$registro->epi?></td>
                            <td><?=$registro->parecer_tecnico?></td>
                            <td><?php if($registro->insalubridade == 0){echo "Não";}else{ echo "Sim";}?></td>
                            <td><?php if($registro->periculosidade == 0){echo "Não";}else{ echo "Sim";}?></td>
                            <td><?=$registro->observacao?></td>
                            <?php
                            if(!($acesso == "disabled")){
                            ?>
                                <td class="text-center"><a href='editar_medidas_controle.php?id=<?=$registro->id?>'><i class='fas fa-edit'></i></a></td>
                                <td class="text-center"><a href='exibir_medidas_controle.php?id=<?=$registro->id?>'><i class='fa fa-trash' aria-hidden='true'></i></a></i></td>
                            <?php
                            }
                            ?>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>      
        <div class="col-lg-1"></div>  
    </div>
</section>
    


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>