<?php
	$correodestino="sakasdas.71@gmail.com";

	$nombre=$_POST["nombretxt"];
	$apellido=$_POST["apellidotxt"];
	$correoorigen=$_POST["correotxt"];
	
	$mensaje=$_POST["mensajetxt"];

	$contenido="Nombre: $nombre $apellido<br>Correo: $correoorigen<br>Mensaje: $mensaje";

	require("Mail.php");

	if(enviaCorreo($nombre, $apellido, $correodestino, $contenido))
	{
		echo "listo";
		header("Location:../contacto.html");
	}else
	{
		echo "error";
	//	header("Location:../error.html");
	}
?>