<?php
//Titulo
$section->addTitle("ESTRATÉGIA E METODOLOGIA DE AÇÃO", 1);

$myTextElement = $section->addText('Vale ressaltar que para levantamento dos dados foram realizadas visitas in loco, assim como, utilizadas estratégias de evidências, em que foram consideradas, a participação da alta direção da Empresa; as reuniões de planejamento; o confronto de relatos dos trabalhadores.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('O processo de avaliação dos riscos ambientais, quando necessárias, deverão ser utilizadas as Normas do Ministério do Trabalho e Emprego, as Normas de Higiene Ocupacional - NHO, da FUNDACENTRO (Fundação Jorge Duprat Figueiredo de Segurança e Medicina do Trabalho) e as Normas da ABNT (Associação Brasileira de Normas Técnicas), utilizadas em Higiene Ocupacional.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('O método de avaliação dos agentes ambientais e os equipamentos recomendados a serem utilizados do ponto de vista do Programa de Prevenção de Riscos Ambientais apresentam-se mencionados no Quadro abaixo:', $fontStyle, $paragraphStyle);

//Programa de Prevenção de Riscos Ambientais 
$table = $section->addTable($fancyTableStyleName);
$table->addRow(null, array('cantSplit' => true));
$table->addCell(2000, $fancyTableCellStyle)->addText('AGENTE', $fancyTableFontStyle, array('align' => 'center'));
$table->addCell(2000, $fancyTableCellStyle)->addText('NORMA', $fancyTableFontStyle, array('align' => 'center'));
$table->addCell(2000, $fancyTableCellStyle)->addText('METODOLOGIA', $fancyTableFontStyle, array('align' => 'center'));
$table->addCell(2000, $fancyTableCellStyle)->addText('EQUIPAMENTO', $fancyTableFontStyle, array('align' => 'center'));

require_once('../classes/agentes_ambientais.php');
$agentes = new Agentes();
for ($i = 0; $i < count($agentes_ambientais); $i++) {
    $lista = $agentes->selecionarAgentesWhere($agentes_ambientais[$i]);
    foreach ($lista as $agente) {
        $table->addRow(null, array('cantSplit' => true));
        $table->addCell(null, $fancyTableCellStyle)->addText("$agente->agente", null, array('align' => 'center', 'spaceAfter' => 0));
        $table->addCell(null, $fancyTableCellStyle)->addText("$agente->norma", null, array('align' => 'center', 'spaceAfter' => 0));
        $table->addCell(null, $fancyTableCellStyle)->addText("$agente->metodologia", null, array('align' => 'center', 'spaceAfter' => 0));
        $table->addCell(null, $fancyTableCellStyle)->addText("$agente->equipamento", null, array('align' => 'center', 'spaceAfter' => 0));
    }
}

//Subtitulo
$section->addTitle("COLETA DE DADOS", 2);

$myTextElement = $section->addText('A coleta de dados foi realizada in loco. Adotou-se estratégias evidentes em que foram consideradas a participação da direção da Empresa; reuniões de planejamento; confronto de relatos dos trabalhadores. A Empresa forneceu outras informações de caráter administrativo, tais como: jornada de trabalho; função do trabalhador; descrição das atividades por função; quantidade de trabalhador por função; CBO - Classificação Brasileira de Ocupações. Os resultados obtidos na coleta de dados estão registrados, neste documento, e, expressam a realidade do momento da inspeção.', $fontStyle, $paragraphStyle);

//Subtitulo
$section->addTitle("PARA CLASSIFICAÇÃO DO RISCO X GHE", 2);

//texto
$myTextElement = $section->addText('Ressalta-se que os riscos ambientais serão categorizados por GHE - Grupo Homogêneo de Exposição. A saber, o GHE corresponde a um grupo de trabalhadores com exposição semelhante, de forma que o resultado fornecido pela avaliação da exposição de qualquer trabalhador do grupo seja representativo da exposição do restante dos trabalhadores do mesmo grupo.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Para definição do GHE são consideradas como características: Tempo de exposição, Local de trabalho (áreas e setores), Período de trabalho, Cargos e funções ocupadas, Tarefas e atividades executadas, Agentes agressivos e Frequência do trabalho: repetitivo (rotina) e não repetitivo (situações esporádicas).', $fontStyle, $paragraphStyle);

//Subtitulo
$section->addTitle("CRITÉRIO A UTILIZAR SOMENTE DIANTE DA INCERTEZA DA AVALIAÇÃO DO RISCO", 2);

//texto
$myTextElement = $section->addText('A priori, ressalta-se que o presente critério - para avaliar a incerteza da avaliação do risco - somente será utilizado, neste PPRA, acaso surgir a hipótese de incerteza da avaliação do risco. Caso contrário, não será utilizado.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Estimar a incerteza da avaliação do risco, por julgamento profissional, tendo como base as informações relevantes disponíveis e os critérios do Quadro abaixo, denominado: ‘Critérios para Avaliar a Incerteza da Avaliação do Risco’.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('O critério é baseado na incerteza da avaliação do risco. Registrar nos campos correspondentes o índice 0 para certa, 1 para incerta ou 2 se a avaliação feita for considerada altamente incerta.', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("Informações Relevantes para Julgar a Incerteza", 3);
$section->addTitle("Quadro 4: Critérios para Avaliar a Incerteza da Avaliação do Risco", 5);

//texto
$myTextElement = $section->addText('- A atividade foi observada?', $fontStyle, $paragraphStyle);
$myTextElement = $section->addText('- Há limites de exposição ocupacional (LEO) bem estabelecidos?', $fontStyle, $paragraphStyle);
$myTextElement = $section->addText('- Frequência e duração das atividades são conhecidas?', $fontStyle, $paragraphStyle);
$myTextElement = $section->addText('- Informações sobre a variabilidade das exposições são disponíveis?', $fontStyle, $paragraphStyle);
$myTextElement = $section->addText('- Existem informações sobre como as práticas de trabalho contribuem para as exposições?
', $fontStyle, $paragraphStyle);
$myTextElement = $section->addText('De acordo com as respostas, define-se a incerteza conforme o critério no Quadro abaixo:', $fontStyle, $paragraphStyle);

//quadro 4
//Programa de Prevenção de Riscos Ambientais 
$table = $section->addTable($fancyTableStyleName);
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 4, 'valign' => 'center'))->addText('CRITÉRIOS PARA AVALIAR A INCERTEZA DA AVALIAÇÃO DO RISCO', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('INCERTEZA', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('DESCRIÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('CRITÉRIOS', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('0', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('CERTA - A estimativa da probabilidade e os danos à saúde são conhecidos e bem compreendidos. O avaliador tem confiança na aceitabilidade do julgamento.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Estimativa baseada em dados quantitativos confiáveis para agentes cujos efeitos à saúde são bem conhecidos ou dados qualitativos objetivos.', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('1', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('INCERTEZA - Existe informação suficiente para fazer um julgamento, mas a obtenção de informações adicionais é desejável para avaliar a exposição.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Estimativa da exposição feita com base em modelagem ou analogia com ambientes semelhantes para os quais existem dados seguros ou medições de caráter exploratório.', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('2', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('ALTAMENTE INCERTA - O julgamento da aceitabilidade foi feito na ausência de informação significativa sobre os perfis de exposição e/ou efeitos sobre a saúde.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('A estimativa da exposição foi feita apenas com base em dados qualitativos subjetivos ou os efeitos nocivos sobre a saúde ainda não estão suficientemente claros.', null, array('align' => 'center'));
$section->addText("Fonte: SESI, 2012", $fontStyle, $paragraphStyle);

//Subtitulo
$section->addTitle("PARA CLASSIFICAÇÃO DA FREQUÊNCIA DE EXPOSIÇÃO", 2);

//texto
$myTextElement = $section->addText('Para classificar os riscos ambientais quanto à frequência de exposição do trabalhador, serão utilizadas as seguintes categorias: eventual, permanente, intermitente.
A saber:', $fontStyle, $paragraphStyle);

// Lists
$section->addListItem('Eventual: até 30 minutos por dia');
$section->addListItem('Intermitente: até 400 minutos por dia');
$section->addListItem('Permanente: acima de 400 minutos por dia – “Contínuo ou Habitual”.');

//Subtitulo
$section->addTitle("PARA CLASSIFICAÇÃO DO ÍNDICE DE EXPOSIÇÃO - IE", 2);

//texto
$myTextElement = $section->addText('O Índice de Exposição - IE - é um indicativo que expressa a potencialidade do comprometimento da saúde do trabalhador frente às condições laborativas existentes. É obtido por meio da soma aritmética entre as Categorias Risco; Proteção; Tempo. Cada uma das Categorias apresenta uma pontuação que varia de 1 (um) a 3 (três) pontos; em função das características de agressividade do agente (concentração e intensidade); eficácia da tecnologia de controle existente; tempo de exposição ao dado agente.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Tendo em vista, conhecer o perfil da exposição existente, utilizaremos as Categorias representadas no Quadro abaixo:', $fontStyle, $paragraphStyle);

//quadro 5
//Categorias do Perfil da Exposição Existente
$section->addTitle("Quadro 5: Categorias do Perfil da Exposição Existente", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));

//A
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 4, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('* CATEGORIA RISCO - Índice (A) (agressividade do agente) ', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('CONDIÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('DESCRIÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PONTOS', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('De Atenção', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Acima do Nível de Ação - NA e Abaixo do Limite de Tolerância / Concentração Desconhecida / Não quantificado', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('2', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Crítico', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Acima do Limite de Tolerância', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('3', null, array('align' => 'center'));

//B
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 4, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('** CATEGORIA PROTEÇÃO - Índice (B) (eficácia da tecnologia de controle existente)', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('DESCRIÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PONTOS', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Exposição com Proteção: Eficaz ou Desnecessária', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('1', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Exposição com Proteção: Eficiente / Duvidosa', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('2', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Exposição com Proteção: Ineficiente ou Não Utilizada', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('3', null, array('align' => 'center'));

//C
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 4, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('*** CATEGORIA TEMPO - Índice (C) (tempo de exposição ao agente de risco)', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('DESCRIÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PONTOS', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Exposição Eventual ou Sem Risco menor que 30 minutos por dia', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('1', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Exposição Intermitente maior que 30 minutos e menor que 400 minutos por dia', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('2', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Exposição Permanente maior que 400 minutos por dia', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('3', null, array('align' => 'center'));
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);

$section->addTextBreak(1);

//quadro 6
$section->addTitle("Quadro 6: Classificação do Índice de Exposição: Índice (A) + Índice (B) + Índice (C)", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('*CATEGORIA RISCO - Índice (A) (agressividade do agente)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('**CATEGORIA PROTEÇÃO - Índice (B) (eficácia da tecnologia de controle existente)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('***CATEGORIA TEMPO - Índice (C) (tempo de exposição ao agente de risco)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('ÍNDICE DE EXPOSIÇÃO - IE
(A) + (B) + (C)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('CLASSIFICAÇÃO IE', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('1', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('1', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('1', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('1 a 5', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => '93E9F5'))->addText('Ideal', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('2', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('2', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('2', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('6 a 7', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'F5D578'))->addText('Atenção Necessária', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('3', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('3', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('3', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('8 a 9', null, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'F55B52'))->addText('Atenção Imediata', null, array('align' => 'center'));
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);

//Subtitulo
$section->addTitle("PARA GRADAÇÃO DA PROBABILIDADE X SEVERIDADE", 2);

//texto
$myTextElement = $section->addText('De acordo com a OSHAS 18.001, risco é a “Combinação da probabilidade de ocorrência de um evento perigoso ou exposição com a gravidade da lesão ou doença que podem ser causadas pelo evento ou exposição”:', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('RISCO = PROBABILIDADE X GRAVIDADE', array('name' => 'arial', 'size' => 12, 'bold' => true), array('lineHeight' => 1.5, 'alignment' => 'center'));

$myTextElement = $section->addText('Para avaliar um risco, é preciso estimar uma probabilidade de o dano ocorrer com a gravidade. O cruzamento da probabilidade com a gravidade será a avaliação do risco.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Na avaliação do risco ocupacional, deve-se levar em conta as seguintes definições:', $fontStyle, $paragraphStyle);

// Lists
$section->addListItem('Probabilidade de ocorrência do dano - está relacionada com a frequência de exposição do trabalhador (quantas vezes no dia a atividade é realizada) e a intensidade do agente no ambiente, analisam-se também as medidas de proteção adotadas.', 0, $fontStyle, $multilevelNumberingStyleName, $paragraphStyle);
$section->addListItem('Gravidade do dano que o trabalhador pode vir a sofrer em decorrência da exposição ao perigo / fator de risco.', 0, $fontStyle, $multilevelNumberingStyleName, $paragraphStyle);

//Subtitulo 2
$section->addTitle("Critérios para Gradação da Probabilidade (P) do Dano", 3);

//texto
$myTextElement = $section->addText('Nesta seção, utilizaremos as abordagens conforme descritas na literatura SESI, 2012.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('A gradação da probabilidade da ocorrência do dano (efeito crítico) é feita atribuindo-se um índice de probabilidade (P) variando de 1 a 4.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('No quadro abaixo, podemos observar o significado relacionado:', $fontStyle, $paragraphStyle);

//quadro 7
$section->addTitle("Quadro 7: Probabilidade de Ocorrência do Dano - Índice (P)", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PROBABILIDADE ÍNDICE (P)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('SIGNIFICADO EM TERMOS DA PROBABILIDADE DE OCORRÊNCIA DO DANO', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('1', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Altamente improvável', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('2', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Improvável', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('3', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Pouco provável', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('4', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Provável', null, array('align' => 'center'));
$section->addText("Fonte: SESI, 2012", $fontStyle, $paragraphStyle);

//Text run
$myTextElement = $section->addText('O índice P é definido utilizando-se várias abordagens ou critérios. Abordagens para atribuir o valor a P:', $fontStyle, $paragraphStyle);

// Add text run
$textrun = $section->addTextRun($paragraphStyle);

$textrun->addText('• P', array('bold' => true, 'name' => 'arial', 'size' => 12));
$textrun->addText(' definido com base em dados estatísticos de acidentes ou doenças relacionadas ao trabalho obtidos ou fornecidos pela empresa ou do setor de atividade quando predominam situações similares.', $fontStyle);

// Add text run
$textrun = $section->addTextRun($paragraphStyle);

$textrun->addText('• P', array('bold' => true, 'name' => 'arial', 'size' => 12));
$textrun->addText(' definido a partir do perfil de exposição qualitativo, quando não forem possíveis ou disponíveis dados quantitativos. Quanto maior intensidade, duração e frequência da exposição maior será a probabilidade de ocorrência do dano e maior será o valor atribuído a P', $fontStyle);

// Add text run
$textrun = $section->addTextRun($paragraphStyle);

$textrun->addText('• P', array('bold' => true, 'name' => 'arial', 'size' => 12));
$textrun->addText(' definido a partir do perfil de exposição quantitativo baseado na estimativa da média aritmética do perfil de exposição ou baseado na estimativa do percentil 95% e comparando-se com o valor do limite de exposição ocupacional.', $fontStyle);

// Add text run
$textrun = $section->addTextRun($paragraphStyle);

$textrun->addText('• P', array('bold' => true, 'name' => 'arial', 'size' => 12));
$textrun->addText(' definido em função do fator de proteção considerando a existência e a adequação de medidas de controle. Quanto mais adequadas e eficazes forem as medidas de controle, menor será o valor atribuído a P.', $fontStyle);

//quadro 8
$section->addTitle("Quadro 8: Critérios para Gradação da Probabilidade de Ocorrência do Dano – Índice (P)", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(2000, array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('Índice');
$row->addCell(2000, array('vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('Probabilidade de Ocorrência');
$row->addCell(2000, array('gridSpan' => 3, 'vMerge' => 'restart', 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('CRITÉRIO UTILIZADO');

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(2000, array('vMerge' => 'continue', 'valign' => 'center', 'bgColor' => 'D3D3D3'));
$row->addCell(2000, array('vMerge' => 'continue', 'valign' => 'center', 'bgColor' => 'D3D3D3'));
$row->addCell(2000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('Perfil de Exposição Qualitativo');
$row->addCell(2000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('Perfil de Exposição Quantitativo');
$row->addCell(2000, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('Fator de Proteção');


if ($indice_p == 1) {
    //1 - Altamente Improvável
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('1', $fancyTableFontStyle, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Altamente Improvável', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição baixa: contato não frequente com o agente ou frequente a baixíssimas concentrações/intensidades.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição inferior a 10% do Limite de Exposição Ocupacional. E menor que  10% LEO Percentil 95 menor que 0,1 x LEO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('As medidas de controle existentes são adequadas, eficientes e há garantias de que sejam mantidas em longo prazo.', null, array('align' => 'center'));
} else if ($indice_p == 2) {
    //2 - Improvável
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('2', $fancyTableFontStyle, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Improvável', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição moderada: contato frequente com o agente a baixas concentrações /intensidades ou contato não frequente a altas concentrações / intensidades.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição estimada entre 10% e 50% do Limite de Exposição Ocupacional.
    10% menor que E menor ou igual a 50% LEO Percentil 95 entre 0,1 x LEO e 0,5 x LEO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('As medidas de controle existentes são adequadas e eficientes, mas não há garantias de que sejam mantidas em longo prazo.', null, array('align' => 'center'));
} else if ($indice_p == 3) {
    //3 - Pouco provável
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('3', $fancyTableFontStyle, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Pouco provável', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição significativa ou importante: contato frequente com o agente a altas concentrações / intensidades', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição estimada entre 50% e 100% do Limite de Exposição Ocupacional. 50% menor que E menor ou igual a 100% LEO Percentil 95 entre 0,5 x LEO e 1,0 x LEO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('As medidas de controle existentes são adequadas, mas apresentando desvios ou problemas significativos. A eficiência é duvidosa e não há garantias de manutenção adequada.', null, array('align' => 'center'));
} else {
    //4 - Provável
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('4', $fancyTableFontStyle, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Provável', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição excessiva: contato frequente com o agente a concentrações / intensidades elevadíssimas', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Exposição estimada acima do Limite de Exposição Ocupacional E maior que 100% LEO
    Percentil 95 maior que 1,0 x LEO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Medidas de controle inexistentes ou as medidas existentes são reconhecidamente inadequadas.', null, array('align' => 'center'));
}
$myTextElement = $section->addText('Quadro adaptado de MULHAUSEN e DAMIANO (1988) e Apêndice D da BS 8800 apud SESI (2012)', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("Critérios para Gradação de Severidade (S) do Dano", 3);

//texto
$myTextElement = $section->addText('Para a gradação da Severidade do dano potencial atribui-se um índice (S) variando de 1 a 4, conforme critério genérico relacionado no Quadro abaixo:', $fontStyle, $paragraphStyle);

//quadro 9
$section->addTitle("Quadro 8: Critérios para Gradação da Probabilidade de Ocorrência do Dano – Índice (P)", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('SEVERIDADE
ÍNDICE (S)', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('SIGNIFICADO EM TERMOS DE SEVERIDADE DO DANO', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('1', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Reversível Leve', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('2', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Reversível Severo', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('3', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Irreversível', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('4', null, array('align' => 'center'));
$row->addCell(null, array('gridSpan' => 2, 'valign' => 'center'))->addText('Fatal ou Incapacitante', null, array('align' => 'center'));
$section->addText("Fonte: SESI, 2012", $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('O critério adotado nesta tabela baseia-se nas lesões que o perigo pode causar ao trabalhador:', $fontStyle, $paragraphStyle);

//quadro 10
$section->addTitle("Quadro 10: Probabilidade de Ocorrência do Dano, Índice (P) X Severidade do Dano - Índice (S)", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('ÍNDICE', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('SEVERIDADE', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('CRITÉRIO UTILIZADO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('EXEMPLOS', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('1', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Reversível Leve', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão de doenças leves, com efeitos reversíveis levemente prejudiciais.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Ferimentos leves, irritações leves, que não impliquem em afastamento não superior a 15 dias.', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('2', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Reversível Severo', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão ou doença sérias, com efeitos reversíveis severos e prejudiciais.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Irritações sérias, pneumoconiose não fibrogênica, lesão reversível que implique em afastamento superior a 15 dias.', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('3', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Irreversível', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão ou doença críticas, com efeitos irreversíveis severos e prejudiciais que podem limitar a capacidade funcional.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('PAIR - Perda Auditiva Induzida por Ruído, danos ao sistema nervoso central (SNC), lesões com sequelas que impliquem em afastamentos de longa duração ou em limitações da capacidade funcional.', null, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('4', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Fatal ou Incapacitante', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Lesão ou doença incapacitante ou fatal.', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('Perda de membros ou órgãos que incapacitem definitivamente para o trabalho, lesões múltiplas que resultem em morte, doenças progressivas potencialmente fatais, como pneumoconiose fibrogênica, câncer, etc.', null, array('align' => 'center'));
$section->addText("Fonte: SESI, 2012", $fontStyle, $paragraphStyle);

//Subtitulo
$section->addTitle("PARA PRIORIDADE DA AÇÃO", 2);

//texto
$myTextElement = $section->addText('A priori, ressalta-se que o presente critério somente será utilizado, neste PPRA, na iminência de qualquer evento que se fizer necessário. Caso contrário, não será utilizado.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Embora, sempre que necessário, esta informação poderá ser utilizada no Plano de Ação deste PPRA.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('As ações classificadas como P1 (prioridade 1) serão aquelas consideradas de maior prioridade e, se não implementadas, deverão ser justificadas.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('As ações classificadas como P2 (prioridade 2) serão aquelas consideradas de menor prioridade e, serão implementadas, se houver uma relação custo-benefício adequada e disponibilidade de recursos materiais e humanos ou ainda, se não implicar em custos diretos.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Desse modo, quando se fizer necessário a utilização do critério para priorização das ações, será utilizado o critério estabelecido no Quadro abaixo:', $fontStyle, $paragraphStyle);

//quadro 11
$section->addTitle("Quadro 11: Critérios para Prioridade da Ação", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('gridSpan' => 5, 'valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('CRITÉRIOS PARA PRIORIDADE DAS AÇÕES', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('bgColor' => 'D3D3D3', 'align' => 'center', 'valign' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('RISCO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('CLASSIFICAÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('PRIORIDADE DA AÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3'))->addText('AÇÃO', $fancyTableFontStyle, array('align' => 'center'));

if ($prioridade == 1) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F55B52 '))->addText('ALTO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Não tolerável. Prioridade Máxima.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Controle necessário (P1).', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Adotar medidas imediatas de controle, quando não for possível, a continuidade da operação só poderá ocorrer com ciência e aprovação do gerente geral da unidade ou instalação. Iniciar processo de avaliação quantitativa do GHE para verificação do rebaixamento da categoria de risco.', null, array('align' => 'center'));
} else if ($prioridade == 2) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => 'F5D578'))->addText('MODERADO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Crítica. Prioridade Preferencial.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Manter o controle existente (P1). Controle adicional necessário, se for possível e viável (P2).', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Adotar medidas de controle para redução da exposição e iniciar processo de avaliação quantitativa do GHE.', null, array('align' => 'center'));
} else if ($prioridade == 3) {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => '68E671'))->addText('BAIXO', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('De atenção. Prioridade Básica.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Manter o controle existente. (P1). Controle adicional necessário, se for possível e viável (P2).', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Iniciar processo de avaliação quantitativa do GHE para confirmação da categoria de risco e monitoramento periódico.', null, array('align' => 'center'));
} else {
    $row = $table->addRow(null, array('cantSplit' => true));
    $row->addCell(null, array('valign' => 'center', 'bgColor' => '93E9F5'))->addText('IRRELEVANTE', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Irrelevante. Não Prioritário.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Manter o controle existente. (P1). Nenhum controle adicional é necessário. Meta a ser alcançada pelo PPRA.', null, array('align' => 'center'));
    $row->addCell(null, $fancyTableCellStyle)->addText('Ações dentro do princípio de melhoria contínua. Fica a critério do profissional de Higiene Ocupacional a avaliação quantitativa do GHE para confirmação da categoria.', null, array('align' => 'center'));
}
$section->addText("Fonte: Adaptado pelo autor", $fontStyle, $paragraphStyle);
