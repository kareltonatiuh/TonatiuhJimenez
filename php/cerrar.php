<?php
session_start();
if (isset($_GET["cerrar"])) 
{
	$_SESSION["nombre"]=NULL;
	$_SESSION["paterno"]=NULL;
	$_SESSION["materno"]=NULL;
	$_SESSION["correo"]=NULL;
	$_SESSION["password"]=NULL;
	$_SESSION["fecha_nac"]=NULL;
	$_SESSION["sexo"]=NULL;

	unset($_SESSION["nombre"]);
	unset($_SESSION["paterno"]);
	unset($_SESSION["materno"]);
	unset($_SESSION["correo"]);
	unset($_SESSION["password"]);
	unset($_SESSION["fecha_nac"]);
	unset($_SESSION["sexo"]);
	session_unset();

	if (ini_get("session.use_cookies")) 
	{
		$params=session_get_cookie_params();
		setcookie(session_name(),'',time()-42000,$params["path"], $params["domain"], $params["secure"],$params["httponly"]);
	}
	session_destroy();
	header("Location:../index.html");
}
	
?>