<?php
//incluir de config
include("../config.php");

//obtener id
$id = $_GET['id'];

//eliminar la tabla
$sql = "DELETE FROM empleado WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
//redirigir a index.php
header("Location:index.php");
?>
