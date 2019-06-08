<?php
    require_once 'database.php';
    require_once 'Funcionalidad.php';

    $user = $_POST['usuario'];
    $pass = $_POST['pass'];

    $f = new Funcionalidad();
 
        if($f->getvalidarUsuario($user,$pass))
        {
            session_start();
            $_SESSION['usuario'] = $user;
            header('Location:inicio.php');
        }
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
	<title>Gestion Alumnos</title>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Theme CSS -->
	<link href="css/style.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
</head>
<body>
	<div class="container text-center">
        <div style="margin-top:10%;">
		    <h1 class="head"><span>Error</span></h1>
		    <p>Oops! Usuario y/o contraseña incorrecta</p>
		    <a href="index.php" class="btn-outline"> Volver</a>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>	
