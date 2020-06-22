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
$disponibilidad   = $_POST['disponibilidad'];
$ciudad   = $_POST['ciudad'];
$decision   = $_POST['decision'];
$empresa   = $_POST['empresa'];
$cv   = $_POST['cv'];


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
$e_body = "Has sido contactado por $name_contact $lastname_contact con el mensaje que detalla de la siguiente manera:. 
Ha respondido en ¿Cuándo puedes comenzar?: $disponibilidad 
Ha respondido en ¿A qué ciudad aplicarías?: $ciudad 
Ha respondido en ¿Estarías dispuesto a residir en otra ciudad?: $decision
Ha respondido en ¿Cuál fue la última empresa en la que trabajaste?: $empresa 
Ha adjuntado su hoja de vida.: $cv " . PHP_EOL . PHP_EOL;

$e_content = "\"$disponibilidad\"" . PHP_EOL . PHP_EOL;
$e_reply = "Puedes responder a $lastname_contact via email, $email_contact o por teléfono al $phone_contact";
$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: $email_contact" . PHP_EOL;
$headers .= "Reply-To: $email_contact" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_contact";
$usersubject = "Gracias por contactarnos";
$userheaders = "From: info@alfapaz.com\n";
$usermessage = "Gracias por contactarnos, te responderemos muy pronto!";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding:20px 20px 20px 0'>";
	echo "<strong >Perfecto. </strong>";
	echo "Gracias. <strong>$name_contact</strong>,<br> Tu mensaje ha sido enviado, te contactaremos en breve.";
	echo "</div>";

} else {

	echo 'ERROR!';

}
