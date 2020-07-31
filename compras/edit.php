<?php
//incluir el config
include_once("../config.php");
//actualizar las variables
if(isset($_POST['Update'])){
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$producto = $_POST['producto'];
	$precio = $_POST['precio'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$garantia = $_POST['garantia'];
	$cantidad = $_POST['cantidad'];
	//verificar variables
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
		//insertar nuevos datos
		$sql = "UPDATE compras SET nombre=:nombre, producto=:producto, precio=:precio, direccion=:direccion, telefono=:telefono, garantia=:garantia, cantidad=:cantidad WHERE id=:id";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':id',$id);
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':producto', $producto);
		$query->bindparam(':precio', $precio);
		$query->bindparam(':direccion',$direccion);
		$query->bindparam(':telefono',$telefono);
		$query->bindparam(':garantia', $garantia);
		$query->bindparam(':cantidad', $cantidad);
		$query->execute();
		header ("Location: index.php");
		}
}
?>
<?php
//Get id
$id = $_GET['id'];
//selecionar linea
$sql="SELECT * FROM compras WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' =>$id));
while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$nombre = $row['nombre'];
		$producto = $row['producto'];
		$precio = $row['precio'];		
		$direccion = $row['direccion'];
		$telefono = $row['telefono'];
		$garantia = $row['garantia'];
		$cantidad = $row['cantidad'];			
}
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>Compras</title>
	<link rel="stylesheet" type="text/css" href="../css1.css">
</head>
<body>
	<div class="contenedor">
		<div class="login">
		<h1>Editar</h1>
	
	<form action="edit.php" method="post">
		
			
				<p>Nombre</p>
				<input type="text" class="casillano" name="nombre" value="<?php echo $nombre;?>">
			
			
				<p>Producto</p>
				<input type="text" class="casillano" name="producto" value="<?php echo $producto;?>">
			
			
				<p>Precio</p>
				<input type="text"  class="casillano" name="precio" value="<?php echo $precio;?>">
			
			
				<p>Direccion</p>
				<input type="text" class="casillano" name="direccion" value="<?php echo $direccion;?>">
			
			
				<p>Telefono</p>
				<input type="text" class="casillano" name="telefono" value="<?php echo $telefono;?>">
			
			
				<p>Garantia</p>
				<input type="text" class="casillano" name="garantia" value="<?php echo $garantia;?>">
			
			
				<p>Cantidad</p>
				<input type="text" class="casillano" name="cantidad" value="<?php echo $cantidad;?>"><br><br>
			
			
				<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
				<input type="submit" class="casillano" name="Update" value="Update">
			
		
	</form>
		</div>
	</div>
</body>
</html>