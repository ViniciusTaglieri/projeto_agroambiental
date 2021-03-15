<?php
require_once("classes/empresa.php");
require_once("classes/meio_ambiental.php");
error_reporting(0);
$empresa = new Empresa();
$meioAmbiental = new MeioAmbiental();

$botToken = "1206934497:AAHbbgbuGxHs1vpFZT5ipnF4wjZ4f268Hzo";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents($website."/getUpdates");
$updateArray = json_decode($update, TRUE);

if($chatId = $updateArray["result"][0]["message"]["chat"]["id"]){
    
    $lista = $meioAmbiental->selecionarMeioAmbiental();
    foreach($lista as $registro){
    $data_inicial = date('Y-m-d');
    $data_final = $registro->vencimento;

    // Calcula a diferença em segundos entre as datas
    $diferenca = strtotime($data_final) - strtotime($data_inicial);

    //Calcula a diferença em dias
    $data = floor($diferenca / (60 * 60 * 24));

    if($data == 180){
        $enviar = TRUE;
    }else if($data == 150){
        $enviar = TRUE;
    }else if($data == 120){
        $enviar = TRUE;
    }else if($data == 90){
        $enviar = TRUE;
    }else if($data == 60){
        $enviar = TRUE;
    }else if($data == 30){
        $enviar = TRUE;
    }else if($data == 21){
        $enviar = TRUE;
    }else if($data == 14){
        $enviar = TRUE;
    }else if($data == 7){
        $enviar = TRUE;
    }else if($data == 0){
        $enviar = TRUE;
    }else if($data == -7){
        $enviar = TRUE;
    }else{
        $enviar = FALSE;
    }

    if($enviar == TRUE && $registro->lembrete != date('Y-m-d')){
        $list = $empresa->selecionarEmpresaWhere($registro->empresa);
        foreach($list as $empresas){}
        $msg = "------------------------";
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=$msg");

        $msg = "Documento próximo do vencimento";
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=$msg");

        $msg = "Empresa: $empresas->fantasia";
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=$msg");
        
        $venc = new DateTime($registro->vencimento);
        $msg = "Vencimento: ".$venc->format('d/m/Y');
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=$msg");

        if($data>=0){
            $msg = "Status: faltam - ".$data." dias";
        }else{
            $msg = "Status: vencido";
        }
        file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=$msg");

        $id = $registro->id;
        $lembrete = date('Y-m-d');
        
        $objeto = new MeioAmbiental();
        $resultado = $objeto->atualizarLembrete($id,$lembrete);
    }
}
}
?>