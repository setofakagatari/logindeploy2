<?php
//incluir el config
include_once("../config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM compras ORDER BY id DESC");
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>tabla de compras</title>
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
<table class="table0" >
	<tr class="tr1">
		<td>Nombre</td>
		<td>Producto</td>
		<td>Precio</td>
		<td>Direccion</td>
		<td>Telefono</td>
		<td>Garantia</td>
		<td>Cantidad</td>
		<td>Actualizar</td>
	</tr>
	<?php
	while($row =$result->fetch(PDO::FETCH_ASSOC)){
		echo "<tr class='tr2'>";
		echo "<td>".$row['nombre']."</td>";
		echo "<td>".$row['producto']."</td>";
		echo "<td>".$row['precio']."</td>";
		echo "<td>".$row['direccion']."</td>";
		echo "<td>".$row['telefono']."</td>";
		echo "<td>".$row['garantia']."</td>";
		echo "<td>".$row['cantidad']."</td>";
		echo "<td><button class='casillano'><a href=\"edit.php?id=$row[id]\"> <p>Edit</p></a></button> <br> <button class='casillano'><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Deseas elimimar esta fila')\"><p>Borrar</p></a></button></td>";
		echo "</tr>";
	}
	?>
	</table>
	<form action="" id="form" method="post">
		<table class="table1">
			<tr>
				<td><p>Nombre</p></td>
				<td><input type="text" class="casillano" name="nombre"></td>
			</tr>
			<tr>
				<td><p>Producto</p></td>
				<td><input type="text" class="casillano" name="producto"></td>
			</tr>
			<tr>
				<td><p>Precio</p></td>
				<td><input type="text"  class="casillano" name="precio"></td>
			</tr>
			<tr>
				<td><p>Direccion</p></td>
				<td><input type="text" class="casillano" name="direccion"></td>
			</tr>
			<tr>
				<td><p>Telefono</p></td>
				<td><input type="text" class="casillano" name="telefono"></td>
			</tr>
			<tr>
				<td><p>Garantia</p></td>
				<td><input type="text" class="casillano" name="garantia"></td>
			</tr>
			<tr>
				<td><p>Cantidad</p></td>
				<td><input type="text" class="casillano" name="cantidad"></td>
			</tr>
			<tr>
				
				<td><br><input type="submit" class="casillano" name="Submit" value="añadir compra"></td>
			</tr>
		<table>
	</form>
	<?php
include_once("../config.php");
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
			echo "<p>Campo: Nombre esta vacio.</p>";
		}
		if(empty($producto)){
			echo "<p>Campo: Producto esta vacio.</p>";
		}
		if(empty($precio)){
			echo "<p>Campo: Precio esta vacio.</p>";
		}
		if(empty($direccion)){
			echo "<p>Campo: Direccion esta vacio.</p>";
		}
		if(empty($telefono)){
			echo "<p>Campo: Telefono esta vacio.</p>";
		}
		if(empty($garantia)){
			echo "<p>Campo: Garantia esta vacio.</p>";
		}
		if(empty($cantidad)){
			echo "<p>Campo: Cantidad de compra esta vacio.</p>";
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
		
		header ("location: index.php");
	}	
	}
?>

	</div>
</body>
</html>