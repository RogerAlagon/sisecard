<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome and Pixeden Icon Stroke icon fonts-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/pe-icon-7-stroke.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Funcionalidad Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/Funcionalidad_ajax.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" >
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<script>
	//importamos configuraciones de toastr (notificación)
	toastr.options = {
  	"closeButton": false,
  	"debug": false,
  	"newestOnTop": false,
  	"progressBar": true,
  	"positionClass": "toast-top-left",
  	"preventDuplicates": false,
  	"onclick": null,
  	"showDuration": "300",
  	"hideDuration": "1000",
  	"timeOut": "5000",
  	"extendedTimeOut": "1000",
  	"showEasing": "swing",
  	"hideEasing": "linear",
  	"showMethod": "fadeIn",
  	"hideMethod": "fadeOut"
    }
	</script>
<body>
    <header class="header">
        <div role="navigation" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand"><img src="img/lg.png" style="margin-top:-10px" width="50px" height="50px"></a>
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
            <h2>Gestion Alumnos del Instituto Latinoamericano</h2>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left:0;">
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2" style="margin-top:10px;">
                    <input type="button" class="btn btn-danger" id="btnmodalAlumnoAgregar" value="AGREGAR"/>
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2" style="margin-top:10px;">
                    <input type="button" class="btn btn-danger" id="btnmodalAlumnoEliminar" value="ELIMINAR"/>
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2" style="margin-top:10px;">
                    <input type="button" class="btn btn-danger" id="btnmodalAlumnoActualizar" value="MODIFICAR"/>
                </div>
                <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2" style="margin-top:10px;">
                    <input type="button" class="btn btn-danger" id="btnmodalAdministrarPrograma" value="ADMINISTRAR PROGRAMA"/>
                </div>
            </div>
            <BR><BR><BR>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" id="buscar_alumno" placeholder="INGRESE NOMBRE" required="required">
            </div>
            <BR>
            <!-- TABLA VISTA ESCRITORIO -->
            <form name="frmtabla" id="frmtabla" method="post">
                <div id="scrollTabla">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>INICIO</th>
                                <th>FIN</th>
                                <th>LUNES</th>
                                <th>MARTES</th>
                                <th>MIERCOLES</th>
                                <th>JUEVES</th>
                                <th>VIERNES</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $fnc = new Funcionalidad();
                        ?>
                        <?php foreach($fnc->getHorario2() as $t):?>
                            <tr>
                                <td><?php echo $t['INICIO'];?></td>
                                <td><?php echo $t['FIN'];?></td>
                                <td><?php echo $t['LUNES_ASIGNATURA'];?></td>
                                <td><?php echo $t['MARTES_ASIGNATURA'];?></td>
                                <td><?php echo $t['MIERCOLES_ASIGNATURA'];?></td>
                                <td><?php echo $t['JUEVES_ASIGNATURA'];?></td>
                                <td><?php echo $t['VIERNES_ASIGNATURA'];?></td>
                                
                            </tr>
                        <?php endforeach;?>    
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-primary">HORA</li>
                                <?php
                                    $fnc = new Funcionalidad();
                                ?>
                                <?php foreach($fnc->getHorario2() as $t):?>
                                <li class="list-group-item">
                                    <?php echo $t['INICIO'];?> <BR>
                                    <?php echo $t['FIN'];?> <BR>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-primary">Lunes</li>
                                <?php
                                    $fnc = new Funcionalidad();
                                ?>
                                <?php foreach($fnc->getHorario2() as $t):?>
                                <li class="list-group-item">
                                    <?php echo $t['LUNES_ASIGNATURA'];?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-primary">Martes</li>
                                <?php
                                    $fnc = new Funcionalidad();
                                ?>
                                <?php foreach($fnc->getHorario2() as $t):?>
                                <li class="list-group-item">
                                    <?php echo $t['MARTES_ASIGNATURA'];?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-primary">Miercoles</li>
                                <?php
                                    $fnc = new Funcionalidad();
                                ?>
                                <?php foreach($fnc->getHorario2() as $t):?>
                                <li class="list-group-item">
                                    <?php echo $t['MIERCOLES_ASIGNATURA'];?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-primary">Jueves</li>
                                <?php
                                    $fnc = new Funcionalidad();
                                ?>
                                <?php foreach($fnc->getHorario2() as $t):?>
                                <li class="list-group-item">
                                    <?php echo $t['JUEVES_ASIGNATURA'];?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-primary">Viernes</li>
                                <?php
                                    $fnc = new Funcionalidad();
                                ?>
                                <?php foreach($fnc->getHorario2() as $t):?>
                                <li class="list-group-item">
                                    <?php echo $t['VIERNES_ASIGNATURA'];?>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Agregar Programa-->
    <div class="modal fade" id="ModalAdministrarPrograma" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Agregar Programa</h5>
      			</div>
      			<div class="modal-body">
                    <div class="loader" style="display:block; margin-left:auto; margin-right:auto;">
                        <form class="omb_loginForm" name="frmprograma" id="frmprograma" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control text-uppercase" name="a_programa" id="a_programa" placeholder="INGRESE PROGRAMA" required>
                            </div>
                            <br>
                            <input type="button" class="btn btn-danger" id="agregarPrograma" value="AGREGAR PROGRAMA"/>
                        </form>                    
                    </div>
                </div>
                <div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Eliminar Programa</h5>
      			</div>
                  <div class="modal-body">
                    <div class="loader" style="display:block; margin-left:auto; margin-right:auto;">
                        <form class="omb_loginForm" name="frmprograma" id="frmprograma" method="post">
                            <div class="form-group">
                                <select class="form-control" name="e_programa" id="e_programa">
                                    <option value="empty">SELECCIONE UN PROGRAMA</option>
                                    <?php foreach($fnc->getProgramas()as $t):?>
                                    <option value=<?php echo $t['PROGRAMA'];?>><?php echo $t['PROGRAMA'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <br>
                            <input type="button" class="btn btn-danger" id="btncerrarModalPrograma" value="CERRAR"/>
                            <input type="button" class="btn btn-danger" id="eliminarPrograma" value="ELIMINAR PROGRAMA"/>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin modal-->
    <!-- Modal Agregar Alumnos -->
    <div class="modal fade" id="ModalAlumnoAgregar" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Agregar Alumnos</h5>
      			</div>
      			<div class="modal-body">
                    <div class="loader" style="display:block; margin-left:auto; margin-right:auto;">
                        <form class="omb_loginForm" name="formularios" id="formularios" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control text-uppercase" name="dni" id="dni" placeholder="INGRESE DNI" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control text-uppercase" name="nombre" id="nombre" placeholder="INGRESE NOMBRE" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" class="form-control text-uppercase" name="apellidos" id="apellidos" placeholder="INGRESE APELLIDO" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="form-control" name="programa" id="programa">
                                    <option value="empty">SELECCIONE UN PROGRAMA</option>
                                    <?php foreach($fnc->getProgramas()as $t):?>
                                    <option value=<?php echo $t['PROGRAMA'];;?>><?php echo $t['PROGRAMA'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <br>
                            <input type="button" class="btn btn-danger" id="btncerrarModalAgregar" value="CERRAR">
                            <button class="btn btn-danger" type="submit" id="agregarAlumno">AGREGAR</button>
                        <form>
                    </div>
      			</div>
    		</div>
  		</div>
       </div>
    <!-- Fin Modal -->
    <!-- Modal Eliminar Alumnos -->
    <div class="modal fade" id="ModalAlumnoEliminar" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Eliminar Alumnos</h5>
      			</div>
      			<div class="modal-body">
                    <div class="loader" style="display:block; margin-left:auto; margin-right:auto;">
                        <div id="seccion_eliminarAlumno">	
		                </div>
                        <input type="button" class="btn btn-danger" id="btncerrarModalEliminar" value="CERRAR"/>
                        <input type="button" class="btn btn-danger" id="eliminarAlumno" value="ELIMINAR ALUMNO"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal-->
    <!-- Modal Actualizar Alumnos -->
    <div class="modal fade" id="ModalAlumnoActualizar" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Actualizar Alumnos</h5>
      			</div>
      			<div class="modal-body">
                    <div class="loader" style="display:block; margin-left:auto; margin-right:auto;">
                        <div id="seccion_actualizarAlumno">	
		                </div>
                        <input type="button" class="btn btn-danger" id="btncerrarModalActualizar" value="CERRAR"/>
                        <button class="btn btn-danger" type="submit" id="actualizarAlumno">ACTUALIZAR ALUMNO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal-->
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
    <script src="js/bootstrap.min.js"></script>
</body>
</html>