<?php
//incluir el config
include_once("../config.php");
//actualizar las variables
if(isset($_POST['Update'])){
	$id = $_POST['id'];
	$cliente = $_POST['cliente'];
	$empleado = $_POST['empleado'];
	$producto = $_POST['producto'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$s_date = $_POST['s_date'];
	$f_pago = $_POST['f_pago'];
	$contacto = $_POST['contacto'];
	//verificar variables
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
			echo "<h1>Campo: contacto esta vacio.</h1>";
		}			
	} else {
		//insertar nuevos datos
		$sql = "UPDATE ventas SET cliente=:cliente, empleado=:empleado, producto=:producto, cantidad=:cantidad, precio=:precio, s_date=:s_date, f_pago=:f_pago, contacto=:contacto WHERE id=:id";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':id',$id);
		$query->bindparam(':cliente', $cliente);
		$query->bindparam(':empleado', $empleado);
		$query->bindparam(':producto', $producto);
		$query->bindparam(':cantidad', $cantidad);
		$query->bindparam(':precio', $precio);
		$query->bindparam(':s_date',$s_date);
		$query->bindparam(':f_pago',$f_pago);
		$query->bindparam(':contacto', $contacto);
		$query->execute();
		header ("Location: index.php");
		}
}
?>
<?php
//Get id
$id = $_GET['id'];
//selecionar linea
$sql="SELECT * FROM ventas WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' =>$id));
while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$cliente = $row['cliente'];
		$empleado = $row['empleado'];
		$producto = $row['producto'];
		$cantidad = $row['cantidad'];
		$precio = $row['precio'];
		$s_date = $row['s_date'];
		$f_pago = $row['f_pago'];
		$contacto = $row['contacto'];
}
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>Ventas</title><link rel="stylesheet" type="text/css" href="../css1.css">
</head>
<body >
	<div class="contenedor">
		<div class="login">
		<h1>Editar</h1>
	
	<form action="edit.php" method="post">
		
			
				<p>cliente</p>
				<p><input type="text" class="casillano" name="cliente" value="<?php echo $cliente;?>"></p>
			
			
				<p>empleado</p>
				<p><input type="text" class="casillano" name="empleado" value="<?php echo $empleado;?>"></p>
			
			
				<p>producto</p>
				<p><input type="text" class="casillano" name="producto" value="<?php echo $producto;?>"></p>
			
			
				<p>cantidad</p>
				<p><input type="text" class="casillano" name="cantidad" value="<?php echo $cantidad;?>"></p>
			
			
				<p>Precio</p>
				<p><input type="text" class="casillano" name="precio" value="<?php echo $precio;?>"></p>
			
			
				<p>Fecha de venta</p>
				<p><input type="text" class="casillano" name="s_date" value="<?php echo $s_date;?>"></p>
			
			
				<p>Forma de pago</p>
				<p><input type="text" class="casillano" name="f_pago" value="<?php echo $f_pago;?>"></p>
			
			
				<p>Contactos</p>
				<p><input type="text" class="casillano" name="contacto" value="<?php echo $contacto;?>"></p>
			
			
				<p><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></p>
				<p><input type="submit" class="casillano" name="Update" value="Actualizar"></p>
			
		
	</form>
		</div>
	</div>
	
</body>
</html>