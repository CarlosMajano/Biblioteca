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
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Biblioteca Don Rúa</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li style='color:yellow;'>
                        <a href="login.html">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<br><br>
    <section id="contact">
        <?php
            $tipo = "";
                $username = $_POST['user'];
                $password = $_POST['pass'];

                include_once("connection.php");
                $cn = Database::connect();
                $cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $query = $cn->prepare("SELECT IdUsuario, Nombre, Apellido, Password, TipoUsuario FROM usuarios WHERE IdUsuario = ? and Password=?");
                $query->execute(array($username, $password));
                $data = $query->fetch(PDO::FETCH_ASSOC);

                //foreach ($data as $row) {
                    $tipo = $data['Nombre'];
                    $tipo .= " " . $data['Apellido'];
                //}
                if ($data['TipoUsuario'] == 1 || $data['TipoUsuario'] == 2 || $data['TipoUsuario'] == 3) {
                        if ($data['TipoUsuario'] == 1) {
                            $tipou = "Administrador";
                        }else if($data['TipoUsuario'] == 2){
                            $tipou = "Secretaria";
                        }else if($data['TipoUsuario'] == 3){
                            $tipou = "Cliente";
                        }
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['user'] = $username;
						$_SESSION['TipoUsuario'] = $tipou;
                        $_SESSION['start'] = time();
                        $_SESSION['Nombre'] = $tipo;
                        header("Location: admin/index.php");
                    }else{
                        echo "<p>Usuario no encontrado, probablemente no este registrado en el sistema</p>";
                        echo "<a href=\"login.html\">Volver a intentar</a>";
                            
                }
                Database::disconnect();
        ?>
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
