<?php
    //Importamos los estilos
    echo "<link rel='stylesheet' type='text/css' href='../css/consulta.css'>";
    $tipoconsulta=$_POST['tipoconsultaradio'];

    require("conexion.php");
    $conexion=conectaBD();
    if($tipoconsulta=="todos")
    {
    	$consultaSQL="SELECT * FROM productos";
    }
    elseif ($tipoconsulta=="porcodprod") 
    {
    	$codprod=strtoupper($_POST['codprodtxt']);
    	$consultaSQL="SELECT * FROM productos WHERE codprod LIKE '$codprod'";
    }

    $tabla= mysqli_query($conexion, $consultaSQL);
    echo "<header></header>";
    echo "<h2>Tabla de productos.</h2>";
    echo "<hr>";
    echo "<table>";
    		echo "<tr>";
    			echo "<th>Código de producto</th>";
    			echo "<th>Nombre del producto</th>";
    			echo "<th>Estado</th>";
    			echo "<th>Kilos(kg)</th>";
    			echo "<th>Costos</th>";
    			echo "<th>Caducidad</th>";
    		echo "</tr>";

    	while ($fila=mysqli_fetch_array($tabla)) {
    		echo "<tr>";
    			echo "<td>".$fila['codprod']."</td>";
    			echo "<td>".$fila['nombre']."</td>";
    			echo "<td>".$fila['estado']."</td>";
    			echo "<td>".$fila['kilos']."</td>";
    			echo "<td>$".$fila['costos']."</td>";
    			echo "<td>".$fila['caducidad']."</td>";
    		echo "</tr>";
    	}
    	echo "</table>";
        echo "<li><a href='empleado.php'>Regresar</a></li>";
    	mysqli_free_result($tabla);
    	mysqli_close($conexion);
?>