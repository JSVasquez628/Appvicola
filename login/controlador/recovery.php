<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../PHPMailer/Exception.php';
require '../../PHPMailer/PHPMailer.php';
require '../../PHPMailer/SMTP.php';

require_once('conexion.php');
$email = $_POST['correo'];
$query = "SELECT * FROM usuario where correo = '$email'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if($result->num_rows > 0){
  $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp-mail.outlook.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'app007_prueba@outlook.com';
    $mail->Password   = 'app007_envio';
    $mail->Port       = 587;
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Activa la depuración SMTP completa
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);


    $mail->setFrom('app007_prueba@outlook.com', 'Appvicola');
    $mail->addAddress($email, ',');
    $mail->isHTML(true);
    $mail->Subject = 'Recuperación de contraseña';
    $mail->Body = 'Hola, este es un correo generado para solicitar tu recuperación de contraseña. Por favor, visita la página de <a href="http://localhost:3000/login/vistas/cambia_contraseña.php?id='.$row['id_usuario'].'">Recuperación de contraseña</a>';


    $mail->send();
    header("Location: ../vistas/ingreso.php?message=ok");
} catch (Exception $e) {
  //echo 'Error al enviar el correo: ', $e->getMessage();
  //echo ' Código de error: ', $mail->ErrorInfo;
  header("Location: ../vistas/ingreso.php?message=error");
}

}else{
  header("Location: ../vistas/ingreso.php?message=not_found");
}

?>
