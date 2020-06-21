<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Alfapaz - Seguridad Privada">
	<meta name="author" content="Cubesquad">
	<title>ALFAPAZ - Seguridad Privada</title>

  <!-- Favicons  ACTUALIZAR FAVICONS 196X127-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="&nbsp;"/>
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <!-- FA-icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/elegant_font/elegant_font.min.css" rel="stylesheet">
	<link href="css/fontello/css/fontello.min.css" rel="stylesheet">

	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "index.html"
    }
    </script>

</head>
<body id="confirmation" onLoad="setTimeout('delayedRedirect()', 10000)">
<?php
						$mail = $_POST['email_quote'];

						/*$subject = "".$_POST['subject'];*/
						$to = "info@alfapaz.com";
						$subject = "Solcitud de visita: Alfapaz";
						$headers = "From: Alfapaz -Website <info@alfapaz.com>";

						$message = "\nInformación personal";
						$message .= "\nNombre: " . $_POST['firstname_quote'];
						$message .= "\nApellido: " . $_POST['lastname_quote'];
						$message .= "\nEmail: " . $_POST['email_quote'];
						$message .= "\nTelefono: " . $_POST['phone_quote'];

						$message .= "\n\nDirección";
						$message .= "\nCiudad: " . $_POST['city_quote'];
						$message .= "\nCalle: " . $_POST['street_quote'];
						$message .= "\nProvincia: " . $_POST['state_quote'];
						$message .= "\nCódigo postal: " . $_POST['postal_code_quote'];
						$message .= "\n\nHorario preferido";
						$message .= "\nFecha: " . $_POST['date_quote'];
						$message .= "\nHora: " . $_POST['time_quote'];

						$message .= "\n\nInformación Adicional";
						$message .= "\nTiene seguro? " . $_POST['option_1'];
						$message .= "\nCliente nuevo? " . $_POST['option_2'];
						$message .= "\nEs urgente? " . $_POST['option_3'];
						$message  .= "\n\nDatos adicionales";
						$message .= "\nMensaje: " . $_POST['message_quote'];

						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);

						//Confirmation page
						$user = "$mail";
						$usersubject = "Gracias";
						$userheaders = "De: info@alfapaz.com\n";
						/*$usermessage = "Thank you for your time. Your request is successfully submitted.\n"; WITH OUT SUMMARY*/
						//Confirmation page WITH  SUMMARY
						$usermessage = "Gracias por tu tiempo. Tu solicitud se ha enviado correctamente.\n\n  \n$message";
						mail($user,$usersubject,$usermessage,$userheaders);

?>

<!-- END SEND MAIL SCRIPT -->
<div id="success">
	<div class="icon icon--order-success svg">
		<svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                <g fill="none" stroke="#8EC343" stroke-width="2">
                  <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                  <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                </g>
              </svg>
	</div>
	<h4><span>Gracias!</span>La solicitud se ha enviado correctamente.</h4>
	<small>Se te redirigirá de vuelta en 5 segundos.</small>
</div>
</body>
</html>
