<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email_contact ) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_contact ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name_contact     = $_POST['name_contact'];
$lastname_contact    = $_POST['lastname_contact'];
$email_contact    = $_POST['email_contact'];
$phone_contact   = $_POST['phone_contact'];
$message_contact = $_POST['message_contact'];
$verify_contact   = $_POST['verify_contact'];

if(trim($name_contact) == '') {
	echo '<div class="error_message">El nombre es un campo requerido.</div>';
	exit();
} else if(trim($lastname_contact ) == '') {
	echo '<div class="error_message">El apellido es un campo requerido</div>';
	exit();
} else if(!isEmail($email_contact)) {
	echo '<div class="error_message">El correo es un campo requerido</div>';
	exit();
	} else if(trim($phone_contact) == '') {
	echo '<div class="error_message">El número de teléfono es un campo requerido</div>';
	exit();
}

if(get_magic_quotes_gpc()) {
	$message_contact = stripslashes($message_contact);
}


//$address = "HERE your email address";
$address = "webmaster@alfapaz.com";


// Below the subject of the email
$e_subject = 'Has sido contactado por ' . $name_contact . '.';

// You can change this if you feel that you need to.
$e_body = "Has sido contactado por $name_contact $lastname_contact está interesad@ en ser parte del personal de las siguientes ciudades:." . PHP_EOL . PHP_EOL;
$e_content = "\"$message_contact\"" . PHP_EOL . PHP_EOL;
$e_reply = "Puedes responder a $lastname_contact via email, $email_contact o por teléfono al $phone_contact";

$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email_contact" . PHP_EOL;
$headers .= "Reply-To: $email_contact" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_contact";
$usersubject = "Instrucciones: Aplicación para guardia de seguridad";
$userheaders = "From: info@alfapaz.com\n";
$usermessage = "Gracias por contactarnos. Actualmente estamos buscando personal, es un gusto que desees unirte a nuestro gran equipo.

Los requisitos mínimos que hemos solicitado, son los siguientes:
✓ Título de Bachiller.
✓ Edad: entre 25 y 50 años.
✓ Experiencia mínima: 1 año.
✓ Credencial otorgada por el Ministerio del Interior (Curso 120 horas). 
✓ Curso de reentrenamiento.
✓ No poseer antecedentes penales y judiciales.

Si cumples con estos requisitos, por favor responde a este correo electrónico con la siguiente documentación: 
➢ Hoja de vida
➢ Copia de cédula y certificado de votación.
➢ Copia del carné del Ministerio del interior.
➢ Acta de grado.
➢ Copia de certificados laborales.
➢ Copia de Diplomas de cursos realizados.
➢ Certificado de antecedentes judiciales y penales.
➢ Certificado médico que acredite excelente salud física. (Otorgado por la Red de Salud
Pública del Ecuador o una Institución privada de salud año 2020).
➢ Certificado de evaluación psicológica. (Emitida por un Psicólogo de la Red de Salud
Pública del Ecuador o una Institución privada de salud año 2020).

Estamos gustosos de conocerte.

Visítanos en www.alfapaz.com o encuéntranos en nuestras redes sociales.";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:20px 20px 20px 0'>";
	echo "<strong >Perfecto. </strong>";
	echo "Gracias. <strong>$name_contact</strong>,<br> Tu mensaje ha sido enviado. En tu correo recibirás las instrucciones y requisitos de aplicación, esperamos tu respuesta.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
