<?php
session_start();
if (!(($_SESSION['usuario']) || ($_SESSION['senha']))) {
    header('location:login.php');
}
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
                <li class="nav-item dropdown active mr-1 my-1 user-select-none">
                    <a href="#" id="menu" data-toggle="dropdown" class="text-light dropdown-toggle btn btn-secondary" data-display="static">Cadastrar</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Função</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="cad_funcao.php">Função</a>
                                <a class="dropdown-item text-dark" href="cad_epi.php">Epi - Função</a>
                                <a class="dropdown-item text-dark" href="cad_epc.php">Epc - Função</a>
                                <a class="dropdown-item text-dark" href="cad_ppra.php">Detalhe da Função</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Local</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="cad_epi_epc_local.php">Epi / Epc - Local</a>
                                <a class="dropdown-item text-dark" href="cad_setor.php">Setor</a>
                                <a class="dropdown-item text-dark" href="cad_local.php">Local</a>
                                <a class="dropdown-item text-dark" href="cad_medida_local.php">Medidas de controle locais</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ghe</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="cad_ghe.php">Ghe</a>
                                <a class="dropdown-item text-dark" href="cad_empresa_contratada.php">Empresa Contratada</a>
                                <a class="dropdown-item text-dark" href="cad_prevencao.php">Fundamento Técnico Legal</a>
                                <a class="dropdown-item text-dark" href="cad_resp_tecnico.php">Elaboração Técnica</a>
                                <a class="dropdown-item text-dark" href="cad_anexo.php">Anexos</a>
                                <a class="dropdown-item text-dark" href="cad_medidas_controle.php">Medidas de controle</a>
                            </ul>
                        </li>

                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Riscos</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="cad_riscos.php">Riscos</a>
                                <a class="dropdown-item text-dark" href="cad_inventario.php">Inventário de riscos</a>
                                <a class="dropdown-item text-dark" href="cad_agentes.php">Agentes ambiental</a>
                                <a class="dropdown-item text-dark" href="cad_grau_risco.php">Grau de risco</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="cad_empresa.php">Empresa</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="cad_subcategoria.php">Subcategoria</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="cad_tipo_trabalho.php">Tipo do trabalho</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="cad_carga_horaria.php">Carga horária</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="cad_plano_acao.php">Plano de ação</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown active mr-1 my-1 user-select-none">
                    <a href="#" id="menu" data-toggle="dropdown" class="text-light dropdown-toggle btn btn-secondary" data-display="static">Visualizar</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Função</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="exibir_funcao.php">Função</a>
                                <a class="dropdown-item text-dark" href="exibir_epi.php">Epi - Função</a>
                                <a class="dropdown-item text-dark" href="exibir_epc.php">Epc - Função</a>
                                <a class="dropdown-item text-dark" href="exibir_ppra.php">Detalhe da Função</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Local</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="exibir_epi_epc_local.php">Epi / Epc - Local</a>
                                <a class="dropdown-item text-dark" href="exibir_setor.php">Setor</a>
                                <a class="dropdown-item text-dark" href="exibir_local.php">Local</a>
                                <a class="dropdown-item text-dark" href="exibir_medida_local.php">Medidas de controle locais</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Ghe</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="exibir_ghe.php">Ghe</a>
                                <a class="dropdown-item text-dark" href="exibir_empresa_contratada.php">Empresa Contratada</a>
                                <a class="dropdown-item text-dark" href="exibir_prevencao.php">Fundamento Técnico Legal</a>
                                <a class="dropdown-item text-dark" href="exibir_resp_tecnico.php">Elaboração Técnica</a>
                                <a class="dropdown-item text-dark" href="exibir_anexo.php">Anexos</a>
                                <a class="dropdown-item text-dark" href="exibir_medidas_controle.php">Medidas de controle</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Riscos</a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item text-dark" href="exibir_riscos.php">Riscos</a>
                                <a class="dropdown-item text-dark" href="exibir_inventario.php">Inventário de riscos</a>
                                <a class="dropdown-item text-dark" href="exibir_agentes.php">Agentes ambiental</a>
                                <a class="dropdown-item text-dark" href="exibir_grau_risco.php">Grau de risco</a>
                            </ul>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="exibir_subcategoria.php">Subcategoria</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="exibir_tipo_trabalho.php">Tipo do trabalho</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="exibir_carga_horaria.php">Carga horária</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="exibir_subcategoria.php">Subcategoria</a>
                        </li>
                        <li class="dropdown-item dropdown-submenu">
                            <a class="text-dark" href="exibir_plano_acao.php">Plano de ação</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <a class="btn btn-secondary" href="ambiental.php">Projeto ambiental</a>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <a class="btn btn-secondary" href="ppra.php">PPRA</a>
                </li>
            </ul>
            <div class="navbar-nav mt-2 mt-lg-0 menu">
                <?php
                if ($_SESSION['tipo_usuario'] == 'admin') {
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="js/navbar.js"></script>