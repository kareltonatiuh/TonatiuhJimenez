<?php
function conectaBD()
{
	$host= "localhost: 3306"; //Esta es la referencia a nuestro servidor local, también puede ser una IP de un servidor remoto.
	$usuario= "root"; //Este es el nombre de usuario del servidor local, por defecto es root.
	$clave= ""; //Coloque entre las comillas la contraseña de phpMyAdmin, en caso de no tener dejar en blanco.
	$basededatos= "bd_ejemplo"; //Coloque entre las comillas el nombre de su base de datos.

	/*Con la función mysqli_connect() intentamos iniciar sesión en phpMyAdmin ingresando como parámetros el host (local o remoto), el usuario y la contraseña, en caso de fracaso se imprime el mensaje de error en pantalla.*/
	$conexion= mysqli_connect($host, $usuario, $clave) or die ("Hubo un error al conectarse a phpMyAdmin, verifica que tu usuario y contraseña sean correctos y que tu servidor $host se encuentre activo y en ejecución.");

	/*Una vez iniciada la sesión se intenta seleccionar la base de datos especificada, en caso de fracaso se imprime el mensaje de error en pantalla.*/
	mysqli_select_db($conexion, $basededatos) or die ("Hubo un error al conectarse a la base de datos, verifica que exista en phpMyAdmin o que el nombre de la misma sea correcto y vuelve a intentarlo.");

	/*Se regresa el estátus de la conexión con la base de datos (éxito o fracaso).*/
	return $conexion;
}
