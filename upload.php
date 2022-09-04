<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (!empty($_POST['file'])) {
    $data = base64_decode($_POST['file']);
    // print_r($data);
    file_put_contents($_POST['nombre'].".pdf", $data);
} else {
    echo "No Data Sent";
}


require 'vendor/autoload.php';

$mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '';
    $mail->Password = '';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('@gmail.com', 'Sistema de aplicaiones');
    $mail->addAddress('@gmail.com', 'Receptor');
    $mail->addCC('@gmail.com');

    $mail->addAttachment('nuevo.pdf', 'nuevo.pdf');

    $mail->isHTML(true);
    $mail->Subject = 'Respuesta de formulario de '.$_POST['nombre'];
    $mail->Body = 'Hola, <br/>Esta es una prueba desde <b>Gmail</b>.';
    $mail->send();

    echo 'Correo enviado';
