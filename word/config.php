<?php
//Word
require_once './vendor/autoload.php';
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->getSettings()->setUpdateFields(true);

//adicionando sessao
$section = $phpWord->addSection();

//Configuração da fonte
$fontStyle = new \PhpOffice\PhpWord\Style\Font();
$fontStyle->setBold(false);
$fontStyle->setName('Arial');
$fontStyle->setSize(12);

//Configuração do paragrafo
$paragraphStyle = new \PhpOffice\PhpWord\Style\Paragraph();
$paragraphStyle->setLineHeight(1.5);
// $paragraphStyle->setAlignment('justify');
$paragraphStyle->setAlign('both');

// Numbered heading
$headingNumberingStyleName = 'headingNumbering';
$phpWord->addNumberingStyle(
    $headingNumberingStyleName,
    array(
        'type'   => 'multilevel',
        'levels' => array(
            array('pStyle' => 'Heading1', 'format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
            array('pStyle' => 'Heading2', 'format' => 'decimal', 'text' => '%1.%2', 'left' => 792, 'hanging' => 792, 'tabPos' => 432),
            array('pStyle' => 'Heading3', 'format' => 'decimal', 'text' => '%1.%2.%3', 'left' => 1224, 'hanging' => 1224, 'tabPos' => 504),
            array('pStyle' => 'Heading3', 'format' => 'decimal', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
        ),
    )
);
$phpWord->addTitleStyle(1, array('size' => 12, 'bold' => true), array('numStyle' => $headingNumberingStyleName, 'numLevel' => 0), $paragraphStyle);
$phpWord->addTitleStyle(2, array('size' => 12), array('numStyle' => $headingNumberingStyleName, 'numLevel' => 1), $paragraphStyle);
$phpWord->addTitleStyle(3, array('size' => 12, 'bold' => true, 'italic'  => true), array('numStyle' => $headingNumberingStyleName, 'numLevel' => 2), $paragraphStyle);
$phpWord->addTitleStyle(4, array('size' => 10), array('numStyle' => $headingNumberingStyleName, 'numLevel' => 3), $paragraphStyle);
$phpWord->addTitleStyle(5, array('size' => 10), array('numStyle' => $headingNumberingStyleName, 'numLevel' => 3), $paragraphStyle);
$phpWord->addTitleStyle(6, array('size' => 10), array('numStyle' => $headingNumberingStyleName, 'numLevel' => 3), $paragraphStyle);

$multilevelNumberingStyleName = 'multilevel';
$phpWord->addNumberingStyle(
    $multilevelNumberingStyleName,
    array(
        'type'   => 'multilevel',
        'levels' => array(
            array('format' => 'lowerLetter', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
            array('format' => 'upperLetter', 'text' => '%2.', 'left' => 792, 'hanging' => 792, 'tabPos' => 432),
        ),
    ),
);

$bullet = 'bullet';
$phpWord->addNumberingStyle(
    $bullet,
    array(
        'type'   => 'multilevel',
        'levels' => array(
            array('format' => 'bullet', 'text' => '%1.', 'left' => 360, 'hanging' => 360, 'tabPos' => 360),
            array('format' => 'bullet', 'text' => '%2.', 'left' => 792, 'hanging' => 792, 'tabPos' => 432),
        ),
    ),
);


//Tabelas
// 2. Advanced table
//nome do estilo
$fancyTableStyleName = 'Fancy Table';
//estilo da tabela
$fancyTableStyle = array('borderSize' => 6,  'cellMargin' => 200, 'borderColor' => '000000', 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
//estilo da primeira linha da tabela
$fancyTableFirstRowStyle = array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center');
//estilo da celula da tabela
$fancyTableCellStyle = array('valign' => 'center');
//estilo da fonte da tabela
$fancyTableFontStyle = array('bold' => true);
//adiciona o estilo da tabela
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
