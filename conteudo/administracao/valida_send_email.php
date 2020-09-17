<?php

session_start();

require_once('../PHPMailer/src/PHPMailer.php');
require_once('../PHPMailer/src/SMTP.php');
require_once('../PHPMailer/src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$btnSendEmail = filter_input(INPUT_POST, 'btnSendEmail', FILTER_SANITIZE_STRING);

if(!$btnSendEmail){
	
	$data = filter_input(INPUT_GET, 'data', FILTER_SANITIZE_STRING);
	$empresa = filter_input(INPUT_GET, 'nome_empresa', FILTER_SANITIZE_STRING);
	$assunto = "Calibration Report - " . $empresa . " - " . $data;//filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
	$mensagem = "<p>Your report was successfully generated!<br></p><p>Please do not reply to this email.<br></p><p>For questions and support contact <br></p><p><strong>Top Scale, Inc.</strong></p>"; 
	//filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
	$nomearquivo = filter_input(INPUT_GET, 'arquivo', FILTER_SANITIZE_STRING);
	$caminhoarquivo = "../impressoes/";
	$arquivocompleto = $caminhoarquivo . $nomearquivo;
	
	$mail = new PHPMailer(true);
	try {
		//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
		//$mail->SMTPDebug = 3;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'redthreadtechnology@gmail.com';
		$mail->Password = 'mbr09KEI';
		$mail->Port = 587;
	
		$mail->setFrom('redthreadtechnology@gmail.com', 'Red Thread Tech');
		$mail->addAddress('redthreadtechnology@gmail.com');
		$mail->addAddress('topscalecerts@gmail.com');

	
		$mail->isHTML(true);
		$mail->Subject = $assunto;
		$mail->Body = $mensagem;
		$mail->AltBody = $mensagem ;
		$mail->AddAttachment($arquivocompleto);
	
		if($mail->send()) {
			echo 'Email enviado com sucesso';

		} else {
			echo 'Email nao enviado';

		}
	} catch (Exception $e) {
		echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
		
	}

}
	header("Location: ..\administracao\batch_printing.php?nome_arquivo=$nomearquivo");
?>