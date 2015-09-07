<?php

		include 'connection.php';
		$cn = Database::connect();
		$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$query = $cn->prepare("DELETE FROM usuarios where IdUsuario = ?");
		$query->execute(array($_GET['IdUsuario']));
		

		header("Location: MostrarUsuarios.php");
?>