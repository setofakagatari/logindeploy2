<html>
<head>
	<title>Articulos</title>
</head>
<body>
<?php
include_once("config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$nombre = $_POST['nombre'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$garantia = $_POST['garantia'];
	$cantidad = $_POST['cantidad'];
// verificador de variables
	if(empty($nombre) || empty($producto) || empty ($precio) || empty ($direccion) || empty ($telefono) ||empty ($garantia) || empty ($cantidad)){
		if(empty($nombre)){
			echo "<h1>Campo: Nombre esta vacio.</h1>";
		}
		if(empty($producto)){
			echo "<h1>Campo: Producto esta vacio.</h1>";
		}
		if(empty($precio)){
			echo "<h1>Campo: Precio esta vacio.</h1>";
		}
		if(empty($direccion)){
			echo "<h1>Campo: Direccion esta vacio.</h1>";
		}
		if(empty($telefono)){
			echo "<h1>Campo: Telefono esta vacio.</h1>";
		}
		if(empty($garantia)){
			echo "<h1>Campo: Garantia esta vacio.</h1>";
		}
		if(empty($cantidad)){
			echo "<h1>Campo: Cantidad de compra esta vacio.</h1>";
		}		
		echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO compras (nombre, producto, precio, direccion, telefono, garantia, cantidad) VALUES(:nombre, :producto, :precio, :direccion, :telefono, :garantia, :cantidad)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':producto', $producto);
		$query->bindparam(':precio', $precio);
		$query->bindparam(':direccion',$direccion);
		$query->bindparam(':telefono',$telefono);
		$query->bindparam(':garantia', $garantia);
		$query->bindparam(':cantidad', $cantidad);
		$query->execute();
		
		echo"<h1>Datos actualizados</h1>";
		echo"<br><a href='index.php'>ver resultados</a>";
		echo"<a href='/chepulsar.html'>INICIO</a><br>";
	}	
	}
?>
</body>
</html>