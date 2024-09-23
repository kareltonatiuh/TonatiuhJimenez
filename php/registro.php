<?php
    //Importamos los estilos
    echo "<link rel='stylesheet' type='text/css' href='../css/registro.css'>"; 

    $nombre=strtoupper($_POST['nombretxt']) ;
    $paterno=strtoupper($_POST['paternotxt']);
    $materno=strtoupper($_POST['maternotxt']);
    $sexo=strtoupper($_POST['sexoradio']);

    $correo=strtolower($_POST['correotxt']);

    $password=$_POST['passwordtxt'];
    $fecha_nac=$_POST['fecha_nactxt'];

    $passwordENC=md5($password);

    require("conexion.php");
    $conexion=conectaBD();

    $consultaSQL="INSERT INTO usuarios (nombre, paterno, materno, correo, password, fecha_nac, sexo) VALUES ('$nombre','$paterno','$materno','$correo','$passwordENC','$fecha_nac','$sexo')";

    if(mysqli_query ($conexion,$consultaSQL))
    {
    	echo "<div>";
    		echo "El registro se ha realizado con éxito.";
    		header("Location: ../inicio.html");
    	echo "</div>";
    }else
    {
    	echo "<div>";
    		echo "Se produjo un error al registrar el usuario o usuario ya existente..";
    	echo "</div>";
    }
    mysqli_close($conexion);
?>