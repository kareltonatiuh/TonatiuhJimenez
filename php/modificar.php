<?php
  $buscacodprod="";
  $codprod="";
  $nomprod="";
  $sabor="";
  $existencias="";
  $precio="";
  $caducidad="";

  require("conexion.php");

  if(@$_POST["buscarbtn"]!="")
  {
    $conexion=conectaBD();
    $buscacodprod=$_POST["buscacodprodtxt"];
    $consultaSQL="SELECT * FROM productos WHERE codprod LIKE '$buscacodprod'";
    $registro=mysqli_query($conexion, $consultaSQL);
    while($fila=mysqli_fetch_array($registro))
    {
      $codprod=$fila['codprod'];
      $nomprod=$fila['nombre'];
      $sabor=$fila['estado'];
      $existencias=$fila['kilos'];
      $precio=$fila['costos'];
      $caducidad=$fila['caducidad'];
    }
    mysqli_free_result($registro);
    mysqli_close($conexion);
  }
  if (@$_POST['modificarbtn']!="") 
  {
    $conexion=conectaBD();
    $buscacodprod=strtoupper($_POST["buscacodprodtxt"]);
    $codprod=strtoupper($_POST["codprodtxt"]);
    $nomprod=strtoupper($_POST["nomprodtxt"]);
    $sabor=strtoupper($_POST["sabortxt"]);
    $existencias=$_POST["existenciastxt"];
    $precio=$_POST["preciotxt"];
    $caducidad=$_POST["caducidadtxt"];

    $consultaSQL="UPDATE productos SET codprod='$codprod',
                                       nombre='$nomprod',
                                       estado='$sabor',
                                       kilos=$existencias,
                                       costos=$precio,
                                       caducidad='$caducidad'
                  WHERE codprod LIKE '$buscacodprod'";
    if(mysqli_query ($conexion,$consultaSQL))
    {
      echo "<div>";
        echo "La modificación se ha realizado con éxito.";
        echo "<img src='../images/exito.png'>";
      echo "</div>";
    }else
    {
      echo "<div>";
        echo "Se produjo un error al modificar los datos del producto.";
        echo "<img src='../images/error.png'>";
      echo "</div>";
    }
  }
  
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Modificación de datos.</title>
  <link rel="stylesheet" type="text/css" href="../css/modificar.css">
</head>
<body>
  <header></header>
  <form action="modificar.php" method="post" id="buscar">
    <h1>Modifica un producto.</h1>
    <label for="buscacodprodtxt">Introduzca el código del producto a modificar:</label> 
    <input type="text" name="buscacodprodtxt" placeholder="Código de Producto" required class="cajas">
    <input type="submit" name="buscarbtn" value="Buscar Producto" id="boton" class="cajas">
  </form>
  <hr><!--Línea Divisora-->
  <form action="modificar.php" method="post" id="modificar">
    <h1>Datos del producto.</h1>
    <!--Atributo oculto (hidden) para almacenar el valor de buscacodprod del formulario anterior-->
    <input type="hidden" name="buscacodprodtxt" value="<?php echo $buscacodprod;?>">
    <input type="text" name="codprodtxt" placeholder="Código de Producto" required class="cajas" value="<?php echo $codprod;?>">
    <input type="text" name="nomprodtxt" placeholder="Nombre del Producto" required class="cajas" value="<?php echo $nomprod;?>">
    <input type="text" name="sabortxt" placeholder="Estado" required class="cajas" value="<?php echo $sabor;?>">
    <input type="number" name="existenciastxt" placeholder="Kilos" required class="cajas" value="<?php echo $existencias;?>">
    <input type="number" name="preciotxt" placeholder="Costos" required class="cajas" value="<?php echo $precio;?>">
    <label for="caducidadtxt">Fecha de Caducidad:</label>
    <input type="date" name="caducidadtxt" required class="cajas" value="<?php echo $caducidad;?>">
    <input type="submit" name="modificarbtn" value="Modificar Datos" id="boton" class="cajas">
  </form>
  <li><a href="empleado.php">Regresar</a></li>
</body>
</html>