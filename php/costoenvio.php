<?php
	$cp=$_POST["cptxt"];
	echo "<link rel='stylesheet' type='text/css' href='../css/envio.css'>";
	echo "<link rel='stylesheet' type='text/css' href='../css/estilo.css'>";
	echo "<div>";
		echo "<h2>Costo del envio</h2>";
		echo "<p<El código postal es: $cp</p>";
		if ($cp>=4000 && $cp<=4999) {
			# code...
			echo "<p>El precio por el envio podra ser de $100MXN.</p>";
		}elseif ($cp>=5000 && $cp<=5999) {
			# code...
			echo "<p>El precio por el envio podra ser de $150MXN.</p>";
		}elseif ($cp>=6000 && $cp<=6999) {
			# code...
			echo "<p>El precio por el envio podra ser de $200MXN.</p>";
		}else
		{
			echo "<p>El código postal introducido no es valido.</p>";
		}
		echo "<hr>";
		echo "<div id='cuadroregresa'>";
			echo "<br><a href='../envio.html'>Regresar</a>";
		echo "</div>";
	echo "</div>";
	?>