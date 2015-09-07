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
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
</head>

<body id="page-top" class="index">
<?php
        include("menusuperior.php");
?>
   
<br><br>
    <section id="contact">
		<a href="AgregarUsuario.php"><button class="btn btn-success">Agregar Usuario<img src="img/add.png" height="35px" alt="Agregar"></button></a>
        <?php
			include 'connection.php' ;
			 $pdocn = Database::connect();
			 $sql = ('SELECT U.IdUsuario, U.Nombre, U.Apellido, U.Correo, U.Telefono, U.Grupo, T.tipo_usuario FROM usuarios as U INNER JOIN tipousuario as T ON U.TipoUsuario = T.codigo ORDER BY IdUsuario ASC');
			 
			$con = "<table class=\"table table-bordered\" style=\"width:75%;margin: auto;\">";
			 $con .= "<thead > <tr> <th class=\"text-center\">ID Usuario</th><th class=\"text-center\">Nombre</th><th class=\"text-center\">Apellido</th><th class=\"text-center\">Correo</th><th class=\"text-center\">Teléfono</th><th class=\"text-center\">Grupo</th><th class=\"text-center\">TipoUsuario</th>"; if($_SESSION['TipoUsuario'] == "Administrador"){ $con.= "<th class=\"text-center\">Operaciones</th>";} $con .= "</tr>";
			 foreach ($pdocn->query($sql) as $row) {
			 $con .= ' </thead><tbody>
			 <tr>
			 
			 <td class="textcenter">'.$row["IdUsuario"].'</td>

			 <td class="textcenter">'.$row["Nombre"].'</td>

			 <td class="textcenter">'.$row["Apellido"].'</td>

			 <td class="textcenter">'.$row["Correo"].'</td>

			 <td class="textcenter">'.$row["Telefono"].'</td>

			 <td class="textcenter">'.$row["Grupo"].'</td>
			 
			 <td class="textcenter">'.$row["tipo_usuario"].'</td>
			 
			 '; 
			 if($_SESSION['TipoUsuario'] == "Administrador"){
				 $con .= '<td class="text-center"><a href="ModificarUsuario.php?IdUsuario='.$row["IdUsuario"].'" > <img src="img/modify.png" height="30%" alt="Modificar"></a><a href="EliminarUsuario.php?IdUsuario='.$row["IdUsuario"].'"><img src="img/delete.png" height="35%" alt="Modificar"></a></td>';
			 }
			 
			 $con .= '</tr>';
			 }
			 $con .= "</tbody></table>";
			 echo "$con";
			 
			 Database::disconnect();
		 ?>
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
