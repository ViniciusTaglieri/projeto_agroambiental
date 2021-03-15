<?php
//Titulo
$section->addTitle("ABRANGÊNCIA", 1);

//Subtitulo
$section->addTitle("CAMPO DE APLICAÇÃO", 2);

//Texto
$myTextElement = $section->addText('Este documento aplica-se à empresa AGROAMBIENTAL CONSULTORIA E PROJETOS e seus respectivos trabalhadores.', $fontStyle, $paragraphStyle);

//Subtitulo
$section->addTitle("RESPONSABILIDADES", 2);

//Subtitulo 3
$section->addTitle("Do Empregador", 3);

//Texto
$myTextElement = $section->addText('Estabelecer, implementar e assegurar o cumprimento do PPRA como atividade permanente da empresa ou instituição (NR 9, subitem 9.4.1).', $fontStyle, $paragraphStyle);

$myTextElement = $section->addText('Deverá promover a realização das avaliações e medidas de controle, conforme definido no Plano de Ação; dar ciência a todos os trabalhadores sobre os riscos a que estão expostos, assim como, sobre as formas de proteção; fazer cumprir, através dos supervisores, a observância por parte dos funcionários acerca dos cuidados contra os riscos ocupacionais, o uso do EPI - Equipamento de Proteção Individual e o fiel cumprimento das normas de segurança.', $fontStyle, $paragraphStyle);

//Subtitulo 3
$section->addTitle("Do Trabalhador", 3);

//Texto
$myTextElement = $section->addText('I. Colaborar e participar na implantação e execução do PPRA; II. Seguir as orientações recebidas nos treinamentos oferecidos dentro do PPRA; III. Informar ao seu superior hierárquico direto ocorrências que, a seu julgamento, possam implicar riscos à saúde dos trabalhadores (NR 9, subitem 9.4.2).', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("FORMA DE REGISTRO E MANUTENÇÃO DOS DADOS", 2);

//Texto
$myTextElement = $section->addText('Todos os dados referentes aos Riscos a que estão expostos os trabalhadores da empresa ' . $empresa->razao_social . ', são registrados em folhas apropriadas, onde constam: Natureza do (s) Agente (s); Agentes; Fonte Geradora; Propagação do Agente; Possíveis Danos à Saúde; Tipo de Avaliação; Tipo de Exposição; Função; Setor; Quantidade de Trabalhadores Expostos ao Risco; Limite de tolerância; Medidas de Controle Propostas; EPI - Equipamento de Proteção Individual Recomendado', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("REGISTRO E DIVULGAÇÃO DE DADOS DO PPRA", 2);

//Texto
$myTextElement = $section->addText('Registro', array('name' => 'arial', 'size' => 12, 'bold' => true), $paragraphStyle);

//Texto
$myTextElement = $section->addText('De acordo com a NR 9, deverá ser mantido pelo empregador um registro de dados, estruturado de forma a constituir um histórico técnico e administrativo do desenvolvimento do PPRA; devidamente arquivado (9.3.8.1). Os dados deverão ser mantidos por um período mínimo de 20 (vinte) anos (9.3.8.2). O registro de dados deverá estar sempre disponível aos trabalhadores interessados ou seus representantes e para as autoridades competentes (9.3.8.3).', $fontStyle, $paragraphStyle);

//Texto
$myTextElement = $section->addText('Divulgação de Dados', array('name' => 'arial', 'size' => 12, 'bold' => true), $paragraphStyle);

//Texto
$myTextElement = $section->addText('Os trabalhadores interessados terão o direito de apresentar propostas e receber informações e orientações a fim de assegurar a proteção aos riscos ambientais identificados na execução do PPRA (NR 9, 9.5.1). Os empregadores deverão informar os trabalhadores de maneira apropriada e suficiente sobre os riscos ambientais que possam originar-se nos locais de trabalho e sobre os meios disponíveis para prevenir ou limitar tais riscos e para proteger-se dos mesmos (NR 9, 9.5.2).', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("FORMAS DE AVALIAÇÃO", 2);

//Texto
$myTextElement = $section->addText('O PPRA, durante a sua implementação e acompanhamento, deverá ser avaliado através de reuniões com a participação dos trabalhadores e do empregador. Será avaliado, também, quanto às Medidas de Controle Recomendadas e Plano de Ação. Devem ser registrados em fichas e fotos.  
Ressalta-se a necessidade da observância quanto às metas / prioridades estabelecidas e respectivo prazo para realização; descritos no Plano de Ação deste PPRA. Tanto a implementação das Medidas de Controle Recomendadas quanto do Plano de Ação é de responsabilidade do empregador.', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("PERIODICIDADE DA AVALIAÇÃO", 2);

//Texto
$myTextElement = $section->addText('De acordo com a NR 09, a avaliação deverá ser efetuada, sempre que necessário, e pelo menos, uma vez ao ano, uma análise global do PPRA para avaliação do seu desenvolvimento e realização dos ajustes necessários e estabelecimento de novas metas e prioridades.', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("DA CONSTITUIÇÃO DOS SERVIÇOS ESPECIALIZADOS EM ENGENHARIA DE SEGURANÇA - SESMT", 2);

//Texto
$myTextElement = $section->addText('De acordo com o “Quadro II”, da NR 4, que trata do “Dimensionamento dos SESMT”, conclui-se que a empresa não tem a obrigatoriedade da constituição do SESMT.', $fontStyle, $paragraphStyle);

//Subtitulo 2
$section->addTitle("DA CONSTITUIÇÃO DA COMISSÃO INTERNA DE PREVENÇÃO DE ACIDENTES - CIPA", 2);

//Texto
$myTextElement = $section->addText('De acordo com o “Quadro I” da NR 05, que trata do “Dimensionamento de CIPA”, conclui-se que a empresa tem a obrigatoriedade de constituir a CIPA.', $fontStyle, $paragraphStyle);
