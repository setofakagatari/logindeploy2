
<?php
	require 'configlogin.php';
	if(empty($_SESSION['name']))
		header('Location:login.php');
	if(isset($_POST['update'])) {
		$errMsg = '';
		
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$passwordVarify = $_POST['passwordVarify'];
		
		if($password != $passwordVarify)
			$errMsg ='Error en la contraseña.';
		if($errMsg ==''){
			try{
				$sql = "UPDATE users SET fullname=:fullname, password=:password, secretpin=:secretpin WHERE username=:username";
				$stmt = $connect->prepare($sql);
				$stmt->execute(array(
				':fullname' => $fullname,
				':secretpin' => $secretpin,
				':password' => $password,
				':username' => $_SESSION['username']
				));
					header('Location: /login/update.php?action=updated');
					exit;
			}
			catch(PDOException $e){
				$errMsg = $e->getMessage();
			}
		}
	}
	if(isset($_GET['action']) && $_GET['action'] == 'updated'){
		$errMsg = '<div class="errMsg">Datos Actualizados Correctamente. <a href="logout.php">Salga</a> e ingrese de nuevo.</div>';
	}?>
<html>
<head><title>Actualizar</title><link rel="stylesheet" type="text/css" href="css1.css"></head>
<body>
	<div class="contenedor">
		<div class="nada"></div>
		<div class="login">
		<h1>Actualizar</h1>
			<form action="" method="post">
				<p>Nombre Completo</p>
				<input type="text" class="casillano"name="fullname" value="<?php echo $_SESSION['name']; ?>"/>
				<p>Usuario</p>
				<input type="text" class="casillano"name="username" disabled autocomplete="off" value="<?php echo $_SESSION['username']; ?>"/>

				<p>Pin secreto</p>
				<input type="text" class="casillano"name="secretpin" autocomplete="off" value="<?php echo $_SESSION['secretpin']; ?>" />
				
				<p>Contraseña</p>
				<input type="password" class="casillano"name="password" autocomplete="off" value="<?php echo $_SESSION['password']; ?>" />
				<p>Validar Contraseña</p>
				<input type="text" class="casillano" name="passwordVarify"  /><br><br>
				<input type="submit" autocomplete="off"class="accion"name="update" value="Actualizar" class="submit"/>
				<?php
					if(isset($errMsg)){
						echo "<h1><div class='errMsg'></div>".$errMsg."</h1></div>";
					}
				?>
			</form>	
		</div>
	</div>	
</body>
</html>