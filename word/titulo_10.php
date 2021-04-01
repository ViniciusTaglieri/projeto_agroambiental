<?php
$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setOrientation('landscape');

$section->addTitle("PLANO DE AÇÃO", 1);
$section->addTitle("Quadro 13: Plano de Ação", 5);

$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3', `bold` => true))->addText('PLANO DE AÇÃO', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('85', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('8 horas', null, array('align' => 'both'));


//Texto
$myTextElement = $section->addText('Fonte: Adaptado pelo autor', $fontStyle, $paragraphStyle);
