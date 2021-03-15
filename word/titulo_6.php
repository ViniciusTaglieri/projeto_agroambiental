<?php
//Titulo
$section->addTitle("DO DESENVOLVIMENTO DO PPRA", 1);

$myTextElement = $section->addText('Conforme a NR 9, subitem 9.3.1: o PPRA deverá incluir as seguintes etapas: antecipação e reconhecimentos dos riscos; estabelecimento de prioridades e metas de avaliação e controle; avaliação dos riscos e da exposição dos trabalhadores; implantação de medidas de controle e avaliação de sua eficácia; monitoramento da exposição aos riscos; registro e divulgação dos dados. ', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Desse modo, em conformidade com a NR 9, o PPRA é desenvolvido em três etapas. Sabe-se que as etapas são segmentadas no tempo, quando de suas implantações, contudo, com o avanço do PPRA elas tendem a se tornar causa-efeito, entrando em um ciclo fechado de desenvolvimento.', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("PRIMEIRA ETAPA: antecipação e reconhecimento dos riscos ambientais", 2);

//Texto
$myTextElement = $section->addText('A fase de antecipação dos riscos deverá envolver a análise de projetos de novas instalações, métodos ou processos de trabalho, ou de modificação dos já existentes; visando identificar os riscos potenciais e introduzir medidas de proteção para sua redução ou eliminação.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('A fase de reconhecimento dos riscos deverá conter os seguintes itens, quando aplicáveis: a sua identificação; a determinação e localização das possíveis fontes geradoras; a identificação das possíveis trajetórias e dos meios de propagação dos agentes no ambiente de trabalho; a identificação das funções e determinação do número de trabalhadores expostos; a caracterização das atividades e do tipo da exposição; a obtenção de dados existentes na empresa, indicativos de possível comprometimento da saúde decorrente do trabalho; os possíveis danos à saúde relacionados aos riscos identificados, disponíveis na literatura técnica; a descrição das medidas de controle já existentes.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Caracterização Básica do Ambiente Laboral', array('name' => 'arial', 'size' => 12, 'bold' => true), $paragraphStyle);

//Texto
$myTextElement = $section->addText('Para efeito desta ‘Caracterização Básica’, considera-se como ambiente laboral as instalações da empresa ' . $empresa->razao_social . ', onde os trabalhadores realizam suas atividades laborais.', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("SEGUNDA ETAPA: avaliação e monitoração da exposição dos trabalhadores", 2);

//Texto
$myTextElement = $section->addText('Nesta etapa, sempre que necessário, deverá ser realizada a avaliação quantitativa para: comprovar o controle da exposição ou a inexistência riscos identificados na etapa de reconhecimento; dimensionar a exposição dos trabalhadores; subsidiar o equacionamento das medidas de controle; monitorar a avaliação da eficácia das medidas implementadas.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Do mesmo modo, [...] as ações devem incluir o monitoramento periódico da exposição, a informação aos trabalhadores e o controle médico. Sempre que necessário, para o monitoramento da exposição dos trabalhadores e das medidas de controle, deverá ser realizada uma avaliação sistemática e repetitiva da exposição a um dado risco; visando à introdução ou modificação das medidas de controle (NR 9).', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("TERCEIRA ETAPA: estabelecimento de prioridade de ação e medidas de controle", 2);

//Texto
$myTextElement = $section->addText('O estabelecimento da prioridade será caracterizado de acordo com a categoria de risco e índice de exposição.', $fontStyle, $paragraphStyle);

//Texto
$myTextElement = $section->addText('As medidas de controle deverão ser adotadas as medidas necessárias e suficientes para a eliminação, a minimização ou o controle dos riscos ambientais; sempre que forem verificadas uma ou mais das seguintes situações: identificação, na fase de antecipação, de risco potencial à saúde; constatação, na fase de reconhecimento de risco evidente à saúde; quando os resultados das avaliações quantitativas da exposição dos trabalhadores excederem os valores dos limites previstos na NR 15 ou, na ausência destes, os valores limites de exposição ocupacional adotados pela American Conference of Governmental Industrial Higyenists-ACGIH, ou aqueles que venham a ser estabelecidos em negociação coletiva de trabalho, desde que mais rigorosos do que os critérios técnico-legais estabelecidos; quando, através do controle médico da saúde, ficar caracterizado o nexo causal entre danos observados na saúde os trabalhadores e a situação de trabalho a que eles ficam expostos.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('De acordo com a NR 9, subitem 9.3.5.4: Quando comprovado pelo empregador e/ou instituição a inviabilidade técnica da adoção de medidas de proteção coletiva ou quando estas não forem suficientes ou encontrarem-se em fase de estudo, planejamento ou implantação, ou ainda em caráter complementar ou emergencial, deverão ser adotadas outras medidas, obedecendo-se à seguinte hierarquia:', $fontStyle, $paragraphStyle);

// Lists
$section->addListItem('Medidas de caráter administrativo ou de organização do trabalho;', 0, $fontStyle, $multilevelNumberingStyleName, $paragraphStyle);
$section->addListItem('Utilização de Equipamento de Proteção Individual - EPI.', 0, $fontStyle, $multilevelNumberingStyleName, $paragraphStyle);
