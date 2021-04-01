<?php
$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setOrientation('portrait');

//Titulo
$section->addTitle("INVENTÁRIO DE RISCOS E MEDIDAS DE CONTROLE Vs GHE", 1);

$myTextElement = $section->addText('Nas Tabelas, a seguir, observamos os seguintes itens, quando aplicáveis: a identificação do risco, ou seja, o agente de risco; as possíveis fontes geradoras; meios de propagação no ambiente laboral; identificação da função e determinação do número de trabalhadores expostos; caracterização das atividades; tipo de exposição; possíveis danos à saúde; descrição das medidas de controle; EPI recomendado (s).', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Salienta-se, que nestas Tabelas, os riscos ambientais estão categorizados por GHE - Grupo Homogêneo de Exposição.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('QUANTO ÀS ABREVIATURAS UTILIZADAS NAS TABELAS DESTA SEÇÃO', array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.5, 'alignment' => 'center'));

$myTextElement = $section->addText('Faz-se necessário ressaltar que nas Tabelas, desta seção, foram utilizadas algumas abreviaturas. A saber: GHE - Grupo Homogêneo de Exposição; CH - Carga Horária; CBO - Classificação Brasileira de Ocupações; LT - Limite de Tolerância; P -  Probabilidade; S - Severidade; PAIRO - Perda Auditiva Induzida por Ruído Ocupacional; TWA - Média Ponderada do Tempo; NEN - Nível de Exposição Normalizado; N/A - Não Aplicável; PPM - Partícula por Milhão; ND - Abaixo do Limite de Detecção do Método Analítico Utilizado; *Limite de Tolerância da ACGIH; ACGIH - American Conference of Governmental Industrial Hygienist; NIOSH - National Institute for Occupational Safetyand Health; NHO - Normas de Higiene Ocupacional. ', $fontStyle, $paragraphStyle);

// Nova seção de paisagem
$section = $phpWord->addSection(array('orientation' => 'landscape'));
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));

//Funções para receber dados do BD
require_once('../classes/ghe.php');
$obj_ghe = new ghe();
$lista = $obj_ghe->selecionarGheWhereEmpresa($cnpj);
$list = 0;
foreach ($lista as $ghe) {
    $list++;
    $lista_setor = $obj_setor->selecionarSetorWhere($ghe->setor);
    foreach ($lista_setor as $setor) {
    }
    $lista_local = $obj_local->selecionarLocalWhere($ghe->local);
    foreach ($lista_local as $local) {
    }
    $lista_carga_horaria = $obj_carga_horaria->selecionarCargaHorariaWhere($ghe->carga_horaria);
    foreach ($lista_carga_horaria as $carga_horaria) {
    }
    $lista_medidas_controle = $obj_medidas_controle->selecionarMedidasControleWhereGhe($ghe->id);
    foreach ($lista_medidas_controle as $medidas_controle) {
    }

    //Titulo
    $section->addTitle("GHE: $ghe->nome - SETOR $setor->nome - Local: $local->nome", 2);
    $section->addTitle("Tabela $list: GHE: $ghe->nome - SETOR $setor->nome - Local: $local->nome", 6);
    $fontGhe = array('size' => 7);

    //Tabelas ghe
    $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("SETOR $setor->nome - LOCAL: $local->nome", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("GHE: $ghe->nome", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("Razão Social: $empresa->razao_social", $fontGhe, array('align' => 'center'));

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 3, 'valign' => 'center'))->addText("JORNADA DE TRABALHO:  $carga_horaria->jornada", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 3, 'valign' => 'center'))->addText("CARGA HORÁRIA SEMANAL - CH: $carga_horaria->horas horas", $fontGhe, array('align' => 'center'));

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 6, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("DESCRIÇÃO DO AMBIENTE DE TRABALHO", $fontGhe, array('align' => 'center'));

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 6, 'valign' => 'center'))->addText("$ghe->desc_ambiente", $fontGhe, array('align' => 'center'));


    //funções
    $lista_funcao_ghe = $obj_funcao_ghe->selecionarFuncaoGheWhereGhe($ghe->id);
    foreach ($lista_funcao_ghe as $funcao_ghe) {
        $lista_funcao = $obj_funcao->selecionarFuncaoWhere($funcao_ghe->id_funcao);
        foreach ($lista_funcao as $funcao) {
        }
        $row = $table->addRow(null, array('cantSplit' => true));
        $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("FUNÇÃO: $funcao->nome", $fontGhe, array('align' => 'center'));
        $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("QUANTIDADE DE TRABALHADORES EXPOSTOS: $funcao_ghe->qt", $fontGhe, array('align' => 'center'));
        $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("CBO: $funcao->id_cbo   ", $fontGhe, array('align' => 'center'));
        $row = $table->addRow(null, array('cantSplit' => true));
        $row->addCell(null, array('gridSpan' => 6, 'valign' => 'center'))->addText("Descrição Detalhada da Função: $funcao->descricao Responsabilidades do Cargo: $funcao_ghe->resp_cargo", $fontGhe, array('align' => 'center'));
    }

    //inventario de riscos
    $section->addTextBreak();
    $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("INVENTÁRIO DE RISCOS", $fontGhe, array('align' => 'center'));

    $row = $table->addRow(null, array('cantSplit' => true));

    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("NATUREZA DO RISCO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("AGENTE", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("FONTE GERADORA", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("PROPAGAÇÃO DO AGENTE", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("POSSÍVEIS DANOS À SAÚDE", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center'))->addText("TIPO DE AVALIAÇÃO/TIPO DE EXPOSIÇÃO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("METODOLOGIA APLICADA", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("INTENSIDADE CONCENTRAÇÃO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("LIMITE DE TOLERÂNCIA", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("VIDE ANEXO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("*CATEGORIA RISCO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("**CATEGORIA PROTEÇÃO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("***CATEGORIA TEMPO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center', 'textDirection' => 'btLr'))->addText("ÍNDICE DE EXPOSIÇÃO", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center'))->addText("GRAU DE RISCO P X S", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('valign' => 'center'))->addText("Código e-Social/Anexo I dos Leiautes do e-Social versão 2.5 (consolidada até NT 18/2020) - Tabelas", $fontGhe, array('align' => 'center'));

    //dados inventario de risco
    $lista_inventario = $obj_inventario->selecionarInventarioWhereGhe($ghe->id);
    foreach ($lista_inventario as $inventario) {
        if ($inventario->natureza == "Físico") {
            $fisicos[] = $inventario->id;
        } else if ($inventario->natureza == "Químico") {
            $quimicos[] = $inventario->id;
        } else if ($inventario->natureza == "Biológico") {
            $biologicos[] = $inventario->id;
        } else if ($inventario->natureza == "Ergonômico") {
            $ergonomicos[] = $inventario->id;
        } else {
            $mecanicos[] = $inventario->id;
        }
    }

    // fisico
    for ($i = 0; $i < count($fisicos); $i++) {
        $lista_fisicos = $obj_inventario->selecionarInventarioWhere($fisicos[$i]);
        foreach ($lista_fisicos as $fisico) {
            $row = $table->addRow(null, array('cantSplit' => true));
            if ($fisico->fonte_geradora == NULL) {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Físico", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("Ausência de Fator de Risco", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center', 'gridSpan' => 7))->addText("INEXISTENTE DE ACORDO COM AVALIAÇÃO QUALITATIVA – NR 15 – ANEXO 11, ANEXO 12, ANEXO 13", $fontGhe, array('align' => 'center'));
            } else {
                if ($i == 0) {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Físico", $fontGhe, array('align' => 'center'));
                } else {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'continue'));
                }
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->agente", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->fonte_geradora", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->propagacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->danos_saude", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->avaliacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->metodologia", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->intensidade", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$fisico->tolerancia", $fontGhe, array('align' => 'center'));
            }
            $row->addCell(null, array('valign' => 'center'))->addText("$fisico->anexo", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$fisico->risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$fisico->protecao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$fisico->tempo", $fontGhe, array('align' => 'center'));

            $exposicao = (int)$fisico->risco + (int)$fisico->protecao + (int)$fisico->tempo;

            $row->addCell(null, array('valign' => 'center'))->addText("$exposicao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$fisico->grau_risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$fisico->codigo", $fontGhe, array('align' => 'center'));
        }
    }

    //quimico
    for ($i = 0; $i < count($quimicos); $i++) {
        $lista_quimicos = $obj_inventario->selecionarInventarioWhere($quimicos[$i]);
        foreach ($lista_quimicos as $quimico) {
            // quimico
            $row = $table->addRow(null, array('cantSplit' => true));
            if ($quimico->agente == NULL) {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Químico", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("Ausência de Fator de Risco", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center', 'gridSpan' => 7))->addText("$quimico->fonte_geradora", $fontGhe, array('align' => 'center'));
            } else {
                if ($i == 0) {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Físico", $fontGhe, array('align' => 'center'));
                } else {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'continue'));
                }
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->agente", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->fonte_geradora", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->propagacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->danos_saude", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->avaliacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->metodologia", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->intensidade", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$quimico->tolerancia", $fontGhe, array('align' => 'center'));
            }
            $row->addCell(null, array('valign' => 'center'))->addText("$quimico->anexo", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$quimico->risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$quimico->protecao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$quimico->tempo", $fontGhe, array('align' => 'center'));

            $exposicao = (int)$quimico->risco + (int)$quimico->protecao + (int)$quimico->tempo;

            $row->addCell(null, array('valign' => 'center'))->addText("$exposicao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$quimico->grau_risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$quimico->codigo", $fontGhe, array('align' => 'center'));
        }
    }

    // biologico
    for ($i = 0; $i < count($biologicos); $i++) {
        $lista_biologicos = $obj_inventario->selecionarInventarioWhere($biologicos[$i]);
        foreach ($lista_biologicos as $biologico) {
            // biologico
            $row = $table->addRow(null, array('cantSplit' => true));
            if ($biologico->agente == NULL) {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Químico", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("Ausência de Fator de Risco", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center', 'gridSpan' => 7))->addText("$biologico->fonte_geradora", $fontGhe, array('align' => 'center'));
            } else {
                if ($i == 0) {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Físico", $fontGhe, array('align' => 'center'));
                } else {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'continue'));
                }
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->agente", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->fonte_geradora", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->propagacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->danos_saude", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->avaliacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->metodologia", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->intensidade", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$biologico->tolerancia", $fontGhe, array('align' => 'center'));
            }
            $row->addCell(null, array('valign' => 'center'))->addText("$biologico->anexo", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$biologico->risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$biologico->protecao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$biologico->tempo", $fontGhe, array('align' => 'center'));

            $exposicao = (int)$biologico->risco + (int)$biologico->protecao + (int)$biologico->tempo;

            $row->addCell(null, array('valign' => 'center'))->addText("$exposicao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$biologico->grau_risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$biologico->codigo", $fontGhe, array('align' => 'center'));
        }
    }

    // ergonomico
    for ($i = 0; $i < count($ergonomicos); $i++) {
        $lista_ergonomicos = $obj_inventario->selecionarInventarioWhere($ergonomicos[$i]);
        foreach ($lista_ergonomicos as $ergonomico) {
            // ergonomico
            $row = $table->addRow(null, array('cantSplit' => true));
            if ($ergonomico->agente == NULL) {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Químico", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("Ausência de Fator de Risco", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center', 'gridSpan' => 7))->addText("$ergonomico->fonte_geradora", $fontGhe, array('align' => 'center'));
            } else {
                if ($i == 0) {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Físico", $fontGhe, array('align' => 'center'));
                } else {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'continue'));
                }
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->agente", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->fonte_geradora", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->propagacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->danos_saude", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->avaliacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->metodologia", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->intensidade", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->tolerancia", $fontGhe, array('align' => 'center'));
            }
            $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->anexo", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->protecao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->tempo", $fontGhe, array('align' => 'center'));

            $exposicao = (int)$ergonomico->risco + (int)$ergonomico->protecao + (int)$ergonomico->tempo;

            $row->addCell(null, array('valign' => 'center'))->addText("$exposicao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->grau_risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$ergonomico->codigo", $fontGhe, array('align' => 'center'));
        }
    }

    // mecanicos
    for ($i = 0; $i < count($mecanicos); $i++) {
        $lista_mecanicos = $obj_inventario->selecionarInventarioWhere($mecanicos[$i]);
        foreach ($lista_mecanicos as $mecanico) {
            // mecanicos
            $row = $table->addRow(null, array('cantSplit' => true));
            if ($mecanico->agente == NULL) {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Químico", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("Ausência de Fator de Risco", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center', 'gridSpan' => 7))->addText("$mecanico->fonte_geradora", $fontGhe, array('align' => 'center'));
            } else {
                if ($i == 0) {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart'))->addText("Físico", $fontGhe, array('align' => 'center'));
                } else {
                    $row->addCell(null, array('valign' => 'center', 'vMerge' => 'continue'));
                }
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->agente", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->fonte_geradora", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->propagacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->danos_saude", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->avaliacao", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->metodologia", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->intensidade", $fontGhe, array('align' => 'center'));
                $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->tolerancia", $fontGhe, array('align' => 'center'));
            }
            $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->anexo", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->protecao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->tempo", $fontGhe, array('align' => 'center'));

            $exposicao = (int)$mecanico->risco + (int)$mecanico->protecao + (int)$mecanico->tempo;

            $row->addCell(null, array('valign' => 'center'))->addText("$exposicao", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->grau_risco", $fontGhe, array('align' => 'center'));
            $row->addCell(null, array('valign' => 'center'))->addText("$mecanico->codigo", $fontGhe, array('align' => 'center'));
        }
    }

    //classificação do indice de exposição
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText("CLASSIFICAÇÃO DO ÍNDICE DE EXPOSIÇÃO - IE:", $fontGhe, array('align' => 'center'));

    //1
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 6, 'valign' => 'center'))->addText("
    * 1 - Irrelevante - Abaixo do NA / Simples Exposição / Inexistente
    ", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 5, 'valign' => 'center'))->addText("
    ** 1 - Exposição com proteção - Eficaz ou Desnecessária
    ", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 5, 'valign' => 'center'))->addText("
    *** 1 - Exposição Eventual ou Sem Risco menor que 30 minutos / dia 
    ", $fontGhe, array('align' => 'center'));


    //2
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 6, 'valign' => 'center'))->addText("
    * 2 - Atenção - Acima do NA e abaixo do LT / Concentração Desconhecida / Não quantificado 
    ", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 5, 'valign' => 'center'))->addText("
    ** 2 - Exposição com proteção - Eficiente / Duvidosa 
    ", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 5, 'valign' => 'center'))->addText("
    *** 2 - Exposição Intermitente maior que 30 minutos menor que 400 minutos / dia 
    ", $fontGhe, array('align' => 'center'));


    //3
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 6, 'valign' => 'center'))->addText("
    * 3 - Crítico - Acima do LT
    ", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 5, 'valign' => 'center'))->addText("
    ** 3 - Exposição com proteção – Ineficiente ou Não utilizada 
    ", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 5, 'valign' => 'center'))->addText("
    *** 3 - Exposição Permanente maior que 400 minutos / dia
    ", $fontGhe, array('align' => 'center'));

    // //legenda
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 4, 'valign' => 'center'))->addText("Legenda", array('bold' => true, 'size' => 7), array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 4, 'valign' => 'center'))->addText("IDEAL (pontuação de 1 a 5)", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 4, 'valign' => 'center'))->addText("ATENÇÃO NECESSÁRIA (6 a 7)", $fontGhe, array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 4, 'valign' => 'center'))->addText("ATENÇÃO IMEDIATA (8 a 9)", $fontGhe, array('align' => 'center'));

    $section->addTextBreak();

    //medidas de controle recomendadas
    $table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center', 'bgColor' => 'd3d3d3'))->addText("MEDIDAS DE CONTROLE RECOMENDADAS", array('bold' => true, 'size' => 7), array('align' => 'center'));

    //medidas de controle local
    $lista_titulo = $obj_medidas->selecionarTituloWhereLocal($local->id);
    foreach ($lista_titulo as $titulo) {
        $row = $table->addRow(null, array('cantSplit' => true));
        $lista_descricao = $obj_medidas->selecionarDescricaoWhereTitulo($titulo->id);
        foreach ($lista_descricao as $key => $descricao) {
            if ($key == 0) {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'restart', 'gridSpan' => 2))->addText("$titulo->titulo", $fontGhe, array('align' => 'center'));
            } else {
                $row->addCell(null, array('valign' => 'center', 'vMerge' => 'continue', 'gridSpan' => 2));
            }
            $row->addCell(null, array('gridSpan' => 14, 'valign' => 'center'))->addText("$descricao->descricao", $fontGhe, array('align' => 'center'));
        }
    }

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("EPC - EQUIPAMENTO DE PROTEÇÃO COLETIVA - EXISTENTE", array('bold' => true, 'size' => 7), array('align' => 'center'));

    // epi
    $lista_tituloEpi = $obj_epi_epc->selecionarTituloEpiWhereLocal($local->id);
    foreach ($lista_tituloEpi as $tituloEpi) {
        $row = $table->addRow(null, array('cantSplit' => true));
        $lista_descricao = $obj_epi_epc->selecionarDescricaoWhereTituloEpi($tituloEpi->id);
        $row->addCell(null, array('valign' => 'center', 'gridSpan' => 16))->addText("$tituloEpi->titulo", array('bold' => true, 'name' => 'arial', 'size' => 7), array('align' => 'center'));
        foreach ($lista_descricao as $key => $descricao) {
            $row = $table->addRow(null, array('cantSplit' => true));
            $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("$descricao->descricao", $fontGhe, array('align' => 'center'));
        }
    }

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("EPI - EQUIPAMENTO DE PROTEÇÃO INDIVIDUAL - RECOMENDADO", array('bold' => true, 'size' => 7), array('align' => 'center'));
    // epc
    $lista_tituloEpc = $obj_epi_epc->selecionarTituloEpcWhereLocal($local->id);
    foreach ($lista_tituloEpc as $tituloEpc) {
        $row = $table->addRow(null, array('cantSplit' => true));
        $lista_descricao = $obj_epi_epc->selecionarDescricaoWhereTituloEpc($tituloEpc->id);
        $row->addCell(null, array('valign' => 'center', 'gridSpan' => 16))->addText("$tituloEpc->titulo", array('bold' => true, 'name' => 'arial', 'size' => 7), array('align' => 'center'));
        foreach ($lista_descricao as $key => $descricao) {
            $row = $table->addRow(null, array('cantSplit' => true));
            $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("$descricao->descricao", $fontGhe, array('align' => 'center'));
        }
    }

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("PARECER TÉCNICO", array('bold' => true, 'size' => 7), array('align' => 'center'));

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("
    De acordo com o Art. 191 da CLT – Consolidação das Leis do Trabalho: 
    ", $fontGhe, array('align' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("
    A eliminação ou a neutralização da insalubridade ocorrerá: 
    ", $fontGhe, array('align' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("
    I - Com a adoção de medidas que conservem o ambiente de trabalho dentro dos limites de tolerância; 
    ", $fontGhe, array('align' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 16, 'valign' => 'center'))->addText("
    II - Com a utilização de equipamentos de proteção individual ao trabalhador, que diminuam a intensidade do agente agressivo a limites de tolerância. 
    ", $fontGhe, array('align' => 'center'));

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("INSALUBRIDADE", array('bold' => true, 'size' => 7), array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("PERICULOSIDADE", array('bold' => true, 'size' => 7), array('align' => 'center'));
    $row = $table->addRow(null, array('cantSplit' => true));

    if ($medidas_controle->insalubridade == 0) {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Conforme NR-15 e Anexos, avaliada a função e condições de trabalho. Não constatado indício de exposição a agente de natureza física, química e biológica que por sua intensidade, duração e frequência permita o enquadramento na NR-15. Concluímos que a atividade deve ser considerada: NÃO INSALUBRE. Portanto, os trabalhadores não fazem jus ao Adicional de Insalubridade.", $fontGhe, array('align' => 'center'));
    } else {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Conforme NR-15 e Anexos, avaliada a função e condições de trabalho. Constatado indício de exposição a agente de natureza física, química e biológica que por sua intensidade, duração e frequência permita o enquadramento na NR-15. Concluímos que a atividade deve ser considerada: INSALUBRE. Portanto, os trabalhadores fazem jus ao Adicional de Insalubridade.", $fontGhe, array('align' => 'center'));
    }
    if ($medidas_controle->periculosidade == 0) {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Conforme NR-16 e Anexos, avaliada a função e condições de trabalho. Não foram encontradas condições para o enquadramento de atividade e operações perigosas. Concluímos que a atividade deve ser considerada: NÃO PERICULOSA. Portanto, os trabalhadores não fazem jus ao Adicional de Periculosidade.", $fontGhe, array('align' => 'center'));
    } else {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Conforme NR-16 e Anexos, avaliada a função e condições de trabalho. Foram encontradas condições para o enquadramento de atividade e operações perigosas. Concluímos que a atividade deve ser considerada: PERICULOSA. Portanto, os trabalhadores fazem jus ao Adicional de Periculosidade.", $fontGhe, array('align' => 'center'));
    }

    $row = $table->addRow(null, array('cantSplit' => true));
    if ($medidas_controle->insalubridade == 0) {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Adicional de Insalubridade: (   ) Sim   (  X  ) Não", $fontGhe, array('align' => 'center'));
    } else {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Adicional de Insalubridade: (  X  ) Sim   (   ) Não", $fontGhe, array('align' => 'center'));
    }

    if ($medidas_controle->periculosidade == 0) {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Adicional de Insalubridade: (   ) Sim   (  X  ) Não", $fontGhe, array('align' => 'center'));
    } else {
        $row->addCell(null, array('gridSpan' => 8, 'valign' => 'center'))->addText("Adicional de Insalubridade: (  X  ) Sim   (   ) Não", $fontGhe, array('align' => 'center'));
    }

    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText("OBSERVAÇÃO", array('name' => 'arial', 'size' => 7, 'color' => '#ff0000'), array('align' => 'center'));
    $row->addCell(null, array('gridSpan' => 14, 'valign' => 'center'))->addText("A caracterização descrita acima - neste Parecer - é válida somente, enquanto as condições de trabalho permanecerem com aquelas observadas e informadas durante os levantamento in loco.", $fontGhe, array('align' => 'center'));

    $section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);

    $section->addPageBreak();
}
