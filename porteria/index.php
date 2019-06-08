<?php
    require_once '../database.php';
    require_once '../Funcionalidad.php';

    session_start();
    if(!isset($_SESSION['usuario']))
    {
        header('Location: index.php');
    }
    $fnc = new Funcionalidad();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion Alumnos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/pe-icon-7-stroke.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Funcionalidad Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../js/Funcionalidad_ajax.js"></script>
   </head>
<script languaje="javascript">
	function mueveReloj()
    {
        momentoActual = new Date();
        hora = momentoActual.getHours();
        minuto = momentoActual.getMinutes();
        segundo = momentoActual.getSeconds();

        imprimirHora = hora + ":" + minuto + ":" + segundo;
        document.formulario.reloj.value = imprimirHora;
        setTimeout("mueveReloj()",1000);
    }
	</script>
<body onload="mueveReloj()">
    <header class="header">
        <div role="navigation" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand"><img src="../img/lg.png" style="margin-top:-10px" width="50px" height="50px"></a>
                    <div class="navbar-buttons">
                        <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
                    </div>
                </div>
                <div id="navigation" class="collapse navbar-collapse navbar-right">
            		<ul class="nav navbar-nav">
              			<li><a href="cerrarSesion.php"><i class="fa fa-user"></i>Cerrar Sesión</a></li>
            		</ul>
          		</div>
            </div>
        </div>
    </header>
    <div class="jumbotron main-jumbotron">
        <div class="container">
            <div class="content">
                <h1>Instituto Latinoamericano Siglo XXI <h1>
            </div>
        </div>
    </div>
    <section class="background-gray-lightest">
        <div class="container">
            <h2>Lista de Alumnos del Instituto Latinoamericano</h2>
            
                <div class="col-md-offset-3">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">  
                     <div class="col-lg-1"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 thumbnail">
                            <form name="formulario" id="formulario" method="post">
                                <br>
                                <p class="lead text-center" style="color:black;">Inicio de Sesión de Usuario</p>
                                <input id="buscarAlumno" name="buscarAlumno" type="text" placeholder="INGRESE DNI" class="form-control" required>
                                <BR>
                                <div id="mostrarDatos"></div>
                                
                                <p><?php echo "la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");?></p>
                                <input type="text" id="fecha" value="<?php echo date("j/n/Y");?>" disabled>
                                
                                <input type="text" name="reloj" size="10" disabled>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy;2019 Todos los derechos reservados</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Javascript-->
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>