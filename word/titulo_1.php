<?php

// Nova seção de paisagem
$section = $phpWord->addSection(array('orientation' => 'landscape'));
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));

//Titulo
$section->addTitle("IDENTIFICAÇÃO SUMÁRIA DA EMPRESA", 1);
$section->addTitle("Quadro 1: Identificação Sumária da Empresa", 5);

$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center',  'cellMargin' => 50));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("RAZÃO SOCIAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 3, 'valign' => 'center'))->addText("$empresa->razao_social", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("NOME FANTASIA:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 3, 'valign' => 'center'))->addText("$empresa->fantasia", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("CNPJ:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$empresa->cnpj", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 3, 'valign' => 'center'))->addText("INSCRIÇÃO ESTADUAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$empresa->insc_estadual", NULL, array('align' => 'center'));

$row->addCell(3500, array('gridSpan' => 3, 'valign' => 'center'))->addText("INSCRIÇÃO MUNICIPAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 1, 'valign' => 'center'))->addText("$empresa->insc_municip", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("ENDEREÇO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$empresa->endereco", NULL, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("BAIRRO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("$empresa->bairro", NULL, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("CIDADE:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("$cidade->nome", NULL, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("UF:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText($estado->sigla, NULL, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("CEP:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'restart', 'valign' => 'center'))->addText("$empresa->cep", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("DISTRITO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$empresa->distrito", NULL, array('align' => 'center'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));
$row->addCell(3500, array('vMerge' => 'continue'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("TELEFONE:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 3, 'valign' => 'center'))->addText("$empresa->telefone", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("ENDEREÇO ELETRÔNICO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 4, 'valign' => 'center'))->addText("$empresa->email", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("ATIVIDADE ECONÔMICA PRINCIPAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 9, 'valign' => 'center'))->addText("$empresa->economica", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("CNAE:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 1, 'valign' => 'center'))->addText("$empresa->cnae", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("SEÇÃO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 1, 'valign' => 'center'))->addText("$empresa->secao", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("GRUPO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 1, 'valign' => 'center'))->addText("$empresa->grupo", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("GRAU DE RISCO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("$empresa->id_grau_risco", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$total_trabalhadores = $empresa->trab_admin + $empresa->trab_operac;
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("TOTAL DE TRABALHADORES:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$total_trabalhadores", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("SETOR ADMINISTRATIVO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("$empresa->trab_admin", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("SETOR OPERACIONAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$empresa->trab_operac", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("CARGA HORÁRIA SEMANAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("SETOR ADMINISTRATIVO:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("$empresa->carga_horaria_admin HORAS", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("SETOR OPERACIONAL:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 2, 'valign' => 'center'))->addText("$empresa->carga_horaria_operac HORAS", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('gridSpan' => 2, 'vMerge' => 'restart', 'valign' => 'center'))->addText("JORNADA DE TRABALHO
SEMANAL", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 4, 'valign' => 'center'))->addText("SETOR ADMINISTRATIVO", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 4, 'valign' => 'center'))->addText("SETOR OPERACIONAL", $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('gridSpan' => 2, 'vMerge' => 'continue', 'valign' => 'center'))->addText("CARGA HORÁRIA SEMANAL:", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 4, 'valign' => 'center'))->addText("$carga_admin->jornada", NULL, array('align' => 'center'));
$row->addCell(3500, array('gridSpan' => 4, 'valign' => 'center'))->addText("$carga_operac->jornada", NULL, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('gridSpan' => 2, 'vMerge' => 'continue', 'valign' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("ENTRADA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("SAÍDA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("ENTRADA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("SAÍDA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("ENTRADA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("SAÍDA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("ENTRADA", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("SAÍDA", $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('gridSpan' => 2, 'vMerge' => 'continue', 'valign' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_admin->entrada1", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_admin->saida1", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_admin->entrada2", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_admin->saida2", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_operac->entrada1", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_operac->saida1", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_operac->entrada2", NULL, array('align' => 'center'));
$row->addCell(3500, array('valign' => 'center'))->addText("$carga_operac->saida2", NULL, array('align' => 'center'));
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);


//1.1.	DADOS COMPLEMENTARES
//Titulo
$section->addTitle("DADOS COMPLEMENTARES", 2);

//Titulo
$section->addTitle("Descrição Detalhada da Função", 3);
$section->addTitle("Quadro 2: Descrição Detalhada da Função", 5);

$fontGhe = array('size' => 7);

//Tabelas ghe
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center', 'cellMargin' => 200));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(1000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("SETOR", $fontGhe, array('align' => 'center'));
$row->addCell(1000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("LOCAL", $fontGhe, array('align' => 'center'));
$row->addCell(1000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("CÓDIGO GHE", $fontGhe, array('align' => 'center'));
$row->addCell(1000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("FUNÇÃO/CARGO", $fontGhe, array('align' => 'center'));
$row->addCell(1000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("CBO", $fontGhe, array('align' => 'center'));
$row->addCell(1000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("QT", $fontGhe, array('align' => 'center'));
$row->addCell(8000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("DESCRIÇÃO DETALHADA DA FUNÇÃO", $fontGhe, array('align' => 'center'));

$lista_setor = $obj_setor->selecionarSetor();
foreach ($lista_setor as $setor) {
    $i = 0;
    $lista_local = $obj_local->selecionarLocal();
    foreach ($lista_local as $local) {
        $j = 0;
        $lista_ghe = $obj_ghe->selecionarGheWhereSetorLocal($setor->id, $local->id, $cnpj);
        foreach ($lista_ghe as $ghe) {
            $g = 0;
            //funções
            $lista_funcao_ghe = $obj_funcao_ghe->selecionarFuncaoGheWhereGhe($ghe->id);
            foreach ($lista_funcao_ghe as $funcao_ghe) {
                $lista_funcao = $obj_funcao->selecionarFuncaoWhere($funcao_ghe->id_funcao);
                foreach ($lista_funcao as $funcao) {
                }
                $row = $table->addRow(1000, array('cantSplit' => true));
                if ($i == 0) {
                    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr', 'vMerge' => 'restart'))->addText("$setor->nome", $fontGhe, array('align' => 'center'));
                    if ($j == 0) {
                        $row->addCell(2000, array('valign' => 'center', 'textDirection' => 'btLr', 'vMerge' => 'restart'))->addText("$local->nome", $fontGhe, array('align' => 'center'));
                        $j++;
                    } else {
                        $row->addCell(2000, array('valign' => 'center', 'textDirection' => 'btLr', 'vMerge' => 'continue'))->addText("$local->nome", $fontGhe, array('align' => 'center'));
                    }
                    if ($g == 0) {
                        $row->addCell(null, array('valign' => 'center', 'bgColor' => '#D3D3D3', 'textDirection' => 'btLr', 'vMerge' => 'restart'))->addText("$ghe->nome", $fontGhe, array('align' => 'center'));
                        $g++;
                    } else {
                        $row->addCell(null, array('valign' => 'center', 'bgColor' => '#D3D3D3', 'textDirection' => 'btLr', 'vMerge' => 'continue'))->addText("$ghe->nome", $fontGhe, array('align' => 'center'));
                    }
                    $i++;
                } else {
                    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr', 'vMerge' => 'continue'))->addText("$setor->nome", $fontGhe, array('align' => 'center'));
                    if ($j == 0) {
                        $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr', 'vMerge' => 'restart'))->addText("$local->nome", $fontGhe, array('align' => 'center'));
                        $j++;
                    } else {
                        $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr', 'vMerge' => 'continue'))->addText("$local->nome", $fontGhe, array('align' => 'center'));
                    }
                    if ($g == 0) {
                        $row->addCell(null, array('valign' => 'center', 'bgColor' => '#D3D3D3', 'textDirection' => 'btLr', 'vMerge' => 'restart'))->addText("$ghe->nome", $fontGhe, array('align' => 'center'));
                        $g++;
                    } else {
                        $row->addCell(null, array('valign' => 'center', 'bgColor' => '#D3D3D3', 'textDirection' => 'btLr', 'vMerge' => 'continue'))->addText("$ghe->nome", $fontGhe, array('align' => 'center'));
                    }
                }
                $row->addCell(null, array('valign' => 'center'))->addText("$funcao->nome", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$funcao->id_cbo", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$funcao_ghe->qt", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("Descrição Detalhada da Função: $funcao->descricao Responsabilidades do Cargo: $funcao_ghe->resp_cargo", $fontGhe, array('align' => 'both'));
            }
        }
    }
}
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);

$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));

//Titulo
$section->addTitle("Descrição Sumária das Instalações", 3);
$section->addTitle("Quadro 3: Descrição Sumária das Instalações", 5);

$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center',  'cellMargin' => 50));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(3500, array('valign' => 'center'))->addText("SETOR:", $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(5500, array('valign' => 'center'))->addText("DESCRIÇÃO DAS INSTALAÇÕES ESTRUTURAIS", NULL, array('align' => 'center'));

$lista_ghe = $obj_ghe->selecionarGheWhereEmpresa($cnpj);
foreach ($lista_ghe as $ghe) {
    $lista_setor = $obj_setor->selecionarSetorWhere($ghe->setor);
    foreach ($lista_setor as $setor) {
    }
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(3500, array('valign' => 'center', 'bgColor' => '#D3D3D3', 'textDirection' => 'btLr'))->addText("$setor->nome", $fancyTableFontStyle, array('align' => 'center'));
    $row->addCell(5500, array('valign' => 'center'))->addText("$ghe->desc_ambiente", NULL, array('align' => 'center'));
}
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);
