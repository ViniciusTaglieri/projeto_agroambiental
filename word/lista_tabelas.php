<?php

// Add tabelas
$section->addText('Lista de Tabelas', array('bold' => true, 'name' => 'arial', 'size' => 12));
$tocTabelas = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'));
$tocTabelas->setMinDepth(6);
$tocTabelas->setMaxDepth(6);

// Add quadros
$section->addText('Lista de Quadros', array('bold' => true, 'name' => 'arial', 'size' => 12));
$tocTabelas = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'));
$tocTabelas->setMinDepth(5);
$tocTabelas->setMaxDepth(5);

// Add figuras
$section->addText('Lista de Figuras', array('bold' => true, 'name' => 'arial', 'size' => 12));
$tocTabelas = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'));
$tocTabelas->setMinDepth(7);
$tocTabelas->setMaxDepth(7);

// Add sumario
$myTextElement = $section->addText('Sumário', array('bold' => true, 'name' => 'arial', 'size' => 12), $paragraphStyle);
$toc = $section->addTOC(array('name' => 'calibri', 'size' => 10), array('tabLeader' => 'dot'), 1, 4);

$section->addPageBreak();
