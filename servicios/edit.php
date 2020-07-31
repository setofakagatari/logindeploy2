<?php
//incluir el config
include_once("../config.php");
//actualizar las variables
if(isset($_POST['Update'])){
	$id = $_POST['id'];
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
	$duracion = $_POST['duracion'];
	$encargado = $_POST['encargado'];
	$precio = $_POST['precio'];
	$equipamiento = $_POST['equipamiento'];
	$garantia = $_POST['garantia'];
	$tip_moto = $_POST['tip_moto'];
	$mar_moto = $_POST['mar_moto'];
	//verificar variables
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
	} else {
		//insertar nuevos datos
		$sql = "UPDATE servicios SET tipo=:tipo, nombre=:nombre, duracion=:duracion, encargado=:encargado, precio=:precio, equipamiento=:equipamiento, garantia=:garantia, tip_moto=:tip_moto, mar_moto=:mar_moto WHERE id=:id";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':id',$id);
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
		header ("Location: index.php");
		}
}
?>
<?php
//Get id
$id = $_GET['id'];
//selecionar linea
$sql="SELECT * FROM servicios WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' =>$id));
while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$tipo = $row['tipo'];
		$nombre = $row['nombre'];
		$duracion = $row['duracion'];
		$encargado = $row['encargado'];
		$precio = $row['precio'];
		$equipamiento = $row['equipamiento'];
		$garantia = $row['garantia'];
		$tip_moto = $row['tip_moto'];
		$mar_moto = $row['mar_moto'];
}
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>Servicios</title>
	<link rel="stylesheet" type="text/css" href="../css1.css">
</head>
<body>
	<div class="contenedor">
		<div class="login">
		<h1>Editar</h1>
	
	<form action="edit.php" method="post">
		
			
				<p>Tipo</p>
				<p><input type="text" class="casillano" name="tipo" value="<?php echo $tipo;?>"></p>
			
			
				<p>Nombre</p>
				<p><input type="text" class="casillano" name="nombre" value="<?php echo $nombre;?>"></p>
			
			
				<p>Duracion</p>
				<p><input type="text" class="casillano" name="duracion" value="<?php echo $duracion;?>"></p>
			
			
				<p>Encargado</p>
				<p><input type="text" class="casillano" name="encargado" value="<?php echo $encargado;?>"></p>
			
			
				<p>Precio</p>
				<p><input type="text" class="casillano" name="precio" value="<?php echo $precio;?>"></p>
			
			
				<p>Equipamiento</p>
				<p><input type="text" class="casillano" name="equipamiento" value="<?php echo $equipamiento;?>"></p>
			
			
				<p>Garantia</p>
				<p><input type="text" class="casillano" name="garantia" value="<?php echo $garantia;?>"></p>
			
			
				<p>Tipo de Moto</p>
				<p><input type="text" class="casillano" name="tip_moto" value="<?php echo $tip_moto;?>"></p>
			
			
				<p>Marca de moto</p>
				<p><input type="text" class="casillano" name="mar_moto" value="<?php echo $mar_moto;?>"></p>
			
			
				<p><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></p>
				<p><input type="submit" class="accion" name="Update" value="Update"></p>
			
		
	</form>
		</div>
	</div>
</body>
</html>