<?php
	session_start();
	if ($_SESSION["correo"]==NULL && $_SESSION["password"]==NULL) {
		header("Location:../index.html");
	}
	else
	{
		$nombre=$_SESSION["nombre"];
		$paterno=$_SESSION["paterno"];
		$materno=$_SESSION["materno"];
		$correo=$_SESSION["correo"];
		$fecha_nac=$_SESSION["fecha_nac"];
		$sexo=$_SESSION["sexo"];
	}
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pizzeria</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/empleado.css">
	
</head>
<body>
	<header></header>
	<section>
		<?php
			echo "<h1>Bienvenido(a) $nombre $paterno $materno.</h1>";
			echo "<hr>";
			echo "<p>Estos son tus datos registrados:</p>";
			echo "<ul>";
				echo "<li>Correo: $correo</li>";
				echo "<li>Fecha de Nacimiento: $fecha_nac</li>";
				echo "<li>Género: $sexo</li>";
			echo "</ul>";
		?>
		<ul>
			<h1>Control de Productos.</h1>
			<li><a href="../eliminar.html">Eliminar datos</a></li>
			<li><a href="../consulta.html">Consulta de datos</a></li>
			<li><a href="../php/modificar.php">Modificar datos</a></li>
			<br>
			<br>
			<br>
			<li><a href="cerrar.php?cerrar=yes">Cerrar Sesión</a></li>
		</ul>
	</section>		
</body>
</html>