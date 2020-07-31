<html>
<head>
	<title>ventas</title>
</head>
<body>
<?php
include_once("config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$cliente = $_POST['cliente'];
	$empleado = $_POST['empleado'];
	$producto = $_POST['producto'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$s_date = $_POST['s_date'];
	$f_pago = $_POST['f_pago'];
	$contacto = $_POST['contacto'];
// verificador de variables
	if(empty($cliente) || empty($empleado) || empty($producto) || empty ($cantidad) || empty ($precio) || empty ($s_date) ||empty ($f_pago) || empty ($contacto)){
		if(empty($cliente)){
			echo "<h1>Campo : cliente esta vacio.</h1>";
		}
		if(empty($empleado)){
			echo "<h1>Campo: empleado esta vacio.</h1>";
		}		
		if(empty($producto)){
			echo "<h1>Campo: producto esta vacio.</h1>";
		}
		if(empty($cantidad)){
			echo "<h1>Campo: cantidad esta vacio.</h1>";
		}
		if(empty($precio)){
			echo "<h1>Campo: Precio esta vacio.</h1>";
		}
		if(empty($s_date)){
			echo "<h1>Campo: Fecha de venta esta vacio.</h1>";
		}
		if(empty($f_pago)){
			echo "<h1>Campo: Forma de pago esta vacio.</h1>";
		}
		if(empty($contacto)){
			echo "<h1>Campo: Tipo de moto esta vacio.</h1>";
		}
	echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO ventas (cliente, empleado, producto, cantidad, precio, s_date, f_pago, contacto) VALUES(:cliente, :empleado, :producto, :cantidad, :precio, :s_date, :f_pago, :contacto)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':cliente', $cliente);
		$query->bindparam(':empleado', $empleado);
		$query->bindparam(':producto', $producto);
		$query->bindparam(':cantidad', $cantidad);
		$query->bindparam(':precio', $precio);
		$query->bindparam(':s_date',$s_date);
		$query->bindparam(':f_pago',$f_pago);
		$query->bindparam(':contacto', $contacto);
		$query->execute();
		
		echo"<h1>Datos actualizados</h1>";
		echo"<br><a href='index.php'>ver resultados</a><br>";
		echo"<a href='/chepulsar.html'>INICIO</a>";
	}	
	}
?>
</body>
</html>