<?php
//Adicionando Footer
$footer = $section->addFooter();

//estilo do paragrafo do footer
$footerFontStyle = new \PhpOffice\PhpWord\Style\Font();
$footerFontStyle->setBold(true);
$footerFontStyle->setName('Arial');
$footerFontStyle->setSize(7);

//Configuração do paragrafo
$footerParagraphStyle = new \PhpOffice\PhpWord\Style\Paragraph();
$footerParagraphStyle->setAlignment("center");
$footerParagraphStyle->setLineHeight(1);
$footerParagraphStyle->setSpaceAfter(0);

//conteudo do footer
$footer_text = $footer->addText('Agroambiental Consultoria e Projetos',$footerFontStyle,$footerParagraphStyle);
$footer_text = $footer->addText('Endereço: Rua Cel. Arthur Whitacker, 382, Edifício Di Napoli, Sala 1, Térreo, Centro- CEP 13690-000, Descalvado, SP, Brasil.',$footerFontStyle,$footerParagraphStyle);
$footer_text = $footer->addText('Fone: 19 3583 8318. Endereço eletrônico: contato@agroambientalconsultoria.com – Homepage: www.agroambientalconsultoria.com',$footerFontStyle,$footerParagraphStyle);

$footer->addPreserveText('{PAGE}',$footerFontStyle,$footerParagraphStyle);
?>