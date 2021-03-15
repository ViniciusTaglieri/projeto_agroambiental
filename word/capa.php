<?php
//Cabeçalho capa
$section->addImage('img/capa.png', array('width' => 450, 'alignment' => 'center')); //imagem

$myTextElement = $section->addText('Rua Cel. Arthur Whitacker, 382, Edifício Di Napoli, Sala 1, Térreo, Centro, Descalvado, SP, Brasil', array('name' => 'arial', 'size' => 10), array('lineHeight' => 1.15, 'align' => 'center', 'spaceAfter' => 0));
$myTextElement = $section->addText('E-mail: contato@agroambientalconsultoria.com - Homepage: www.agroambientalconsultoria.com', array('name' => 'arial', 'size' => 10), array('lineHeight' => 1.15, 'align' => 'center', 'spaceAfter' => 0));
$myTextElement = $section->addText('Fone: 19 3583 8318', array('name' => 'arial', 'size' => 10), array('lineHeight' => 1.15, 'align' => 'center', 'spaceAfter' => 0));

//quebra de texto
$section->addTextBreak(1, array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.15, 'spaceAfter' => 0));
$section->addTextBreak(1, array('name' => 'arial', 'size' => 14, 'bold' => true), array('lineHeight' => 1.15, 'spaceAfter' => 0));

//Texto
$myTextElement = $section->addText('DOCUMENTO-BASE', array('bold' => true, 'name' => 'arial', 'size' => 12), array('align' => 'center', 'lineHeight' => 1, 'spaceAfter' => 0));

//Texto
$myTextElement = $section->addText('(Previsto na Norma Regulamentadora Nº 9 - NR 9)', $fontStyle, array('align' => 'center', 'lineHeight' => 1, 'spaceAfter' => 0));

//quebra de texto
$section->addTextBreak(1, array('name' => 'arial', 'size' => 33, 'bold' => true), array('lineHeight' => 1.5, 'spaceAfter' => 0));

// Add text run
$textrun = $section->addTextRun(array('lineHeight' => 1.5, 'spaceAfter' => 0));

$textrun->addText('P', array('bold' => true, 'name' => 'arial', 'size' => 32, 'color' => 'FF0000'));
$textrun->addText('ROGRAMA de', array('bold' => true, 'name' => 'arial', 'size' => 32));

// Add text run
$textrun = $section->addTextRun(array('lineHeight' => 1.5, 'spaceAfter' => 0));

$textrun->addText('P', array('bold' => true, 'name' => 'arial', 'size' => 32, 'color' => 'FF0000'));
$textrun->addText('REVENÇÃO de', array('bold' => true, 'name' => 'arial', 'size' => 32));

// Add text run
$textrun = $section->addTextRun(array('lineHeight' => 1.5, 'spaceAfter' => 0));

$textrun->addText('R', array('bold' => true, 'name' => 'arial', 'size' => 32, 'color' => 'FF0000'));
$textrun->addText('ISCOS', array('bold' => true, 'name' => 'arial', 'size' => 32));

// Add text run
$textrun = $section->addTextRun(array('lineHeight' => 1.5, 'spaceAfter' => 0));

$textrun->addText('A', array('bold' => true, 'name' => 'arial', 'size' => 32, 'color' => 'FF0000'));
$textrun->addText('MBIENTAIS', array('bold' => true, 'name' => 'arial', 'size' => 32));

//quebra de texto
$section->addTextBreak(1, array('name' => 'arial', 'size' => 23, 'bold' => true), array('lineHeight' => 1, 'spaceAfter' => 120, 'spaceBefore' => 120));

$myTextElement = $section->addText('AGROAMBIENTAL CONSULTORIA E PROJETOS', array('bold' => true, 'name' => 'arial', 'size' => 26), array('lineHeight' => 1.15, 'align' => 'center', 'spaceAfter' => 0));

//quebra de texto
$section->addTextBreak(1, array('name' => 'arial', 'size' => 19, 'bold' => true), array('lineHeight' => 1, 'spaceAfter' => 120, 'spaceBefore' => 120));

$myTextElement = $section->addText('VALIDADE ATÉ XX DE XXXXXXX / XXXX', array('bold' => true, 'name' => 'arial', 'size' => 19), array('lineHeight' => 1, 'align' => 'center', 'spaceAfter' => 120));

$section->addPageBreak();
