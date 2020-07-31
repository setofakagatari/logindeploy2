<html>
<head><title>Registro</title><link rel="stylesheet" type="text/css" href="css1.css"></head>
<body >
	<div class="contenedor">
<?php
	require 'configlogin.php';
	if(isset($_POST['register'])){
		$errMsg ='';
		$fullname =$_POST['fullname'];
		$username =$_POST['username'];
		$id_num = $_POST['id_num'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$secretpin = $_POST['secretpin'];
		
		if($fullname == '')
			$errMsg = '<div class="errMsg">Ingrese su Nombre Completo</div>';
		if($username == '')
			$errMsg = '<div class="errMsg">Ingrese su Nombre de Usuario</div>';
		if ($id_num == '')
			$errMsg = '<div class="errMsg">Ingrese su Numero de Documento</div>';
		if ($email == '')
			$errMsg = '<div class="errMsg">Ingrese su Correo Electronico</div>';
		if ($password == '')
			$errMsg = '<div class="errMsg">Ingrese su Contraseña</div>';
		if ($secretpin == '')
			$errMsg = '<div class="errMsg">Ingrese su Pin</div>';
		
		if($errMsg ==''){
			try {
				$stmt = $connect->prepare('INSERT INTO users(fullname,username,id_num,email,password,secretpin) VALUE (:fullname, :username, :id_num, :email, :password, :secretpin)');
				$stmt->execute (array(
					':fullname' =>$fullname,
					':username' => $username,
					':id_num' => $id_num,
					':email'=> $email,
					':password'=>$password,
					':secretpin'=>$secretpin));
				header ('Location: register.php?action=joined');
				exit;
			}
			catch(PDOExcept $e) {
				echo $e->getMessage();
			}
		}
	}
	if(isset($_GET['action'])&& $_GET['action'] == 'joined'){
		$errMsg = '<div class="errMsg">Registro Exitoso!!. Ahora puede ingresar<a href="login.php">Ingreso </a></div>';
		}
?>

		<div class="login">
		<b ><h1>Registrate</h1></b>
			<form action='' method="post">
				<input type="text"class="casillano"autocomplete="off"  name="fullname" placeholder="Nombre completo" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']?>"/><br><br>
				<input type="text" class="casillano" autocomplete="off" name="username" placeholder="Nombre de usuario" value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"/><br><br>
				<input type="text" autocomplete="off"class="casillano"  name="id_num" placeholder="Numero de Documento" value="<?php if(isset($_POST['id_num'])) echo $_POST['id_num']?>"/><br><br>
				<input type="text" class="casillano"autocomplete="off"  name="email" placeholder="Correo Electronico" value="<?php if(isset($_POST['email'])) echo $_POST['email']?>"/><br><br>
				<input type="text" class="casillano" autocomplete="off" name="password" placeholder="Contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password']?>"/><br><br>
				<input type="text"  class="casillano"autocomplete="off" name="secretpin" placeholder="Pin secreto" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin']?>"/><br><br>
				<input type="submit" class="accion"name="register" value="Registro"/><br>
			</form>
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