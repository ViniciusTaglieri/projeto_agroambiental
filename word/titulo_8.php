<?php
//Titulo
$section->addTitle("MATRIZ DE RISCOS PARA AVALIAÇÃO DOS RISCOS OCUPACIONAIS", 1);

$myTextElement = $section->addText('A matriz de riscos é considerada como sendo um uma ferramenta de avaliação dos riscos ocupacionais / ambientais que facilita a seleção de prioridades para se empreender uma ação e/ou medida de controle.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('É uma representação gráfica e, às vezes, matemática da combinação da probabilidade de algo acontecer, associado com a consequência potencial da ocorrência.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Os eixos da matriz, conforme a definição de riscos, são: probabilidade da ocorrência do dano X severidade e/ou consequências da gravidade do dano.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('A Probabilidade de ocorrência do dano pode ser classificada através dos métodos qualitativo e quantitativo, e a atribuição de um número, através da classificação do Índice (P).', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Da mesma forma, a Severidade do dano pode ser identificada através de métodos qualitativo e quantitativo, e receber um valor através da classificação no Índice (S).', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Prestes (2009, p. 55-56 apud Arruda, 2015, p. 25-26) propõe a avaliação do risco de acordo com a Equação 1:', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Risco = Probabilidade de ocorrência do dano X Severidade do dano', array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.5, 'alignment' => 'center'));

$myTextElement = $section->addText('O nível de risco é determinado pela combinação da severidade dos possíveis danos e da probabilidade ou chance de sua ocorrência.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Neste interim, faz-se necessário salientar, que priorizamos estabelecer uma Matriz para Avaliação de Riscos à Saúde e Segurança Ocupacional.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('No Quadro abaixo, encontra-se o modelo de seleção da Matriz de Risco para Avaliação dos riscos Ocupacionais - Probabilidade(P) X Severidade(S):', $fontStyle, $paragraphStyle);


$grauRisco = $indice_p * $indice_s;
//quadro 12
$section->addTitle("Quadro 12: Matriz de Risco para Avaliação dos Riscos Ocupacionais - Probabilidade X Severidade", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PROBABILIDADE DE OCORRÊNCIA DO DANO - ÍNDICE (P)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('SEVERIDADE - ÍNDICE (S)
', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('GRAU DE RISCO', $fancyTableFontStyle, array('align' => 'center'));

if ($grauRisco <= 3) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => '68E671'))->addText("$grauRisco - BAIXO", null, array('align' => 'center'));
} else if ($grauRisco == 4 && $indice_p == 1) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F57BF1'))->addText("$grauRisco - BAIXO", null, array('align' => 'center'));
} else if ($grauRisco == 8 && $indice_p == 2) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F5AB29'))->addText("$grauRisco - MODERADO", null, array('align' => 'center'));
} else if ($grauRisco <= 8) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F5D578'))->addText("$grauRisco - MÉDIO", null, array('align' => 'center'));
} else {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F55B52'))->addText("$grauRisco - ALTO", null, array('align' => 'center'));
}
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);
