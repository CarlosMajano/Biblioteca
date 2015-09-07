<?php
	session_start();
	if($_SESSION['loggedin'] != true){
		header("Location: ../index.html");
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

    <title>Biblioteca Don Rua</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Biblioteca Don Rua</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['Nombre'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php
                 include("menusuperior.php");
            ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Sistema de Biblioteca Don Rúa
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <div class="row">

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
    



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

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