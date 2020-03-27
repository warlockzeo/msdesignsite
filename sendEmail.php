<?php
    class ClassEmail {       
        #exibir lista completa de Alunos
        public function enviarEmail($s, $m, $t)
        {
            $m = "
            <style>* {color: #000000;}</style>
            $m
            <br>
            <br>
            <br>
            <p>
            <img src='https://www.msdesign.pt/assets/images/logo2.png' alt='MSDesign' style='height: 65px;width: auto;float: left;padding-right: 20px;border-right: 3px solid #000000;margin-right: 20px;'>
            <br>
            Tlm / Whatsapp: +351 934 290 403
            <br>
            Facebook: fb/mariosilvadesign
            </p>
            ";
            $headers = "From: MSDesign.pt <contato@msdesign.pt>\r\n";
            $headers .= "Reply-To: $t\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";

            //Enviando o email
            if(mail($t, $s, $m, $headers)){
                return 'ok';
            } else {
                header("HTTP/1.0 400 Falha no envio");
                return 'error';
            }
        }
    }
  
    $mail1 = new ClassEmail();
    $mail2 = new ClassEmail();

    //Recebendo dados do form
    $json = file_get_contents('php://input');
    $obj = json_decode($json, TRUE);

    $nome = isset($obj['nome']) ? preg_replace('/[^[:alpha:][:space:]_]/', '',$obj['nome']): '';
    $email = isset($obj['email']) ? preg_replace('/[^[:alnum:]@._]/', '',$obj['email']): '';
    $fone = isset($obj['fone']) ? preg_replace('/[^[:alnum:]()-._]/', '',$obj['fone']): '';
    $mensagem = isset($obj['mensagem']) ? preg_replace('/[^[:alnum:][:punct:][:space:]]/', '',$obj['mensagem']): '';

    $msg = "Nome: $nome 
    <br>
    Telefone: $fone 
    <br>
    E-mail: $email 
    <br>
    Mensagem: $mensagem";

    $subject = "Mensagem de MSDesign.pt";
    $to = 'contact@msdesign.pt';
    
    if($mail1->enviarEmail($subject, $msg, $to) === "ok"){
        header("HTTP/1.0 200 OK");
        $msg = "Olá $nome
        <br >
        Nós do <strong>MSDesign</strong> agradecemos o seu contacto e estaremos entrando em contacto o mais rápido possível.";

        $mail2->enviarEmail($subject, $msg, $email);
    }
?>