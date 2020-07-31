<?php
//incluir el config
include_once("../config.php");
//actualizar las variables
if(isset($_POST['Update'])){
	$id = $_POST['id'];
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
	//verificar variables
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
	} else {
		//insertar nuevos datos
		$sql = "UPDATE empleado SET nombre=:nombre, contacto=:contacto, id_num=:id_num, h_date=:h_date, nacionalidad=:nacionalidad, cargo=:cargo, b_date=:b_date, eps=:eps, arl=:arl, direccion=:direccion WHERE id=:id";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':id',$id);
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
		header ("Location: index.php");
		}
}
?>
<?php
//Get id
$id = $_GET['id'];
//selecionar linea
$sql="SELECT * FROM empleado WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' =>$id));
while($row = $query->fetch(PDO::FETCH_ASSOC)){
		$nombre = $row['nombre'];
		$contacto = $row['contacto'];
		$id_num = $row['id_num'];
		$h_date = $row['h_date'];
		$nacionalidad = $row['nacionalidad'];
		$cargo = $row['cargo'];
		$b_date = $row['b_date'];
		$eps = $row['eps'];
		$arl = $row['arl'];
		$direccion = $row['direccion'];
}
?>
<?php
	require '../configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: ../login.php');
?>
<html>
<head>
	<title>Empleados</title>
	<link rel="stylesheet" type="text/css" href="../css1.css">
</head>
<body>
	<div class="contenedor">
		<div class="login">
		<h1>Editar</h1>
	
	<form action="edit.php" method="post">
		
			
				<p>Nombre</p>
				<p><input type="text" class="casillano" name="nombre" value="<?php echo $nombre;?>"></p>
			
			
				<p>Contacto</p>
				<p><input type="text" class="casillano" name="contacto" value="<?php echo $contacto;?>"></p>
			
			
				<p>Numero de documento</p>
				<p><input type="text" class="casillano" name="id_num" value="<?php echo $id_num;?>"></p>
			
			
				<p>Fecha de contratacion</p>
				<p><input type="text" class="casillano" name="h_date" value="<?php echo $h_date;?>"></p>
			
			
				<p>Nacionalidad</p>
				<p><input type="text" class="casillano" name="nacionalidad" value="<?php echo $nacionalidad;?>"></p>
			
			
				<p>Cargo</p>
				<p><input type="text" class="casillano" name="cargo" value="<?php echo $cargo;?>"></p>
			
			
				<p>Fecha de nacimiento</p>
				<p><input type="text" class="casillano" name="b_date" value="<?php echo $b_date;?>"></p>
			
			
				<p>EPS</p>
				<p><input type="text" class="casillano" name="eps" value="<?php echo $eps;?>"></p>
			
			
				<p>ARL</p>
				<p><input type="text" class="casillano" name="arl" value="<?php echo $arl;?>"></p>
			
			
				<p>Direccion</p>
				<p><input type="text" class="casillano" name="direccion" value="<?php echo $direccion;?>"></p>
			
			
				<p><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></p>
				<p><input type="submit" class="casillano" name="Update" value="Actualizar"></p>
			
		
	</form>
		</div>
	</div>
</body>
</html>