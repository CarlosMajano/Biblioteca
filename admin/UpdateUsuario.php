<?php
 include 'connection.php';
$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$grupo = $_POST['grupo'];
		$tipou = $_POST['tipou'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
 $cnu = Database::connect();
 $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $query = $cnu->prepare("UPDATE usuarios SET Nombre = ?, Apellido = ?, Correo = ?, Telefono = ?, Grupo= ?, Password = ?, TipoUsuario = ? WHERE IdUsuario = ?");
 $query->execute(array($nombre, $apellido, $correo, $telefono, $grupo, $pass, $tipou, $user));
 Database::disconnect();
 header("Location: usuarios.php");
?>