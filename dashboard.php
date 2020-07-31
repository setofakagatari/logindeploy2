<?php
	require 'configlogin.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>
<html>
	<head>
		<title>dashboard</title>
		<link rel="stylesheet" type="text/css" href="css3.css">
	</head>
	<body>
		<div class="contenedor">
			<div class="header">
				<h1><?php echo $_SESSION['name'];?> </h1> 
			</div>
			<div class="header2">
			<button class="casillano"><a href="update.php"><p>Actualiza<br>datos</p></a></button><pre><p> o </p></pre><button class="casillano"><a href="logout.php"><p>cierra<br>sesion</p></a></button>
			</div>
			<div class="text">
			<p>
				Nuestra pagina web permite actualizar sus datos personales, tal como puede ver en la parte superior derecha
				y tambien permite modificar las tablas de ventas, empleados, servicios, compras y articulos, esto lo puede encontrar a continuacion.

				<?php
					if(isset($errMsg)){
						echo '<h1>'.$errMsg.'</h1>';
					}
				?>
			</p>
			</div>
			
			<div class="sidebar">
			 

			<h1>Bienvenido <?php echo $_SESSION['username'];?></h1>
			</div>
			
			<div class="footer">
			<button class="casillano"><p><a href="empleado/index.php">empleado</a></p></button><pre> </pre><button class="casillano"><p><a href="servicios/index.php">servicios</a></p></button><pre> </pre>
			<button class="casillano"><p><a href="articulos/index.php">articulos</a></p></button><pre> </pre><button class="casillano"><p><a href="compras/index.php">compras</a></p></button><pre> </pre>
			<button class="casillano"><p><a href="ventas/index.php">ventas</a></p></button>
			</div>
		</div>
	</body>
</html>