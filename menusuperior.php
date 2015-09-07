
 <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="menu.php">Inicio</a>
				<a class="navbar-brand" href="MostrarUsuarios.php">Usuarios</a>
                <a class="navbar-brand" href="MostrarUsuarios.php">Ejemplares</a>
                 <a class="navbar-brand" href="MostrarUsuarios.php">Prestamos</a>
                 <a class="navbar-brand" href="MostrarUsuarios.php">Devoluciones</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="dropdown">
							  <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo 	$_SESSION['Nombre']; ?>
								<span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="dLabel">
								<li>
								<a href="logout.php">Cerrar Sesion</a>
								</li>
							  </ul>
						</div>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
