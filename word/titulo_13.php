<?php
$section->addTitle("ENCERRAMENTO", 1);

//Texto
$myTextElement = $section->addText('O presente PPRA - Programa de Prevenção de Riscos Ambientais, elaborado dentro das normas da legislação em vigor, foi digitado e impresso somente em uma face; totalizando 144 folhas, das quais, todas carimbadas e assinadas pelo responsável técnico que o elaborou.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Local e Data:', array('underline' => 'Underline', 'name' => 'arial', 'size' => 12), $paragraphStyle);


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$data = strftime('%d de %B de %Y', strtotime('today'));

$myTextElement = $section->addText("Descalvado, $data.", $fontStyle, array('lineHeight' => 1.5, 'alignment' => 'right'));

$myTextElement = $section->addText('Este Programa está formalizado através das assinaturas identificadas abaixo:', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Responsável pela Elaboração do PPRA:', array('underline' => 'single', 'name' => 'arial', 'size' => 12), array('lineHeight' => 1.5, 'alignment' => 'right'));

$section->addImage('img/assinatura.jpg', array('width' => 100, 'alignment' => 'center'));


//paragrafo
$myTextElement = $section->addText('JOYCE CRISTINA TESSARIN', array('bold' => true, 'name' => 'arial', 'size' => 12), array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('CREA 5062958584', $fontStyle, array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('Engenheira de Segurança do Trabalho', $fontStyle, array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('Engenheira Ambiental', $fontStyle, array('lineHeight' => 1, 'alignment' => 'center'));

$section->addTextBreak(1);

$myTextElement = $section->addText('Responsável pela Implementação do PPRA:', array('underline' => 'single', 'name' => 'arial', 'size' => 12), array('lineHeight' => 1.5, 'alignment' => 'right'));

$section->addTextBreak(1);

$myTextElement = $section->addText('_______________________________________________', array('bold' => true, 'name' => 'arial', 'size' => 12), array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('XXXXXXX', array('bold' => true, 'name' => 'arial', 'size' => 12), array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('Empregador', $fontStyle, array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('RG: XXXXXXX', $fontStyle, array('lineHeight' => 1, 'alignment' => 'center'));
$myTextElement = $section->addText('CPF: XXXXXXX', $fontStyle, array('lineHeight' => 1, 'alignment' => 'center'));
