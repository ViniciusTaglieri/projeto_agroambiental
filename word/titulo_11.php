<?php
$section = $phpWord->addSection();
//Definir propriedades da sessao
$sectionStyle = $section->getStyle();
$sectionStyle->setMarginTop(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginBottom(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));
$sectionStyle->setMarginLeft(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(3));
$sectionStyle->setMarginRight(\PhpOffice\PhpWord\Shared\Converter::cmToTwip(2));

$section->addTitle("RECOMENDAÇÕES COMPLEMENTARES", 1);

//Texto
$myTextElement = $section->addText('As recomendações, apresentadas nesta seção, têm por objetivo orientar o empregador e trabalhador frente às diversas circunstâncias que possam surgir no ambiente laboral. Estas recomendações - previstas neste PPRA (Programa de Prevenção de Riscos Ambientais) -, não desobrigam a empresa a cumprir outras disposições que, com relação à matéria estejam incluídas em Códigos de Obras do Município, Regulamentos Sanitários dos Estados.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('A observância das NR não desobriga as organizações do cumprimento de outras disposições que, com relação à matéria, sejam incluídas em códigos de obras ou regulamentos sanitários dos Estados ou Municípios, bem como daquelas oriundas de convenções e acordos coletivos de trabalho NR 1, 1.2.2.)', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Neste interim, em caso de novas situações de riscos ambientais ou qualquer alteração na estrutura física ou organizacional da empresa, não contemplados neste Programa, deverão ser estudadas e implantadas as medidas de controle destes novos riscos.', $fontStyle, $paragraphStyle);

$section->addTitle("RECOMENDAÇÕES GERAIS PARA O SETOR OPERACIONAL", 2);

$myTextElement = $section->addText('Recomendamos a observância da NR-26: Sinalização de Segurança, da NBR 6493: Emprego de Cores para Identificação de Tubulações e NBR 7195: Cores para Segurança. A NR-26 trata da fixação de cores padrão que devem ser usadas no local de trabalho para identificação dos equipamentos de segurança, delimitação das áreas, identificação das tubulações para condução de líquidos e gases. O objetivo da sinalização é advertir contra riscos e também prevenir acidentes.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Recomendamos que a Empresa adote placas de advertência, onde o uso de equipamentos de proteção individual e coletiva seja obrigatório. Recomendamos a demarcação dos locais de estocagem dos produtos de forma que sejam estabelecidas vias de circulação, facilitando as condições de limpeza, organização e manutenção do local; visando a prevenção de acidentes.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Recomendamos que a Empresa adote placas de advertência, onde o uso de equipamentos de proteção individual e coletiva seja obrigatório. Recomendamos a demarcação dos locais de estocagem dos produtos de forma que sejam estabelecidas vias de circulação, facilitando as condições de limpeza, organização e manutenção do local; visando a prevenção de acidentes.', $fontStyle, $paragraphStyle);

$section->addTitle("NORMATIVAS PARA CONTRATAÇÃO DE MÃO DE OBRA DE TERCEIROS", 2);

$myTextElement = $section->addText('Para trabalhos ou serviços que sejam realizados por pessoal terceiros e/ou não pertencente ao quadro funcional da empresa AGROAMBIENTAL CONSULTORIA E PROJETOS, devem ser seguidas as legislações abaixo especificadas, sem prejuízo de outras pertinentes ou que se relacionem, bem como a normativa de segurança do trabalho em obras e reformas.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Ressalta-se que a orientação sempre deverá ser correlacionada à função a ser desenvolvida perante a legislação vigente.', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Vide Quadro abaixo:', $fontStyle, $paragraphStyle);

//quadro 14
$section->addTitle("Quadro 14: Normativas para Contratação de Mão de Obra de Pessoal Não Pertencente ao Quadro Funcional    ", 5);
$table = $section->addTable(array('borderSize' => 6, 'borderColor' => '000000', 'alignment' => 'center'));
$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3', `bold` => true))->addText('DESCRIÇÃO', $fancyTableFontStyle, array('align' => 'center'));
$row->addCell(null, array('valign' => 'center', 'bgColor' => 'D3D3D3', `bold` => true))->addText('NORMATIVAS', $fancyTableFontStyle, array('align' => 'center'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Comprovação de Orientação do Uso de EPI', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-6 (Norma Regulamentadora Nº 6: Equipamento de Proteção Individual - EPI', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('PCMSO - Programa de Controle Médico de Saúde Ocupacional', null, array('align' => 'center'));
$row->addCell(null, array(`vMerge` => `restart`))->addText('NR-6 (Norma Regulamentadora Nº 6: Equipamento de Proteção Individual - EPI', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('ASO - Atestado de Saúde Ocupacional', null, array('align' => 'center'));
$row->addCell(null, array(`vMerge` => `continue`));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('PPRA - Programa de Prevenção de Riscos Ambientais', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-9 (Norma Regulamentadora Nº 9): Programa de Prevenção de Riscos Ambientais', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Trabalho com Eletricidade', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-10 (Norma Regulamentadora Nº 10): Segurança em Instalação e Serviços em Eletricidade', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Trabalho com Equipamento Móvel', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-11 ((Norma Regulamentadora Nº 11) Transporte, Movimentação, Armazenagem e Manuseio de Materiais', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Máquinas e Equipamentos', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-12 (Norma Regulamentadora Nº 12): Segurança no Trabalho em Máquinas e Equipamentos', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Obras em Geral', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-18 (Norma Regulamentadora Nº 18): Condições de Trabalho na Indústria da Construção', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Instalações para Combate a Incêndios', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-23 (Norma Regulamentadora Nº 23): Proteção Contra Incêndios', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Trabalho em Espaço Confinado', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-33 (Norma Regulamentadora Nº 33): Trabalho em Espaços Confinados', null, array('align' => 'both'));

$row = $table->addRow(null, array('cantSplit' => true));
$row->addCell(null, $fancyTableCellStyle)->addText('Trabalho em Altura', null, array('align' => 'center'));
$row->addCell(null, $fancyTableCellStyle)->addText('NR-35 (Norma Regulamentadora Nº 35): Trabalho em Altura', null, array('align' => 'both'));
$myTextElement = $section->addText('Fonte: Adaptado pelo autor', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Na ocorrência das atividades descritas na tabela acima, a empresa deverá realizar vistorias tomando como base, no mínimo, as normativas citadas e correlacionadas com a função. A finalidade das inspeções é a verificação da conformidade com as Normas vigentes cabíveis; de forma a garantir a segurança e a saúde do trabalhador.', $fontStyle, $paragraphStyle);

// Add text run
$textrun = $section->addTextRun($paragraphStyle);

//Configuração da fonte
$fontStyleTextRun = new \PhpOffice\PhpWord\Style\Font();
$fontStyleTextRun->setBold(true);
$fontStyleTextRun->setUnderline('single');
$fontStyleTextRun->setName('Arial');
$fontStyleTextRun->setSize(12);

$textrun->addText('Observação:', $fontStyleTextRun);
$textrun->addText(' Sempre solicitar o ASO - Atestado de Saúde do Trabalhador a todo e qualquer prestador de serviços; conforme descrito no Quadro acima.', $fontStyle);
