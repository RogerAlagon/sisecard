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
    <link href="css/style.css" rel="stylesheet">
    
</head>
    <body>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3" style="margin-top:10%;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 thumbnail">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 thumbnail"> 
                                <div class="image">
                                    <img src="img/logo_sise.jpg" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 thumbnail">
                                <form action="validarUsuario.php" name="formulario_l" id="formulario_l" method="post">
                                    <br>
                                    <p class="lead text-center" style="color:black;">Inicio de Sesión de Usuario</p>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="usuario" name="usuario" type="text" placeholder="usuario" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="pass" name="pass" type="password" placeholder="contraseña" class="form-control" required>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-danger" ><i class="fa fa-sign-in"></i> Log in</button>
                                </form>
                            </div>
                        </div>
                    </div>       
                </div> 
            </div>    
        </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    </body>
</html>