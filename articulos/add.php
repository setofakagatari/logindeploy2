<html>
<head>
	<title>Articulos</title>
</head>
<body>
<?php
include_once("config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
	$serial = $_POST['serial'];
	$marca = $_POST['marca'];
	$garantia = $_POST['garantia'];
	$proveedor = $_POST['proveedor'];
	$cantidad = $_POST['cantidad'];
	$p_compra = $_POST['p_compra'];
	$p_venta = $_POST['p_venta'];
	$material = $_POST['material'];
// verificador de variables
	if(empty($tipo) || empty($nombre) || empty ($serial) || empty ($marca) || empty ($garantia) ||empty ($proveedor) || empty ($cantidad) || empty ($p_compra) || empty ($p_venta) || empty ($material)){
		if(empty($tipo)){
			echo "<h1>Campo: Tipo esta vacio.</h1>";
		}		
		if(empty($nombre)){
			echo "<h1>Campo: Nombre esta vacio.</h1>";
		}
		if(empty($serial)){
			echo "<h1>Campo: Serial esta vacio.</h1>";
		}
		if(empty($marca)){
			echo "<h1>Campo: Marca esta vacio.</h1>";
		}
		if(empty($garantia)){
			echo "<h1>Campo: Garantia esta vacio.</h1>";
		}
		if(empty($proveedor)){
			echo "<h1>Campo: Provedor esta vacio.</h1>";
		}
		if(empty($cantidad)){
			echo "<h1>Campo: Cantidad esta vacio.</h1>";
		}
		if(empty($p_compra)){
			echo "<h1>Campo: Precio de compra esta vacio.</h1>";
		}
		if(empty($p_venta)){
			echo "<h1>Campo: Precio de venta esta vacio.</h1>";
		}
		if(empty($material)){
			echo "<h1>Campo: Material esta vacio.</h1>";
		}
		echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO articulos (tipo, nombre, serial, marca, garantia, proveedor, cantidad, p_compra, p_venta, material) VALUES(:tipo, :nombre, :serial, :marca, :garantia, :proveedor, :cantidad, :p_compra, :p_venta, :material)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':tipo', $tipo);
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':serial', $serial);
		$query->bindparam(':marca', $marca);
		$query->bindparam(':garantia',$garantia);
		$query->bindparam(':proveedor',$proveedor);
		$query->bindparam(':cantidad', $cantidad);
		$query->bindparam(':p_compra', $p_compra);
		$query->bindparam(':p_venta', $p_venta);
		$query->bindparam(':material', $material);
		$query->execute();
		
		echo"<h1>Datos actualizados</h1><br>";
		echo"<br><a href='index.php'>ver resultados</a><br>";
		echo"<a href='/chepulsar.html'>volver al inicio</a>";
	}	
	}
?>
</body>
</html>