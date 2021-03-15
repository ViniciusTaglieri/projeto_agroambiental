<?php
    session_start();
    if (!(($_SESSION['usuario']) || ($_SESSION['senha']))){
        header('location:login.php');
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-menu" style="margin:auto; width:100%">
    <div class="container">
        <img src="img/logo.png" style="height:72px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active mr-1 my-1">
                    <a class="btn btn-secondary" href="index.php">Home</a>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <a class="btn btn-secondary" href="ambiental.php">Projeto Ambiental</a>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <a class="btn btn-secondary" href="seguranca.php">Segurança do trabalho</a>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <a class="btn btn-secondary" href="ppra.php">PPRA</a>
                </li>
            </ul>
            <div class="navbar-nav mt-2 mt-lg-0 menu">
                <?php
                    if($_SESSION['tipo_usuario'] == 'admin'){
                ?>
                    <li class="nav-item nav-link active">
                        <a class="btn btn-secondary" href="email.php">Email</a>
                    </li>
                </li>
                <?php
                    }
                ?>
                <li class="nav-item nav-link active">
                    <a class="btn btn-secondary" href="logout.php">Logout</a>
                </li>
            </div>
        </div>
    </div>
</nav>

