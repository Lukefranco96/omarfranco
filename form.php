<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail= new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['full-name'];
    $mailDir = $_POST['email'];
    
    $mensaje = $_POST['message'];
try{
   
    $mail-> isSMTP();
    $mail -> Host = 'smtp-mail.outlook.com';
    $mail -> SMTPAuth= true;
    $mail-> Username = 'donino55@hotmail.com';
    $mail-> Password = 'umhxpgbqtmcsabie';
    $mail -> SMTPSecure = PHPMailer:: ENCRYPTION_STARTTLS;
    $mail -> Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail-> setFrom('donino55@hotmail.com');
    $mail  -> addAddress ('jomaragfc@outlook.com');
    $mail -> isHTML(true);
    $mail -> Subject= 'Persona interesada en ti ';
    $mail->Body = 'Nombre: ' . $nombre . '<br>Email: ' . $mailDir .'<br>Mensaje: ' . $mensaje;;
    $mail -> send();

     // redireccion
    
    echo '<script> alert("El correo se envio de forma exitosa!")</script>';
    header('Location: index.html');
}catch (Exception $e){
    echo 'MEnsaje '. $mail -> ErrorInfo;
}
}
?>