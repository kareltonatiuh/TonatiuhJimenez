<?php
    //Importamos los estilos
    echo "<link rel='stylesheet' type='text/css' href='../css/eliminar.css'>";
    $codprod=strtoupper($_POST['codprodtxt']);
    require("conexion.php");
    $conexion=conectaBD();

    $hayregistro=mysqli_query($conexion, "SELECT * FROM productos WHERE codprod LIKE '$codprod'");
    $cuantosregistros=mysqli_num_rows($hayregistro);

    $consultaSQL="DELETE FROM productos WHERE codprod LIKE '$codprod'";

    if(mysqli_query ($conexion,$consultaSQL) && $cuantosregistros!=0)
    {
    	echo "<div>";
    		echo "El producto se ha eliminado satisfactoriamente.";
    		echo "<li><a href='empleado.php'>Regresar</a></li>";
    	echo "</div>";
    }else
    {
    	echo "<div>";
    		echo "Se produjo un error al eliminar el producto o producto inexistente.";
    		echo "<img src='../images/error.png'>";
    	echo "</div>";
    }
    mysqli_free_result($hayregistro);
    mysqli_close($conexion);
?>