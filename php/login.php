<?php
		echo "<link rel='stylesheet' type='text/css' href='../css/login.css'>";
		require("conexion.php")	;
		$conexion=conectaBD();

		$correo=$_POST["correotxt"];
		$password=$_POST["passwordtxt"];

		$consultaSQL=sprintf("SELECT * FROM usuarios WHERE correo LIKE '%s' AND password LIKE '%s'", $correo, md5($password));

		$tabla=mysqli_query($conexion, $consultaSQL);
		$registro= mysqli_fetch_assoc($tabla);
		$cantidad=mysqli_num_rows($tabla);

		if($cantidad==1)
		{
			session_start();
			$_SESSION["nombre"]=$registro["nombre"];
			$_SESSION["paterno"]=$registro["paterno"];
			$_SESSION["materno"]=$registro["materno"];
			$_SESSION["correo"]=$registro["correo"];
			$_SESSION["password"]=$registro["password"];
			$_SESSION["fecha_nac"]=$registro["fecha_nac"];
			$_SESSION["sexo"]=$registro["sexo"];
			mysqli_free_result($tabla);
			header("Location: empleado.php");
		}
		else
		{
			echo "<div id='errorlogin'>";
				echo "Usuario o contraseña incorrectos.";
				
			echo "</div>";
		}
		mysqli_close($conexion);
?>