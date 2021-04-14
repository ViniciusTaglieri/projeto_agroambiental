<?php
//Recebimento de variaveis
$cnpj = $_POST['cnpj'];
$indice_p = $_POST['indice_p'];
$indice_s = $_POST['indice_s'];
$prioridade = $_POST['prioridade'];
$agentes_ambientais = $_POST['agente'];

//empregador
$empregador_nome = $_POST['empregador_nome'];
$empregador_rg = $_POST['empregador_rg'];
$empregador_cpf = $_POST['empregador_cpf'];


//Funções para receber dados do BD
require_once('../classes/plano_acao.php');
$obj_plano_acao = new PlanoAcao();

//Funções para receber dados do BD
require_once('../classes/epi_epc_local.php');
$obj_epi_epc = new EpiEpc();

//Funções para receber dados do BD
require_once('../classes/medidas_local.php');
$obj_medidas = new MedidasLocal();

//Funções para receber dados do BD
require_once('../classes/anexo.php');
$obj_anexo = new Anexo();

//Funções para receber dados do BD
require_once('../classes/ghe.php');
$obj_ghe = new ghe();

//medidas controle
require_once('../classes/medidas_controle.php');
$obj_medidas_controle = new MedidasControle();

//funcao
require_once('../classes/funcao_ghe.php');
$obj_funcao_ghe = new FuncaoGhe();

//carga horaria
require_once('../classes/carga_horaria.php');
$obj_carga_horaria = new CargaHoraria();

//local
require_once('../classes/local.php');
$obj_local = new local();

//setor
require_once('../classes/setor.php');
$obj_setor = new setor();

//inventario
require_once('../classes/inventario.php');
$obj_inventario = new Inventario();

//Funções para receber dados do BD
require_once('../classes/funcao.php');
$obj_funcao = new funcao();

//Funções para receber dados do BD
require_once('../classes/empresa.php');
$obj_empresa = new Empresa();
$lista_empresa = $obj_empresa->selecionarEmpresaWhere($cnpj);
foreach ($lista_empresa as $empresa) {
}

//Funções para receber dados do BD
require_once('../classes/cidade.php');
$obj_cidade = new cidade();
$lista_cidade = $obj_cidade->selecionaCidadeWhere($empresa->id_cidade);
foreach ($lista_cidade as $cidade) {
}

//Funções para receber dados do BD
require_once('../classes/estado.php');
$obj_estado = new Estado();
$lista_estado = $obj_estado->selecinaEstado($empresa->uf);
foreach ($lista_estado as $estado) {
}

//carga horaria admin
$lista_carga_admin = $obj_carga_horaria->selecionarCargaHorariaWhere($empresa->carga_horaria_admin);
foreach ($lista_carga_admin as $carga_admin) {
}

//carga horaria operac
$lista_carga_operac = $obj_carga_horaria->selecionarCargaHorariaWhere($empresa->carga_horaria_operac);
foreach ($lista_carga_operac as $carga_operac) {
}

//Word
require_once './vendor/autoload.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();

require_once('config.php');
require_once('capa.php');
require_once('capa_2.php');
require_once('lista_tabelas.php');
require_once('titulo_1.php');
require_once('titulo_2.php');
require_once('titulo_3.php');
require_once('titulo_4.php');
require_once('titulo_5.php');
require_once('titulo_6.php');
require_once('titulo_7.php');
require_once('titulo_8.php');
require_once('titulo_9.php');
require_once('titulo_10.php');
require_once('titulo_11.php');
require_once('titulo_12.php');
require_once('titulo_13.php');
require_once('titulo_14.php');
require_once('titulo_15.php');
require_once('titulo_16.php');
require_once('header.php');
require_once('footer.php');

//Gerar arqquivo
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('C:\Users\Vinicius Taglieri\Downloads\PPRA_' . $empresa->fantasia . '.docx');
