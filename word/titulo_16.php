<?php
$section->addPageBreak();
$section->addTitle("ANEXOS", 1);
$section->addTitle("ANEXO I - CÓPIA DO COMPROVANTE DE INSCRIÇÃO NO CNPJ", 2);
$section->addTitle("ANEXO II -RELATÓRIO TÉCNICO: Levantamento Ambiental de Concentrações de Substâncias Químicas na AGROAMBIENTAL CONSULTORIA E PROJETOS", 2);
$section->addTitle("ANEXO III - CERTIFICADO DE CALIBRAÇÃO DO DOSÍMETRO DE RUÍDO", 2);

//Texto
$myTextElement = $section->addText('Vale ressaltar que as dosimetrias foram realizadas com o instrumento - Dosímetro de Ruído Digital sem fio DOS-700, Audiodosímetro, da INSTRUTHERM -, Nº Série: 180308058. Data da Calibração: 12/08/2019.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Características do instrumento:', $fontStyle, $paragraphStyle);

//lista
$section->addListItem('3 (três) Dosímetros simultâneos (denominados D1, D2 e D3)', 0, $fontStyle, $bullet, $paragraphStyle);
$section->addListItem('Leitura das dosimetrias in loco', 0, $fontStyle, $bullet, $paragraphStyle);
$section->addListItem('Dez configurações de medição de dose padrão integradas:', 0, $fontStyle, $bullet, $paragraphStyle);

$myTextElement = $section->addText('O instrumento é ideal para monitoramento de exposição a ruído pessoal em conformidade com as normas ISO, OSHA, MSHA, DOD, ACGIH, NR e NHO.', $fontStyle, $paragraphStyle);

$section->addTitle("RELATÓRIOS DE DOSIMETRIA DE RUÍDO", 2);

$myTextElement = $section->addText('Vale ressaltar que as Dosimetrias de Ruído estão caracterizadas por GHE (Grupo Homogêneo de Exposição).', $fontStyle, $paragraphStyle);


//Funções para receber dados do BD
require_once('../classes/ghe.php');
$obj_ghe = new ghe();
$lista_ghe = $obj_ghe->selecionarGheWhereEmpresa($cnpj);
foreach ($lista_ghe as $ghe) {
    $lista_local = $obj_local->selecionarLocalWhere($ghe->local);
    foreach ($lista_local as $local) {
    }
    $lista_anexo = $obj_anexo->selecionarAnexoWhereGhe($ghe->id);
    foreach ($lista_anexo as $anexo) {
        $section->addTitle("$anexo->nome - $ghe->nome", 3);

        //funcao
        $lista_funcao = $obj_funcao->selecionarFuncaoWhere($anexo->id_funcao);
        foreach ($lista_funcao as $funcao) {
            $myTextElement = $section->addText("Local: $local->nome - Função: $funcao->nome", $fontStyle, $paragraphStyle);
        }
    }
}
