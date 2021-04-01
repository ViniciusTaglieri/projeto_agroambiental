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

// //quadro 12
// $section->addTitle("Quadro 12: Matriz de Risco para Avaliação dos Riscos Ocupacionais - Probabilidade X Severidade", 5);
// $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
// $row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
// $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PROBABILIDADE DE OCORRÊNCIA DO DANO - ÍNDICE (P)', $fancyTableFontStyle, array('align' => 'center'));
// $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('SEVERIDADE - ÍNDICE (S)
// ', $fancyTableFontStyle, array('align' => 'center'));
// $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('GRAU DE RISCO', $fancyTableFontStyle, array('align' => 'center'));

// if ($grauRisco <= 3) {
//     $row = $table->addRow(null, array('cantSplit' => true));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
//     $row->addCell(null, array('valign' => 'center', 'bgColor' => '68E671'))->addText("$grauRisco - BAIXO", null, array('align' => 'center'));
// } else if ($grauRisco == 4 && $indice_p == 1) {
//     $row = $table->addRow(null, array('cantSplit' => true));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
//     $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F57BF1'))->addText("$grauRisco - BAIXO", null, array('align' => 'center'));
// } else if ($grauRisco == 8 && $indice_p == 2) {
//     $row = $table->addRow(null, array('cantSplit' => true));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
//     $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F5AB29'))->addText("$grauRisco - MODERADO", null, array('align' => 'center'));
// } else if ($grauRisco <= 8) {
//     $row = $table->addRow(null, array('cantSplit' => true));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
//     $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F5D578'))->addText("$grauRisco - MÉDIO", null, array('align' => 'center'));
// } else {
//     $row = $table->addRow(null, array('cantSplit' => true));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_p", null, array('align' => 'center'));
//     $row->addCell(null, $fancyTableCellStyle)->addText("$indice_s", null, array('align' => 'center'));
//     $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F55B52'))->addText("$grauRisco - ALTO", null, array('align' => 'center'));
// }
// $section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);

$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setOrientation('landscape');

$fonteQuadro12 = array('name' => 'arial', 'size' => 7);
$fonteQuadro12Bold = array('name' => 'arial', 'size' => 7, 'bold' => true);
$paragrafoQuadro12 = array('align' => 'center', 'lineHeight' => 1);

$bgVerde = array('bgColor' => '#008000', 'valign' => 'center');
$bgLaranja = array('bgColor' => '#ffa500', 'valign' => 'center');
$bgRosa = array('bgColor' => '#ffcbdb', 'valign' => 'center');
$bgAmarelo = array('bgColor' => '#FFFF00', 'valign' => 'center');
$bgVermelho = array('bgColor' => '##FF0000', 'valign' => 'center');

//quador 12
$section->addTitle("Quadro 12: Matriz de Risco para Avaliação dos Riscos Ocupacionais - Probabilidade X Severidade", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PROBABILIDADE (P)', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('ALTAMENTE IMPROVÁVEL', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('IMPROVÁVEL', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('POUCO PROVÁVEL', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PROVÁVEL', $fonteQuadro12Bold, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('ÍNDICE:', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('1', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('2', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('3', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('4', $fonteQuadro12, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('PERFIL DE EXPOSIÇÃO QUALITATIVO:', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição baixa: contato não frequente com o agente ou frequente a baixíssimas concentrações/intensidades.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição moderada: contato frequente com o agente a baixas concentrações /intensidades ou contato não frequente a altas concentrações / intensidades.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição significativa ou importante: contato frequente com o agente a altas concentrações / intensidades.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição excessiva: contato frequente com o agente a concentrações / intensidades elevadíssimas.', $fonteQuadro12, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('PERFIL DE EXPOSIÇÃO QUANTITATIVO:', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição inferior a 10% do Limite de Exposição Ocupacional.E menor que 10% LEO Percentil 95 menor que 0,1 x LEO', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição estimada entre 10% e 50% do Limite de Exposição Ocupacional. 10% menor que E menor ou igual a 50% LEO Percentil 95 entre 0,1 x LEO e 0,5 x LEO', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição estimada entre 50% e 100% do Limite de Exposição Ocupacional. 50% menor que E menor ou igul a 100% LEO. Percentil 95 entre 0,5 x LEO e 1,0 x LEO', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Exposição estimada acima do Limite de Exposição Ocupacional. E > 100% LEO. Percentil 95 > 1,0 x LEO', $fonteQuadro12, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('SEVERIDADE (S)', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('ÍNDICE', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('DANO ÀS PESSOAS', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, array('gridSpan' => 4, 'vAlign' => 'center'))->addText('GRAU DE RISCO', $fonteQuadro12Bold, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('REVERSÍVEL LEVE', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('1', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão de doenças leves, com efeitos reversíveis levemente prejudiciais.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $bgVerde)->addText('1 - BAIXO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgVerde)->addText('2 - BAIXO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgVerde)->addText('3 - BAIXO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgAmarelo)->addText('4 - MÉDIO', $fonteQuadro12Bold, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('REVERSÍVEL SEVERO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('2', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão ou doença sérias, com efeitos reversíveis severos e prejudiciais.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $bgVerde)->addText('2 - BAIXO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgAmarelo)->addText('4 - MÉDIO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgAmarelo)->addText('6 - MÉDIO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgAmarelo)->addText('8 - MÉDIO', $fonteQuadro12Bold, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('IRREVERSÍVEL', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('3', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão ou doença críticas, com efeitos irreversíveis severos e prejudiciais que podem limitar a capacidade funcional.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $bgVerde)->addText('3 - BAIXO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgAmarelo)->addText('6 - MÉDIO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgVermelho)->addText('9 - ALTO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgVermelho)->addText('12- ALTO', $fonteQuadro12Bold, $paragrafoQuadro12);

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center', 'cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('FATAL OU INCAPACITANTE', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('4', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão ou doença incapacitante ou fatal.', $fonteQuadro12, $paragrafoQuadro12);
$row->addCell(null, $bgRosa)->addText('4 - BAIXO (Uma fatalidade pode ocorrer mesmo sendo quase impossível ou altamente improvável sua ocorrência)', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgLaranja)->addText('8 - MODERADO (Uma fatalidade pode ocorrer mesmo sendo quase impossível ou improvável sua ocorrência)', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgVermelho)->addText('12- ALTO', $fonteQuadro12Bold, $paragrafoQuadro12);
$row->addCell(null, $bgVermelho)->addText('16- ALTO', $fonteQuadro12Bold, $paragrafoQuadro12);

$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);
