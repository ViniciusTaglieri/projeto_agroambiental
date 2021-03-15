<?php
$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));

$section->addTitle("INTRODUCAO", 1);

require_once('header.php');
require_once('footer.php');

//Texto
$myTextElement = $section->addText('As Normas Regulamentadoras (NR) são disposições complementares ao capítulo V da CLT, consistindo em obrigações, direitos e deveres a serem cumpridos por empregadores e trabalhadores com o objetivo de garantir trabalho seguro e sadio, prevenindo a ocorrência de doenças e acidentes de trabalho. A elaboração/revisão das NR’s é realizada pelo Ministério do Trabalho adotando o sistema tripartite paritário por meio de grupos e comissões compostas por representantes do governo, de empregadores e de empregados (ENIT, 2019).', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('O Programa de Prevenção de Riscos Ambientais - PPRA - foi instituído pela Portaria SST Nº 25, de 29 de dezembro de 1994. Sua fundamentação legal é amparada na Portaria Nº 3.214, de 08 de junho de 1978, que aprova as Normas Regulamentadoras - NR - do Capítulo V, Título II, da Consolidação das Leis do Trabalho, relativas à Segurança e Medicina do Trabalho e pela Lei Nº 6.514, de 22 de dezembro de 1977.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('A NR 9 (9.1.1) estabelece a obrigatoriedade da elaboração e implementação do PPRA, por parte de todos os empregadores e instituições que admitam trabalhadores como empregados, visando à preservação da saúde e a integridade dos trabalhadores através da antecipação, reconhecimento, avaliação e consequente controle da ocorrência de riscos ambientais existentes ou que venham a existir no ambiente de trabalho, tendo em consideração a proteção do meio ambiente e dos recursos naturais.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('As ações do PPRA devem ser desenvolvidas no âmbito de cada estabelecimento da empresa, sob a responsabilidade do empregador, com a participação dos trabalhadores, sendo sua abrangência e profundidade dependentes das características dos riscos e das necessidades de controle (NR 9, 9.1.2).', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('A responsabilidade pela implantação e implementação do PPRA na empresa ' . $empresa->razao_social . ' é do empregador: ' . $empresa->razao_social . '.', $fontStyle, array('LineHeight' => 1.15));
