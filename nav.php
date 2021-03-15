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
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastrar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="cad_doc.php">Tipo de documento</a>
                            <a class="dropdown-item" href="cad_empresa.php">Empresa</a>
                            <a class="dropdown-item" href="cad_meio_ambiental.php">Documento ambiental</a>
                            <a class="dropdown-item" href="cad_servico.php">Serviço</a>
                            <a class="dropdown-item" href="cad_grau_risco.php">Grau de risco</a>
                            <a class="dropdown-item" href="cad_tipo_trabalho.php">Tipo do trabalho</a>
                            <a class="dropdown-item" href="cad_carga_horaria.php">Carga horária</a>
                            <a class="dropdown-item" href="cad_empresa_contratada.php">Empresa Contratada</a>
                            <a class="dropdown-item" href="cad_prevencao.php">Fundamento Técnico Legal</a>
                            <a class="dropdown-item" href="cad_resp_tecnico.php">Elaboração Técnica</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Visualizar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="exibir_doc.php">Tipos de documentos</a>
                            <a class="dropdown-item" href="exibir_empresas.php">Empresas</a>
                            <a class="dropdown-item" href="exibir_meio_ambiental.php">Documentos ambientais</a>
                            <a class="dropdown-item" href="exibir_servicos.php">Serviços</a>
                            <a class="dropdown-item" href="exibir_grau_risco.php">Grau de risco</a>
                            <a class="dropdown-item" href="exibir_tipo_trabalho.php">Tipos de trabalho</a>
                            <a class="dropdown-item" href="exibir_carga_horaria.php">Carga horária</a>
                            <a class="dropdown-item" href="exibir_empresa_contratada.php">Empresa Contratada</a>
                            <a class="dropdown-item" href="exibir_prevencao.php">Fundamento Técnico Legal</a>
                            <a class="dropdown-item" href="exibir_resp_tecnico.php">Elaboração Técnica</a>
                        </div>
                    </div>
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

