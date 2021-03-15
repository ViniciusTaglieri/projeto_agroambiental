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
</head>
<body class="bg-body">
<?php require_once('nav.php'); ?>

<section class="container mt-5">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10 table-responsive">
                <table class="table table-hover table-sm" style="background:white">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Empresa</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Emissão</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Dias restantes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>AF MARMORARIA</td>
                        <td>LICENCIAMENTO SEMARH</td>
                        <td>26/10/2017</td>
                        <td>26/11/2018</td>
                        <td>VENCIDO</td>
                        <td>-620</td>
                    </tr>
                    <tr>
                        <td>ACOTEC</td>
                        <td>LICENCIAMENTO CETESB</td>
                        <td>08/02/2017</td>
                        <td>08/02/2021</td>
                        <td>VENCIDO</td>
                        <td>185</td>
                    </tr>
                    <tr>
                        <td>ADEMAR FERNANDES</td>
                        <td>ATO DECLARATÓRIO</td>
                        <td>06/04/2016</td>
                        <td>06/04/2021</td>
                        <td>VENCIDO</td>
                        <td>-854</td>
                    </tr>
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