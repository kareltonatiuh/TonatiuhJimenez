<?php
	/*Código PHPMailer de GitHub https://github.com/PHPMailer/PHPMailer
	y modificado por Ericka Zavala.*/
	
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	function enviaCorreo($nombre,$apellido,$correodestino,$contenido)
	{
		//Import PHP Files into the function usind require()
		require('Exception.php');
		require('PHPMailer.php');
		require('SMTP.php');

		// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try 
		{
		    //Server settings
		    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = $correodestino;                     // SMTP username
		    $mail->Password   = 'K4rel+tu';                               // SMTP password
		    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom($correodestino, $nombre." ".$apellido);
		    $mail->addAddress($correodestino);     // Add a recipient

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Tienes un nuevo mensaje del formulario.';
		    $mail->Body    = $contenido;
		    $mail->AltBody = $contenido;

		    $mail->send();
		    return true;
		} 
		catch (Exception $e) 
		{
		    return false;
		}

	}
?>