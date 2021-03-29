<?php
session_start();
if (!(($_SESSION['usuario']) || ($_SESSION['senha']))) {
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
                            <a class="dropdown-item" href="cad_epi.php">Epi</a>
                            <a class="dropdown-item" href="cad_epc.php">Epc</a>
                            <a class="dropdown-item" href="cad_subcategoria.php">Subcategoria</a>
                            <a class="dropdown-item" href="cad_riscos.php">Riscos</a>
                            <a class="dropdown-item" href="cad_funcao.php">Função</a>
                            <a class="dropdown-item" href="cad_ppra.php">Detalhe da Função</a>
                            <a class="dropdown-item" href="cad_setor.php">Setor</a>
                            <a class="dropdown-item" href="cad_local.php">Local</a>
                            <a class="dropdown-item" href="cad_inventario.php">Inventário de riscos</a>
                            <a class="dropdown-item" href="cad_agentes.php">Agentes ambiental</a>
                            <a class="dropdown-item" href="cad_ghe.php">Ghe</a>
                            <a class="dropdown-item" href="cad_medidas_controle.php">Medidas de controle</a>
                            <a class="dropdown-item" href="cad_grau_risco.php">Grau de risco</a>
                            <a class="dropdown-item" href="cad_tipo_trabalho.php">Tipo do trabalho</a>
                            <a class="dropdown-item" href="cad_carga_horaria.php">Carga horária</a>
                            <a class="dropdown-item" href="cad_empresa_contratada.php">Empresa Contratada</a>
                            <a class="dropdown-item" href="cad_prevencao.php">Fundamento Técnico Legal</a>
                            <a class="dropdown-item" href="cad_resp_tecnico.php">Elaboração Técnica</a>
                            <a class="dropdown-item" href="cad_anexo.php">Anexos</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item active mr-1 my-1">
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Visualizar
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="exibir_epi.php">Epi</a>
                            <a class="dropdown-item" href="exibir_epc.php">Epc</a>
                            <a class="dropdown-item" href="exibir_subcategoria.php">Subcategoria</a>
                            <a class="dropdown-item" href="exibir_riscos.php">Riscos</a>
                            <a class="dropdown-item" href="exibir_funcao.php">Função</a>
                            <a class="dropdown-item" href="exibir_ppra.php">Detalhe da Função</a>
                            <a class="dropdown-item" href="exibir_setor.php">Setor</a>
                            <a class="dropdown-item" href="exibir_local.php">Local</a>
                            <a class="dropdown-item" href="exibir_inventario.php">Inventário de riscos</a>
                            <a class="dropdown-item" href="exibir_agentes.php">Agentes ambiental</a>
                            <a class="dropdown-item" href="exibir_ghe.php">Ghe</a>
                            <a class="dropdown-item" href="exibir_medidas_controle.php">Medidas de controle</a>
                            <a class="dropdown-item" href="exibir_grau_risco.php">Grau de risco</a>
                            <a class="dropdown-item" href="exibir_tipo_trabalho.php">Tipos de trabalho</a>
                            <a class="dropdown-item" href="exibir_carga_horaria.php">Carga horária</a>
                            <a class="dropdown-item" href="exibir_empresa_contratada.php">Empresa Contratada</a>
                            <a class="dropdown-item" href="exibir_prevencao.php">Fundamento Técnico Legal</a>
                            <a class="dropdown-item" href="exibir_resp_tecnico.php">Elaboração Técnica</a>
                            <a class="dropdown-item" href="exibir_anexo.php">Anexos</a>
                        </div>
                    </div>
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