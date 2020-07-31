<?php
	require'configlogin.php';
	
	if(isset($_POST['forgotpass'])){
		$errMsg='';
		$secretpin = $_POST['secretpin'];
		$id_num = $_POST['id_num'];
	if(empty($secretpin))
		$errMsg = 'Por favor ingrese su pin para recuperar su contraseña.';
	if(empty($id_num))
		$errMsg = 'Por favor ingrese su numero de documento para recuperar su contraseña.';
	
		if($errMsg ==''){
			try{
				$stmt = $connect->prepare('SELECT password, secretpin, id_num FROM users WHERE secretpin=:secretpin');
				$stmt->execute(array(
				':secretpin'=>$secretpin,
				));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if(($secretpin == $data['secretpin']) && ($id_num == $data['id_num'])){
					$viewpass = 'Su Contraseña es:'.$data['password'].'<br><a href="login.php">Ingrese ya!!</a>';
				}
				else{
					$errMsg = 'No Hay Coincidencia.';
				}
			}
			catch(PDOExeption $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
 ?>
 
 <html>
 <head><title>Olvido Contraseña</title>
 <link rel="stylesheet" type="text/css" href="css1.css">
 </head>
 <body>
 <div class="contenedor">
	<div class="login">
	<h1>Recuperar contraseña</h1>
		<form action="" method="post">
			<input type="text" class="casillano" name="secretpin" placeholder="pin secreto" autocomplete="off" /><br>
			<input type="text" class="casillano" name="id_num" placeholder="numero de identificacion" autocomplete="off" /><br><br>
			<input type="submit"  value="recuperar" name="forgotpass" class="casillano"/>
		</form>
	<?php
		if(isset($errMsg)){
			echo'<h1>'.$errMsg.'</h1>';
		}
		if(isset($viewpass)){
			echo'<h1>'.$viewpass.'</h1>';
		}
	?>
	</div>	
</div>
 </body>
 </html>