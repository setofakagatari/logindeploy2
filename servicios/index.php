<?php
//incluir el config
include_once("../config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM servicios ORDER BY id DESC");
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>tabla de servicios</title>
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
		<td>Duracion</td>
		<td>Encargado</td>
		<td>Precio</td>
		<td>Equipamiento</td>
		<td>Garantia</td>
		<td>Tipo de moto</td>
		<td>Marca de moto</td>
		<td>Actualizar</td>
	</tr>
	<?php
	while($row =$result->fetch(PDO::FETCH_ASSOC)){
		echo "<tr class='tr2'>";
		echo "<td>".$row['tipo']."</td>";
		echo "<td>".$row['nombre']."</td>";
		echo "<td>".$row['duracion']."</td>";
		echo "<td>".$row['encargado']."</td>";
		echo "<td>".$row['precio']."</td>";
		echo "<td>".$row['equipamiento']."</td>";
		echo "<td>".$row['garantia']."</td>";
		echo "<td>".$row['tip_moto']."</td>";
		echo "<td>".$row['mar_moto']."</td>";
		echo "<td><button class='casillano'><a href=\"edit.php?id=$row[id]\"><p>Edit</p></a></button> <br> <button class='casillano'><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Deseas elimimar esta fila')\"><p>Borrar</p></a></button></td>";
		echo "</tr>";
	}
	?>
	</table>
	<form action="" id="form" method="post">
		<table class="table1" >
			<tr>
				<td><p>Tipo</p></td>
				<td><input type="text" class="casillano" name="tipo"></td>
			</tr>
			<tr>
				<td><p>Nombre</p></td>
				<td><input type="text" class="casillano" name="nombre"></td>
			</tr>
			<tr>
				<td><p>Duracion</p></td>
				<td><input type="text" class="casillano" name="duracion"></td>
			</tr>
			<tr>
				<td><p>Encargado</p></td>
				<td><input type="text" class="casillano" name="encargado"></td>
			</tr>
			<tr>
				<td><p>Precio</p></td>
				<td><input type="text" class="casillano" name="precio"></td>
			</tr>
			<tr>
				<td><p>Equipamiento</p></td>
				<td><input type="text" class="casillano" name="equipamiento"></td>
			</tr>
			<tr>
				<td><p>Garantia</p></td>
				<td><input type="text" class="casillano" name="garantia"></td>
			</tr>
			<tr>
				<td><p>Tipo de Moto</p></td>
				<td><input type="text"class="casillano"  name="tip_moto"></td>
			</tr>
			<tr>
				<td><p>Marca de moto</p></td>
				<td><input type="text" class="casillano" name="mar_moto"></td>
			</tr>
			<tr>
				
				<td><br><input type="submit" class="casillano" name="Submit" value="Añadir registro de servicio"></td>
			</tr>
		<table>
	</form>
	<?php
include_once("../config.php");
// creador de variables
if (isset($_POST['Submit'])) {
	$tipo = $_POST['tipo'];
	$nombre = $_POST['nombre'];
	$duracion = $_POST['duracion'];
	$encargado = $_POST['encargado'];
	$precio = $_POST['precio'];
	$equipamiento = $_POST['equipamiento'];
	$garantia = $_POST['garantia'];
	$tip_moto = $_POST['tip_moto'];
	$mar_moto = $_POST['mar_moto'];
// verificador de variables
	if(empty($tipo) || empty($nombre) || empty($duracion) || empty ($encargado) || empty ($precio) || empty ($equipamiento) ||empty ($garantia) || empty ($tip_moto) || empty ($mar_moto)){
		if(empty($tipo)){
			echo "<p>Campo : Tipo esta vacio.</p>";
		}
		if(empty($nombre)){
			echo "<p>Campo: Nombre esta vacio.</p>";
		}		
		if(empty($duracion)){
			echo "<p>Campo: Duracion esta vacio.</p>";
		}
		if(empty($encargado)){
			echo "<p>Campo: Encargado esta vacio.</p>";
		}
		if(empty($precio)){
			echo "<p>Campo: Precio esta vacio.</p>";
		}
		if(empty($equipamiento)){
			echo "<p>Campo: Equipamiento esta vacio.</p>";
		}
		if(empty($garantia)){
			echo "<p>Campo: Garantia esta vacio.</p>";
		}
		if(empty($tip_moto)){
			echo "<p>Campo: Tipo de moto esta vacio.</p>";
		}
		if(empty($Mar_moto)){
			echo "<p>Campo: Marca de moto de compra esta vacio.</p>";
		}		
		echo "<br><a href='javascript:self.history.back();'>Regresa</a>";
	} else {
// insertar variables
		$sql = "INSERT INTO servicios (tipo, nombre, duracion, encargado, precio, equipamiento, garantia, tip_moto, mar_moto) VALUES(:tipo, :nombre, :duracion, :encargado, :precio, :equipamiento, :garantia, :tip_moto, :mar_moto)";
		$query = $dbConn->prepare($sql);
		
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
		
		header("location:index.php");
		
	}	
	}
?>
<script>
function abrir(){
  document.getElementById("form").style.display="block";
  }
	</script>
</div>
</body>
</html>