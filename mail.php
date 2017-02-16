<?php

$Post = file_get_contents("php://input"); // recebo a requisição com JSON

$data = json_decode( $Post ); //formato o json

echo json_encode(array(
    "nome"=>$data->nome,
    "email"=>$data->email,
    "assunto"=>$data->assunto,
    "mensagem"=>$data->mensagem,
    "destinatario"=>$data->destinatario,
    "envio"=>$data->envio
    ));

if($data->envio == true){
    enviaEmail($data->nome,$data->assunto,$data->mensagem,$data->destinatario,$data->destinatario);
}
//responder a,assunto,mensagem,email de quem deve receber, email de envio


function enviaEmail($de, $assunto, $mensagem, $para, $email_servidor) {
    $headers = "From: $email_servidor\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
  mail($para, $assunto, nl2br($mensagem), $headers);
}


?>