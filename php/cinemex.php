<?php
	$nombre=$_POST["nombretxt"];
	$tipoboleto=$_POST["tipoboletochk"];
	$tipopago=$_POST["pagocmd"];
	$funcion1=$_POST["funcion1lst"];
	$funcion2=$_POST["funcion2lst"];
	$funcion3=$_POST["funcion3lst"];
	$funcion4=$_POST["funcion4lst"];
	$opcion=$_POST["frecuenteradio"];
	$pago=0;
	$d;
	$pagot;
	echo "<link rel='stylesheet' type='text/css' href='../css/estilo.css'>";
	echo "<link rel='stylesheet' type='text/css' href='../css/cinemex.css'>";
	
	echo "<div id='datoscompra'>";
		echo "<br>***TICKET***";
		echo "<br>Nombre: $nombre";

		$items=count($tipoboleto);
		echo "<br>Tamaño de la pizza";
		if (isset($tipoboleto)) 
		{
			# code...
			for ($indice=0; $indice < $items; $indice++) { 
				# code...
				echo "<br>$tipoboleto[$indice]";
				if ($tipoboleto[$indice]=="Grande") {
					# code...
					echo "<br>--------------------------------";
					$cantgrande=$_POST["cantgrandetxt"];
					$pago=$pago+$cantgrande*100;
					echo "<br>Pizzas Grandes: $cantgrande";
					echo "<br>Ingrediente: $funcion1";
					echo "<br>--------------------------------";
				}else
				if ($tipoboleto[$indice]=="Mediana") {
					$cantmediana=$_POST["cantmedianatxt"];
					$pago=$pago+$cantmediana*70;
					echo "<br>--------------------------------";
					echo "<br>Pizzas Medianas: $cantmediana";
					echo "<br>Ingrediente: $funcion2";
					echo "<br>--------------------------------";
				}else
				if ($tipoboleto[$indice]=="Chica") {
					# code...
					$cantchica=$_POST["cantchicatxt"];
					$pago=$pago+$cantchica*50;
					echo "<br>--------------------------------";
					echo "<br>Pizzas Chicas: $cantchica";
					echo "<br>Ingrediente: $funcion3";
					echo "<br>--------------------------------";
				}else
				if ($tipoboleto[$indice]=="rara") {
					# code...
					$cantrara=$_POST["cantraratxt"];
					$pago=$pago+$cantrara*60;
					echo "<br>--------------------------------";
					echo "<br>Pizzas Chicas: $cantrara";
					echo "<br>Ingrediente: $funcion4";
					echo "<br>--------------------------------";
				}
			}
		}
		echo "<br>Pago: $tipopago";
		switch ($opcion) {
			case "si":
				# code...
			echo "<br><br>*****Descuento*****";
			$d=$pago*0.2;
			$pagot=$pago-$d;
			echo "<br>Pago Total: $$pagot";
				break;
			case "no":
				echo"<br>Pago Total: $$pago";
			default:
				# code...
			echo"<br>Opcion no valida";
				break;
		}

		
		
		
		echo "<br><a href='../index.html'>Regresa a Inicio</a>";
	echo "</div>";
?>