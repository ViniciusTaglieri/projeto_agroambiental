<?php
$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));


//setup
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$lista_plano_inicio = $obj_plano_acao->selecionarPlanoAcaoWhereEmpresaMinDataInicio($cnpj);
foreach ($lista_plano_inicio as $plano_inicio) {
}
$lista_plano_fim = $obj_plano_acao->selecionarPlanoAcaoWhereEmpresaMaxDataFim($cnpj);
foreach ($lista_plano_fim as $plano_fim) {
}

$data_inicial = date('Y-m', strtotime($plano_inicio->data_inicio));
$data_final = date('Y-m', strtotime($plano_fim->data_fim));

$data_inicial = date('Y-m', strtotime($data_inicial));
$data_final = date('Y-m', strtotime($plano_fim->data_fim));

$diferenca = strtotime($data_final) - strtotime($data_inicial);
$diferenca_meses = ceil($diferenca / (60 * 60 * 24) / 30);
if ($diferenca_meses <= 3) {
    $diferenca_meses++;
}
//fim do setup

$sectionStyle->setOrientation('landscape');

$section->addTitle("PLANO DE AÇÃO", 1);
$section->addTitle("Quadro 13: Plano de Ação", 5);

$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => '002060', `bold` => true, 'gridSpan' => 6 + $diferenca_meses))->addText('PLANO DE AÇÃO', array('color' => 'white', 'bold' => true), array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart', 'bgColor' => 'ffff00'))->addText('METAS E PRIORIDADES ESTABELECIDAS', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'gridSpan' => $diferenca_meses + 1, 'bgColor' => '9cc2e5'))->addText('CRONOGRAMA', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart', 'bgColor' => '9cc2e5'))->addText('Prioridade', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart', 'bgColor' => '9cc2e5'))->addText('Responsável ', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart', 'bgColor' => '9cc2e5'))->addText('Foi realizado(a)?', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart', 'bgColor' => '9cc2e5'))->addText('Visto do Responsável', null, array('align' => 'center'));

// Ano do cronograma
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('vMerge' => 'continue'));


$mesNovo = date('Y-m', strtotime($data_inicial . ' - 1 month'));
$anoPassado = date('Y', strtotime($mesNovo));
for ($i = 0; $i < $diferenca_meses; $i++) {

    $mesNovo = date('Y-m', strtotime($mesNovo . ' + 1 month'));

    $anos[] = $anoNovo = date('Y', strtotime($mesNovo));
    $grid[] = $i;
}

foreach ($anos as $key => $ano) {
    if ($key == 0) {
        $ano_passado = 0;
    } else {
        $ano_passado = $anos[$key - 1];
    }
    if ($ano != $ano_passado) {
        $ano_valido[] = $ano;
        $grid_valido[] = $grid[$key];
    }
}


foreach ($ano_valido as $key => $valido) {
    if ($key == (count($grid_valido) - 1)) {
        $grid_certo = count($anos) - $grid_valido[$key];
    } else {
        $grid_certo = $grid_valido[$key + 1] - $grid_valido[$key];
    }
    $row->addCell(null, array('bgColor' => 'ffff00', 'gridSpan' => $grid_certo))->addText($valido, array('bold' => true), array('align' => 'center'));
}



$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('vMerge' => 'continue'));

$row = $table->addRow(500, array('cantSplit' => true));
$row->addCell(null, array('vMerge' => 'continue'));


// nome abreviado dos meses
$meses_string = strftime('%b', strtotime($data_inicial));

$mesNovo = date('Y-m', strtotime($data_inicial . ' - 1 month'));
for ($i = 0; $i < $diferenca_meses; $i++) {

    $mesNovo = date('Y-m', strtotime($mesNovo . ' + 1 month'));

    echo $meses_string = strtoupper(strftime('%b', strtotime($mesNovo)));
    echo "<br>";
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr', 'bgColor' => '002060'))->addText($meses_string, array('color' => 'white'), array('align' => 'center'));
}
//fim do nome abreviado dos meses


$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('vMerge' => 'continue'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => '002060'))->addText('Sim (S) / Não (N)', array('color' => 'white'), array('align' => 'center'));
$row->addCell(null, array('vMerge' => 'continue'));

//meses validos
$lista_plano = $obj_plano_acao->selecionarPlanoAcaoWhereEmpresa($cnpj);
foreach ($lista_plano as $key => $plano) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, $fancyTableCellStyle)->addText($plano->metas, null, array('align' => 'center'));


    //arrumar q o primeiro mes n pega
    // meses validos
    $meses[] = date('Y-m', strtotime($data_inicial));
    for ($i = 1; $i < $diferenca_meses; $i++) {
        $meses[$i] = date('Y-m', strtotime($meses[$i - 1] . ' + 1 month'));
    }

    foreach ($meses as $key => $mes) {
        $mes_data_inicio = date('Y-m', strtotime($plano->data_inicio));
        $mes_data_fim = date('Y-m', strtotime($plano->data_fim));

        if (strtotime($mes_data_inicio) <= strtotime($mes) and strtotime($mes_data_fim) >= strtotime($mes)) {
            $meses_validos[] = "x";
        } else {
            $meses_validos[] = "0";
        }
    }

    foreach ($meses_validos as $key => $validos) {
        echo $validos;
        if ($validos == "x") {
            $row->addCell(null, $fancyTableCellStyle)->addText('X', null, array('align' => 'center'));
        } else {
            $row->addCell(null, $fancyTableCellStyle)->addText('', null, array('align' => 'center'));
        }
    }
    echo "<hr>";
    unset($meses_validos);
    unset($meses);

    $row->addCell(null, array('vMerge' => 'continue'));
    $row->addCell(null, $fancyTableCellStyle)->addText($plano->prioridade, null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText($plano->responsavel, null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('', null, array('align' => 'center'));
}

$gridSpanLegenda = (6 + $diferenca_meses);
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'ffff00', 'gridSpan' => $gridSpanLegenda))->addText('PRAZO PARA REALIZAÇÃO: | A: Imediato | B: 30 dias | C: 60 dias | D: 90 dias | E: 120 dias | F: 150 dias | G: 180 dias | H: 1 ano', null, array('align' => 'center'));

//Texto
$myTextElement = $section->addText('Fonte: Adaptado pelo autor', $fontStyle, $paragraphStyle);
