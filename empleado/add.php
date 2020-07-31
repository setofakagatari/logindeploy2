<html>
<head>
	<title>Empleados</title>
</head>
<body>
<?php
include_once("config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$nombre = $_POST['nombre'];
	$contacto = $_POST['contacto'];
	$id_num = $_POST['id_num'];
	$h_date = $_POST['h_date'];
	$nacionalidad = $_POST['nacionalidad'];
	$cargo = $_POST['cargo'];
	$b_date = $_POST['b_date'];
	$eps = $_POST['eps'];
	$arl = $_POST['arl'];
	$direccion = $_POST['direccion'];
// verificador de variables
	if(empty($nombre) || empty($contacto) || empty ($id_num) || empty ($h_date) || empty ($nacionalidad) ||empty ($cargo) || empty ($b_date) || empty ($eps) || empty ($arl) || empty ($direccion)){
		if(empty($nombre)){
			echo "<h1>Campo: Nombre esta vacio.</h1>";
		}		
		if(empty($contacto)){
			echo "<h1>Campo: Contacto esta vacio.</h1>";
		}
		if(empty($id_num)){
			echo "<h1>Campo: Numero de documento esta vacio.</h1>";
		}
		if(empty($h_date)){
			echo "<h1>Campo: Fecha de contratacion esta vacio.</h1>";
		}
		if(empty($nacionalidad)){
			echo "<h1>Campo: Nacionalidad esta vacio.</h1>";
		}
		if(empty($cargo)){
			echo "<h1>Campo: Cargo esta vacio.</h1>";
		}
		if(empty($b_date)){
			echo "<h1>Campo: Fecha de nacimiento esta vacio.</h1>";
		}
		if(empty($eps)){
			echo "<h1>Campo: EPS de compra esta vacio.</h1>";
		}
		if(empty($arl)){
			echo "<h1>Campo: ARL de venta esta vacio.</h1>";
		}
		if(empty($direccion)){
			echo "<h1>Campo: Direccion esta vacio.</h1>";
		}
		echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO empleado (nombre, contacto, id_num, h_date, nacionalidad, cargo, b_date, eps, arl, direccion) VALUES(:nombre, :contacto, :id_num, :h_date, :nacionalidad, :cargo, :b_date, :eps, :arl, :direccion)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':contacto', $contacto);
		$query->bindparam(':id_num', $id_num);
		$query->bindparam(':h_date', $h_date);
		$query->bindparam(':nacionalidad',$nacionalidad);
		$query->bindparam(':cargo',$cargo);
		$query->bindparam(':b_date', $b_date);
		$query->bindparam(':eps', $eps);
		$query->bindparam(':arl', $arl);
		$query->bindparam(':direccion', $direccion);
		$query->execute();
		
		echo"<h1>Datos actualizados</h1>";
		echo"<br><a href='index.php'>ver resultados</a>";
		echo"<a href='/chepulsar.html'>INICIO</a>";
	}	
	}
?>
</body>
</html>