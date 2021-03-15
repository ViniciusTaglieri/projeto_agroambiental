<?php
require_once('enviar_telegram.php');
require_once('enviar_email.php');
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
</head>
<body class="bg-body">
<section class="container" style="margin-top: 7%">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10 formulario form-login">
			<div class="row">
				<div class="col-lg-8 login" style="padding-right:0px">
					<img src="img/agro_login.jpg" style="width:100%; border-radius: 20px 0px 0px 15px;">
				</div>
				<div class="col-lg-4">
					<img src="img/logo.png" style="width:100%;" class="mt-5">
					<div class="mt-5">
						<form action="logar.php" method="POST">
						<div class="form-group">
							<input type="text" class="form-control" name="usuario" placeholder="Usuário" maxlength="60" pattern="{0,60}" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="senha" placeholder="Senha" maxlength="60" pattern="{0,60}" required>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-block btn-success mt-4" value="Entrar">
							<a class="fp btn-block" href="#">Esqueceu sua senha?</a>
						</div>
						</form>
					</div>
				</div>
			</div>
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