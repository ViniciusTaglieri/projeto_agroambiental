<?php
//Texto
$myTextElement = $section->addText('PROGRAMA DE PREVENÇÃO DE RISCOS AMBIENTAIS – PPRA', array('bold' => true, 'name' => 'arial', 'size' => 12), array('lineHeight' => 1.5, 'align' => 'center'));

$myTextElement = $section->addText('FUNDAMENTO TÉCNICO LEGAL: ', array('bold' => true, 'name' => 'arial', 'size' => 12), array('lineHeight' => 1.5, 'align' => 'center'));

$myTextElement = $section->addText('Redação dada pela Portaria 25, de 29 de dezembro de 1994 do Ministério do Trabalho e Emprego - MTE.', array('name' => 'arial', 'size' => 12), array('lineHeight' => 1.5, 'align' => 'center'));

$myTextElement = $section->addText('Constante da Norma Regulamentadora 09 - NR 09; da Portaria Nº 3.214, de 08 de junho de 1978.', array('name' => 'arial', 'size' => 12), array('lineHeight' => 1.5, 'align' => 'center'));

$myTextElement = $section->addText('EMPRESA CONTRATADA PARA ELABORAÇÃO DO PPRA', array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.5, 'align' => 'center'));

//empresa contratada
require_once('../classes/conexao.php');
require_once('../classes/empresa_contratada.php');
$objeto = new EmpresaContratada();
$lista = $objeto->selecionarEmpresaContratada();
foreach ($lista as $result) {
}

$lista_cidade_contratada = $obj_cidade->selecionaCidadeWhere($result->municipio);
foreach ($lista_cidade_contratada as $cidade_contratada) {
}

$lista_estado_contratado = $obj_estado->selecinaEstado($result->uf);
foreach ($lista_estado_contratado as $estado_contratado) {
}

$myTextElement = $section->addText('Razão Social: ' . $result->razao_social, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('CNPJ: ' . $result->cnpj, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Nome Fantasia: ' . $result->fantasia, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Endereço: ' . $result->endereco, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Complemento: ' . $result->complemento, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Bairro: ' . $result->bairro, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Município: ' . $cidade_contratada->nome, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('UF: ' . $estado_contratado->sigla, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('CEP: ' . $result->cep, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Fone: ' . $result->telefone, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Endereço eletrônico: ' . $result->email, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));

$myTextElement = $section->addText('ELABORAÇÃO TÉCNICA', array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.5, 'align' => 'center'));

//empresa contratada
require_once('../classes/conexao.php');
require_once('../classes/resp_tecnico.php');
$objeto = new RespTecnico();
$lista = $objeto->selecionarRespTecnico();
foreach ($lista as $result) {
}
$myTextElement = $section->addText($result->nome, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('CREA-SP ' . $result->crea, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText($result->func, $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));

$myTextElement = $section->addText('SOLICITANTE DO SERVIÇO', array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.5, 'align' => 'center'));

$myTextElement = $section->addText('AGROAMBIENTAL CONSULTORIA E PROJETOS', $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('Empregador', $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));
$myTextElement = $section->addText('RG: XXXXXXX  / CPF: XXXXXXX', $fontStyle, array('lineHeight' => 1.15, 'align' => 'both'));

$myTextElement = $section->addText('Este documento quando impresso só é válido com assinatura.', array('bgColor' => 'ffff00', 'color' => 'ff0000'), array('lineHeight' => 1.15, 'align' => 'center'));

$section->addPageBreak();
