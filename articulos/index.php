<?php
//incluir el config
include_once("../config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM articulos ORDER BY id DESC");
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>tabla de articulos</title>
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
		<td>Tipo</td>
		<td>Nombre</td>
		<td>Serial</td>
		<td>Marca</td>
		<td>Garantia</td>
		<td>Proveedor</td>
		<td>Cantidad</td>
		<td>Precio de compra</td>
		<td>Precio de venta</td>
		<td>Material</td>
		<td>Actualizar</td>
	</tr>
	<?php
	while($row =$result->fetch(PDO::FETCH_ASSOC)){
		echo "<tr class='tr2'>";
		echo "<td>".$row['tipo']."</td>";
		echo "<td>".$row['nombre']."</td>";
		echo "<td>".$row['serial']."</td>";
		echo "<td>".$row['marca']."</td>";
		echo "<td>".$row['garantia']."</td>";
		echo "<td>".$row['proveedor']."</td>";
		echo "<td>".$row['cantidad']."</td>";
		echo "<td>".$row['p_compra']."</td>";
		echo "<td>".$row['p_venta']."</td>";
		echo "<td>".$row['material']."</td>";
		echo "<td><button class='casillano'><a href=\"edit.php?id=$row[id]\"> <p>Editar</p></a></button> <br> <button class='casillano'><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Deseas elimimar esta fila?')\"><p>Borrar</p></a></button></td>";
		echo "</tr>";
	}
	?>
	</table>
	<form action="" id="form" method="post">
		<table class="table1">
			<tr>
				<td><p>Tipo</p></td>
				<td><input type="text" class="casillano" name="tipo"></td>
			</tr>
			<tr>
				<td><p>Nombre</p></td>
				<td><input type="text" class="casillano" name="nombre"></td>
			</tr>
			<tr>
				<td><p>Serial</p></td>
				<td><input type="text" class="casillano" name="serial"></td>
			</tr>
			<tr>
				<td><p>Marca</p></td>
				<td><input type="text" class="casillano" name="marca"></td>
			</tr>
			<tr>
				<td><p>Garantia</p></td>
				<td><input type="text" class="casillano" name="garantia"></td>
			</tr>
			<tr>
				<td><p>Proveedor</p></td>
				<td><input type="text" class="casillano" name="proveedor"></td>
			</tr>
			<tr>
				<td><p>Cantidad</p></td>
				<td><input type="text"class="casillano"  name="cantidad"></td>
			</tr>
			<tr>
				<td><p>Precio de compra</p></td>
				<td><input type="text" class="casillano" name="p_compra"></td>
			</tr>
			<tr>
				<td><p>Precio de venta</p></td>
				<td><input type="text" class="casillano" name="p_venta"></td>
			</tr>
			<tr>
				<td><p>Material</p></td>
				<td><input type="text" class="casillano" name="material"></td>
			</tr>
			<tr>
				
				<td><br><input type="submit" class="casillano" name="Submit" value="añadir articulo"></td>
			</tr>
		<table>
	</form>
	
	<?php
include_once("../config.php");
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
			echo "<p1>Campo: Tipo esta vacio.<br></p1>";
		}		
		if(empty($nombre)){
			echo "<p1>Campo: Nombre esta vacio.<br></p1>";
		}
		if(empty($serial)){
			echo "<p1>Campo: Serial esta vacio.<br></p1>";
		}
		if(empty($marca)){
			echo "<p1>Campo: Marca esta vacio.<br></p1>";
		}
		if(empty($garantia)){
			echo "<p1>Campo: Garantia esta vacio.<br></p1>";
		}
		if(empty($proveedor)){
			echo "<p1>Campo: Provedor esta vacio.<br></p1>";
		}
		if(empty($cantidad)){
			echo "<p1>Campo: Cantidad esta vacio.<br></p1>";
		}
		if(empty($p_compra)){
			echo "<p1>Campo: Precio de compra esta vacio.<br></p1>";
		}
		if(empty($p_venta)){
			echo "<p1>Campo: Precio de venta esta vacio.<br></p1>";
		}
		if(empty($material)){
			echo "<p1>Campo: Material esta vacio.<br></p1>";
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
		
		header ("Location: index.php");
	}	
	}
?>

</div>
</body>
</html>