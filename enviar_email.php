<?php
  require_once("classes/empresa.php");
  require_once("classes/meio_ambiental.php");
  require_once("classes/email.php");
  $email = new email();
  $usuarios = $email->selecionarEmail();
  foreach($usuarios as $usuario){}
    
 /*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/

 $caixaPostalServidorNome = 'WebSite | Contato';
 $caixaPostalServidorEmail = $usuario->emailEnvia;//email que será utilizado pelo site para enviar emails
 $caixaPostalServidorSenha = $usuario->senhaEnvia;//senha do email da var $caixaPostalServidorEmail

 /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/  
 
  $empresa = new Empresa();
  $meioAmbiental = new MeioAmbiental();

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
        $enviaFormularioParaNome = $usuario->nomeRecebe;//nome da pessoa ou empresa que vai receber o e-mail
        $enviaFormularioParaEmail = $usuario->emailRecebe;//e-mail que recebera os emails do site

        $assunto = "Lembrete vencimento - Agroambiental";
        $mensagem = "Empresa: $empresas->fantasia <br>";
        $venc = new DateTime($registro->vencimento);
        $mensagem .= "Vencimento: ".$venc->format('d/m/Y')."<br>";
        
        $mensagemConcatenada  = '-------------------------------<br/>'; 
        $mensagemConcatenada .= 'Documento próximo do vencimento <br/>'; 
        $mensagemConcatenada .= '-------------------------------<br>'; 
        $mensagemConcatenada .= $mensagem;
        if($data>=0){
            $mensagemConcatenada .= "Status: faltam - ".$data." dias";
        }else{
            $mensagemConcatenada .= "Status: vencido";
        }

        /*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
        
        require_once('PHPMailer-master/PHPMailerAutoload.php');
        
        $mail = new PHPMailer();
        
        $mail->IsSMTP();
        $mail->SMTPAuth  = true;
        $mail->Charset   = 'utf8_decode()';
        $mail->Host = $usuario->smtp;//smtp do servidor de email 
        $mail->Port  = $usuario->portaSmtp;
        $mail->Username  = $caixaPostalServidorEmail;
        $mail->Password  = $caixaPostalServidorSenha;
        $mail->From  = $caixaPostalServidorEmail;
        $mail->FromName  = utf8_decode($caixaPostalServidorNome);
        $mail->IsHTML(true);
        $mail->Subject  = utf8_decode($assunto);
        $mail->Body  = utf8_decode($mensagemConcatenada);
        
        $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
        
        if(!$mail->Send()){
            $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
        }else{
            $mensagemRetorno = 'Formulário enviado com sucesso!';
        } 
        //print '<br><center><h2>' . $mensagemRetorno . '</h2>' ;
        }     
    }
 ?>