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
		$cn = Database::connect();
		$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $cn->prepare("INSERT INTO usuarios (IdUsuario, Nombre, Apellido, Correo, Telefono, Grupo, Password, TipoUsuario) VALUES(?,?, ?, ?, ?, ?, ?, ?)");
		$query->execute(array( $user, $nombre, $apellido, $correo, $telefono, $grupo, $pass, $tipou));
		Database::disconnect();
		header("Location: usuarios.php");
?>