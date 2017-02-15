<?php
if(isset($_POST['email'])) {

$email_to = $_POST['email'];
$email_subject = "Solicitud de reserva";

// Validar los datos ingresados por el usuario
if(!isset($_POST['solicitud']) ||
!isset($_POST['empresa']) ||
!isset($_POST['nombre']) ||
!isset($_POST['telefono'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Solicitud: " . $_POST['solicitud'] . "\n";
$email_message .= "Empresa: " . $_POST['empresa'] . "\n";
$email_message .= "Correo electrónico: " . $_POST['email'] . "\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "Teléfono: " . $_POST['telephone'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
$bool = mail($email_to, $email_subject, $email_message, $headers);

if($bool)
    include('../lib/mapa.html?response=success');
else
    //include('../lib/mapa.html?response=error');
    //header('Location: ../index.php');
    header('Location: ../index.php');

}
?>
