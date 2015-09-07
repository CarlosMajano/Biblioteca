<?php
	session_start();
	if($_SESSION['loggedin'] != true){
		header("Location: index.html");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/portfolio/books.ico" type="image/png" />
    <title>Biblioteca Don Rúa</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/freelancer.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
	
</head>

<body id="page-top" class="index">
   <?php
        include("menusuperior.php");
?>
<br><br>
    <section id="contact">
        <form action="AddUser.php" method="POST">
		<center><h3>Ingrese los datos</h3>
			<div class="form-group">
				<label class="col-sm-6">Nombre</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Nombre" name="nombre" required/>
				</div>
		    </div><br><br>	
			<div class="form-group">
				<label class="col-sm-6">Apellido</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Apellido" name="apellido" required />
				</div>
		    </div><br><br>
			<div class="form-group">
				<label class="col-sm-6">Correo</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Correo" name="correo" required />
				</div>
		    </div><br><br>
			<div class="form-group">
				<label class="col-sm-6">Teléfono</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" placeholder="Teléfono" name="telefono" required />
				</div>
		    </div><br><br>
			<div class="form-group">
				<label class="col-sm-6">Grupo</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Grupo" name="grupo" required />
				</div>
		    </div><br><br>
			<div class="form-group">
				<label class="col-sm-6">Tipo de Usuario</label>
				<div class="col-sm-4">
					<select name="tipou" class="form-control" required>
					<option></option>
						<option value="1">Administrador</option>
						<option value="2">Secretaria</option>
						<option value="3">Cliente</option>
					</select>
				</div>
		    </div><br><br>
			<div class="form-group">
				<label class="col-sm-6">Nombre de Usuario</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" placeholder="Usuario" name="user" required />
				</div>
		    </div><br><br>
			<div class="form-group">
				<label class="col-sm-6">Contraseña</label>
				<div class="col-sm-4">
					<input type="password" class="form-control" placeholder="Contraseña" name="pass" required />
				</div>
		    </div><br><br>
			<div class="form-group">
				<div class="col-sm-12">
					<input type="submit" class="btn btn-success" value="Aceptar"/>
				
					<input type="reset" class="btn btn-warning" value="Cancelar"/>
				</div>
			</div></center>
		</form>

    </section>
    
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Dirección</h3>
                        <p>23 Calle Poniente y 5 Avenida Norte 335 <br>San Salvador</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes Sociales</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Contáctanos</h3>
                        <p>Teléfono:  <span>2526-9700</span></p>
                        <p>Email:  <span>www.salesianosdonrua.com</span></p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Desarrollado por Carlos Rodríguez, Oscar Osorio, Douglas Mejía, Juan Rosales
                        <br>
                        Copyright &copy;  2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
<?php
	include 'connection.php';
	if (!empty($_POST)) { 
		
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$correo = $_POST['correo'];
		$telefono = $_POST['telefono'];
		$grupo = $_POST['grupo'];
		$tipou = $_POST['tipou'];
		$user = $_POST['user'];
		$pass = $_POST['passs'];
		$cn = Database::connect();
		$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = $cn->prepare("INSERT INTO usuarios (IdUsuario, Nombre, Apellido, Correo, Telefono, Grupo, Password, TipoUsuario) VALUES(?,?, ?, ?, ?, ?, ?, ?)");
		$query->execute(array( $user, $nombre, $apellido, $correo, $telefono, $grupo, $pass, $tipou));
		Database::disconnect();

	}else{
		echo "NO AGREGA";
	}
?>