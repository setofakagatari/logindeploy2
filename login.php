<html>
<head><title>ingreso</title>
<link rel="stylesheet" type="text/css" href="css1.css"></head>
<body >
	<div class="contenedor">
<?php
	require 'configlogin.php';
	if (isset($_POST['login'])) {
		$errMsg = '';
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username == '')
			$errMsg ='<div class="errMsg">ingrese su nombre de usuario</div>';
		if($password == '')
			$errMsg ='<div class="errMsg">ingres su contraseña</div>';
		
		if ($errMsg == '') {
			try {
				$stmt = $connect -> prepare('SELECT id, fullname, username, password, id_num, email, secretpin FROM  users WHERE username = :username');
				$stmt ->execute(array(
					':username' =>$username));
				$data = $stmt ->fetch(PDO::FETCH_ASSOC);
				if ($data == false){
					$errMsg = '<div class="errMsg">usuario $username no encontrado.</div>';
				}
				else{
					if ($password ==$data['password']){
						$_SESSION['name'] = $data['fullname'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['secretpin'] = $data['secretpin'];
						$_SESSION['password'] = $data['password'];
						$_SESSION['id_num'] = $data['id_num'];
						$_SESSION['email'] = $data['email'];
						header('Location: dashboard.php');
						exit;
					}
					else
						$errMsg = '<div class="errMsg">contraseña incorrecta</div>';
				}
			}
			catch(PDOException $e){
				$errMsg = $e->getMessage();
			}
			
		}
	}
?>

		<div class="nada"></div>
		<div class="login">
			<h1>Ingresa</h1>
			<p>o</p>
			<span> <a href="register.php"><p>Registrate</p></a></span>
			<form action="" method="post">
				<input type="text" class="casillano" name="username" placeholder="Usuario"   value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"/><br><br>
				<input type="password" class="casillano" name="password" placeholder="Contraseña" autocomplete="off" value="<?php if(isset($_POST['password'])) echo $_POST['password']?>"/><br><br>
				<input type="submit" class="accion" name="login" placeholder="Ingresar" class="submit"/><br>
			</form>
				<span><a href="forgot.php"><p>Olvido la contraseña</p></a></span>
				<span><a href="index.html"><p>Volver al inicio</p></a></span>
			<?php
				if(isset($errMsg)){
					echo '<h1><div class="errMsg">'.$errMsg.'</h1></div>';
				}
			?>
		</div>
	</div>
</body>
</html>



