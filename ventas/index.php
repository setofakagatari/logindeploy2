<?php
//incluir el config
include_once("../config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM ventas ORDER BY id DESC");
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>tabla de ventas</title>
	<link rel="stylesheet" type="text/css" href="../css.css">
</head>

<body>
<div class="contenedor">
<div class="header">
	<h1><?php echo $_SESSION['name'];?> </h1>
</div>
<div class="header2">
   
 		
		<button class="casillano"><a href="../dashboard.php" > <p>volver al <br>inicio</p></a></button><pre> </pre>
		
		<button class="casillano"><a href="../logout.php"><p>cerrar <br>sesion</p></a></button><pre> </pre>
		
		
	
</div>
<table class="table0">
	<tr class="tr1">
		<td>Cliente</td>
		<td>Empleado</td>
		<td>Producto</td>
		<td>Cantidad</td>
		<td>Precio</td>
		<td>Fecha de venta</td>
		<td>Forma de pago</td>
		<td>Contacto</td>
		<td>Actualizar</td>
	</tr>
	<?php
	while($row =$result->fetch(PDO::FETCH_ASSOC)){
		echo "<tr class='tr2'>";
		echo "<td>".$row['cliente']."</td>";
		echo "<td>".$row['empleado']."</td>";
		echo "<td>".$row['producto']."</td>";
		echo "<td>".$row['cantidad']."</td>";
		echo "<td>".$row['precio']."</td>";
		echo "<td>".$row['s_date']."</td>";
		echo "<td>".$row['f_pago']."</td>";
		echo "<td>".$row['f_pago']."</td>";
		echo "<td><button class='casillano'><a href=\"edit.php?id=$row[id]\"> <p>Edit</p></a></button> <br> <button class='casillano'><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Deseas elimimar esta fila')\"><p>Borrar</p></a></button></td>";
		echo "</tr>";
	}
	?>
	</table>
	<form action="" id="form" method="post">
		<table class="table1">
			<tr>
				<td><p>Cliente</p></td>
				<td><input type="text" class="casillano" name="cliente"></td>
			</tr>
			<tr>
				<td><p>Empleado</p></td>
				<td><input type="text" class="casillano" name="empleado"></td>
			</tr>
			<tr>
				<td><p>Producto</p></td>
				<td><input type="text" class="casillano" name="producto"></td>
			</tr>
			<tr>
				<td><p>Cantidad</p></td>
				<td><input type="text" class="casillano" name="cantidad"></td>
			</tr>
			<tr>
				<td><p>Precio</p></td>
				<td><input type="text" class="casillano" name="precio"></td>
			</tr>
			<tr>
				<td><p>Fecha de venta</p></td>
				<td><input type="text" class="casillano" name="s_date"></td>
			</tr>
			<tr>
				<td><p>Forma de pago</p></td>
				<td><input type="text" class="casillano" name="f_pago"></td>
			</tr>
			<tr>
				<td><p>Contacto</p></td>
				<td><input type="text" class="casillano" name="contacto"></td>
			</tr>
			<tr>
				
				<td><br><input type="submit" class="casillano" name="Submit" value="Añadir venta"></td>
			</tr>
		</table>
	</form>
	
	<?php
include_once("../config.php");
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
			echo "<p>Campo : cliente esta vacio.</p>";
		}
		if(empty($empleado)){
			echo "<p>Campo: empleado esta vacio.</p>";
		}		
		if(empty($producto)){
			echo "<p>Campo: producto esta vacio.</p>";
		}
		if(empty($cantidad)){
			echo "<p>Campo: cantidad esta vacio.</p>";
		}
		if(empty($precio)){
			echo "<p>Campo: Precio esta vacio.</p>";
		}
		if(empty($s_date)){
			echo "<p>Campo: Fecha de venta esta vacio.</p>";
		}
		if(empty($f_pago)){
			echo "<p>Campo: Forma de pago esta vacio.</p>";
		}
		if(empty($contacto)){
			echo "<p>Campo: Tipo de moto esta vacio.</p>";
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
		
		header("location:index.php");
	}	
	}
?>

</div>
</body>
</html>