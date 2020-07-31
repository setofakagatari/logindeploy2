<html>
<head>
	<title>Servicios</title>
</head>
<body>
<?php
include_once("config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
	$duracion = $_POST['duracion'];
	$encargado = $_POST['encargado'];
	$precio = $_POST['precio'];
	$equipamiento = $_POST['equipamiento'];
	$garantia = $_POST['garantia'];
	$tip_moto = $_POST['tip_moto'];
	$mar_moto = $_POST['mar_moto'];
// verificador de variables
	if(empty($tipo) || empty($nombre) || empty($duracion) || empty ($encargado) || empty ($precio) || empty ($equipamiento) ||empty ($garantia) || empty ($tip_moto) || empty ($mar_moto)){
		if(empty($tipo)){
			echo "<h1>Campo : Tipo esta vacio.</h1>";
		}
		if(empty($nombre)){
			echo "<h1>Campo: Nombre esta vacio.</h1>";
		}		
		if(empty($duracion)){
			echo "<h1>Campo: Duracion esta vacio.</h1>";
		}
		if(empty($encargado)){
			echo "<h1>Campo: Encargado esta vacio.</h1>";
		}
		if(empty($precio)){
			echo "<h1>Campo: Precio esta vacio.</h1>";
		}
		if(empty($equipamiento)){
			echo "<h1>Campo: Equipamiento esta vacio.</h1>";
		}
		if(empty($garantia)){
			echo "<h1>Campo: Garantia esta vacio.</h1>";
		}
		if(empty($tip_moto)){
			echo "<h1>Campo: Tipo de moto esta vacio.</h1>";
		}
		if(empty($Mar_moto)){
			echo "<h1>Campo: Marca de moto de compra esta vacio.</h1>";
		}		
		echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO servicios (tipo, nombre, duracion, encargado, precio, equipamiento, garantia, tip_moto, mar_moto) VALUES(:tipo, :nombre, :duracion, :encargado, :precio, :equipamiento, :garantia, :tip_moto, :mar_moto)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':tipo', $tipo);
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':duracion', $duracion);
		$query->bindparam(':encargado', $encargado);
		$query->bindparam(':precio', $precio);
		$query->bindparam(':equipamiento',$equipamiento);
		$query->bindparam(':garantia',$garantia);
		$query->bindparam(':tip_moto', $tip_moto);
		$query->bindparam(':mar_moto', $mar_moto);
		$query->execute();
		
		echo"<h1>Datos actualizados</h1>";
		echo"<br><a href='index.php'>ver resultados</a><br>";
		echo"<a href='/chepulsar.html'>INICIO</a><br>";
	}	
	}
?>
</body>
</html>