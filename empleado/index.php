<?php
//incluir el config
include_once("../config.php");
//buscar tabla
$result = $dbConn->query("SELECT * FROM empleado ORDER BY id DESC");
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>tabla de empleado</title>
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
		<td>Contacto</td>
		<td>Numero de cedula</td>
		<td>Fecha de contrato</td>
		<td>pais de origen</td>
		<td>Cargo</td>
		<td>Fecha de nacimiento</td>
		<td>EPS</td>
		<td>ARL</td>
		<td>Direccion</td>
		<td>Actualizar</td>
	</tr>
	<?php
	while($row =$result->fetch(PDO::FETCH_ASSOC)){
		echo "<tr class='tr2'>";
		echo "<td>".$row['nombre']."</td>";
		echo "<td>".$row['contacto']."</td>";
		echo "<td>".$row['id_num']."</td>";
		echo "<td>".$row['h_date']."</td>";
		echo "<td>".$row['nacionalidad']."</td>";
		echo "<td>".$row['cargo']."</td>";
		echo "<td>".$row['b_date']."</td>";
		echo "<td>".$row['eps']."</td>";
		echo "<td>".$row['arl']."</td>";
		echo "<td>".$row['direccion']."</td>";
		echo "<td><button class='casillano'><a href=\"edit.php?id=$row[id]\"><p>Edit</p></a></button> <br> <button class='casillano'><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Deseas elimimar esta fila')\"><p>Borrar</p></a></button></td>";
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
				<td><p>Contacto</p></td>
				<td><input type="text"class="casillano"  name="contacto"></td>
			</tr>
			<tr>
				<td><p>Numero de documento</p></td>
				<td><input type="text"class="casillano"  name="id_num"></td>
			</tr>
			<tr>
				<td><p>Fecha de contratacion</p></td>
				<td><input type="text"class="casillano" name="h_date"></td>
			</tr>
			<tr>
				<td><p>Nacionalidad</p></td>
				<td><input type="text"class="casillano" name="nacionalidad"></td>
			</tr>
			<tr>
				<td><p>Cargo</p></td>
				<td><input type="text" class="casillano" name="cargo"></td>
			</tr>
			<tr>
				<td><p>Fecha de nacimiento</p></td>
				<td><input type="text"class="casillano"  name="b_date"></td>
			</tr>
			<tr>
				<td><p>EPS</p></td>
				<td><input type="text" class="casillano"  name="eps"></td>
			</tr>
			<tr>
				<td><p>ARL</p></td>
				<td><input type="text" class="casillano" name="arl"></td>
			</tr>
			<tr>
				<td><p>Direccion</p></td>
				<td><input type="text" class="casillano" name="direccion"></td>
			</tr>
			<tr>
				
				<td><br><input type="submit" class="casillano" name="Submit" value="añadir empleado"></td>
			</tr>
		<table>
	</form>
	<?php
include_once("../config.php");
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
			echo "<p>Campo: Nombre esta vacio.</p>";
		}		
		if(empty($contacto)){
			echo "<p>Campo: Contacto esta vacio.</p>";
		}
		if(empty($id_num)){
			echo "<p>Campo: Numero de documento esta vacio.</p>";
		}
		if(empty($h_date)){
			echo "<p>Campo: Fecha de contratacion esta vacio.</p>";
		}
		if(empty($nacionalidad)){
			echo "<p>Campo: Nacionalidad esta vacio.</p>";
		}
		if(empty($cargo)){
			echo "<p>Campo: Cargo esta vacio.</p>";
		}
		if(empty($b_date)){
			echo "<p>Campo: Fecha de nacimiento esta vacio.</p>";
		}
		if(empty($eps)){
			echo "<p>Campo: EPS de compra esta vacio.</p>";
		}
		if(empty($arl)){
			echo "<p>Campo: ARL de venta esta vacio.</p>";
		}
		if(empty($direccion)){
			echo "<p>Campo: Direccion esta vacio.</p>";
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
		
		header("Location: index.php");
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