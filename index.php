<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/signin.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- jQuery  -->
	<script src="js/jquery.min.js"></script>
	<!--botstrap javascript -->
	<script src="js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>
<?php 
	///session_start();
	//require_once 'login.php';
	///$conexion = new mysqli($hn, $un, $pw, $db);
	//if ($conexion->connect_error) die ("Fatal error");
/*
	if(!empty($_POST['usuario']) && !empty($_POST['contrasena']))
	{
		$usu = mysql_fix_string($conexion, $_POST['usuario']);
		$contra = md5($_POST['contrasena']);

                    $query = "SELECT * FROM usuario2 WHERE Correo='$usu' AND Contraseña='$contra'";
                    
                    $result = $conexion->query($query);
                   
                    $_SESSION['User'] = $usu;
		            if ($result->num_rows >= 1)
		                header("Location: inicio.php");
		            else
		                echo 'contraseña Incorrecta';
		        }
		        
		        function mysql_fix_string($coneccion, $string)
		        {
		            if (get_magic_quotes_gpc())
		                $string = stripcslashes($string);
		            return $coneccion->real_escape_string($string);
		        }
*/
			 ?>
<form class="form-signin">
  	<img class="mb-4" src="img/user.svg" alt="" width="200" height="200">
  	<h1 class="h3 mb-3 font-weight-normal">Inicia Sesion</h1>
 	<label for="inputEmail" class="sr-only">Usuario</label>
  	<input type="email" id="inputEmail" class="form-control" placeholder="Ingrese Usuario" required autofocus>
  	<label for="inputPassword" class="sr-only">Contraseña</label>
  	<input type="password" id="inputPassword" class="form-control" placeholder="Ingrese Contraseña" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  	<div id="foot">
  		<p class="mt-5 mb-3 text-muted">&copy; EPIS-UNAJMA</p>
	</div>
</form>
</body>
</html>