<?php
	session_start();
	if($_SESSION['loggedin'] != true){
		header("Location: index.html");
	}
	If($_SESSION['TipoUsuario'] != "Administrador"){
		header("Location: menu.php");
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
        <h4>¿Seguro que desea eliminar el Usuario: <?php echo $_GET['IdUsuario']; ?>?</h4>
        <table>
            <tr>
                <td>
               <h6> <a href="DeleteUsuario.php?IdUsuario=<?php echo $_GET["IdUsuario"] ?>"><img src="img/yes.png" height="50px" alt="Yes"></a></h6>
                </td>
                <td> <a href="DeleteUsuario.php?IdUsuario=<?php echo $_GET["IdUsuario"] ?>"><h2>Si</h2></a></td>
            </tr>
            <tr>
                <td>
                   <h6> <a href="MostrarUsuarios.php"><img src="img/no.png" height="50px" alt="No"></a></h6>
                </td>
                <td>
                   <a href="MostrarUsuarios.php"><h2> No</h2></a>
                </td>
            </tr>
        </table>
		<h4>       
        </h4>
    </section>

</body>

</html>
