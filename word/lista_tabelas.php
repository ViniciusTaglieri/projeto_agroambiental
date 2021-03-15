<?php
//Texto
$myTextElement = $section->addText('Sumário', array('bold' => true, 'name' => 'arial', 'size' => 12), $paragraphStyle);

// Add tabelas
$section->addText('Lista de Tabelas', array('bold' => true, 'name' => 'arial', 'size' => 12));
$tocTabelas = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'));
$tocTabelas->setMinDepth(4);
$tocTabelas->setMaxDepth(4);

// Add quadros
$section->addText('Lista de Quadros', array('bold' => true, 'name' => 'arial', 'size' => 12));
$tocTabelas = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'));
$tocTabelas->setMinDepth(5);
$tocTabelas->setMaxDepth(5);

// Add TOC #1
$toc = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'), 1, 3);

$section->addPageBreak();
