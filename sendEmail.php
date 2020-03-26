<?php
    class ClassEmail {       
        #exibir lista completa de Alunos
        public function enviarEmail($subject, $msg, $to)
        {
            $headers = "From: MSDesign.pt <contato@msdesign.pt>\r\n";
            $headers .= "Reply-To: $to\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";

            //Enviando o email
            if(mail($to, $subject, $msg, $headers)){
                return 'ok';
            } else {
                return 'error';
            }
        }
    }
  
    $email = new ClassEmail();

    //Recebendo dados do form
    $json = file_get_contents('php://input');
    $obj = json_decode($json, TRUE);
    $nome = isset($_POST['nome']) ? preg_replace('/[^[:alpha:]_]/', '',$_POST['nome']): '';
    $email = isset($_POST['email']) ? preg_replace('/[^[:alpha:]_]/', '',$_POST['email']): '';
    $telefone = isset($_POST['telefone']) ? preg_replace('/[^[:alpha:]_]/', '',$_POST['telefone']): '';
    $mensagem = isset($_POST['mensagem']) ? preg_replace('/[^[:alpha:]_]/', '',$_POST['mensagem']): '';

    $msg = "\nNome: $nome \n\n$telefone \n\n$email \n\n$mensagem\n";
    $subject = "Mensagem de MSDesign.pt";
    $to = 'dalmon_boy@hotmail.com';
        
    $email->enviarEmail($subject, $msg, $to);

    $msg = "Olá $nome\n\nNós do MSDesign agradecemos o seu contacto e estaremos entrando em contacto o mais rápido possível.";
    $email->enviarEmail($subject, $msg, $email);
?>