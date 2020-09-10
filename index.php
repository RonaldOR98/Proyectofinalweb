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
	session_start();
	require_once 'login.php';
	$conexion = new mysqli($hn, $un, $pw, $db);
	if ($conexion->connect_error) die ("Fatal error");

	if(!empty($_POST['usuario']) && !empty($_POST['contrasena']))
	{
		$usu = mysql_fix_string($conexion, $_POST['usuario']);
		$contra = md5($_POST['contrasena']);

                    $query = "SELECT * FROM usuario WHERE USUARIO='$usu' AND CONTRA='$contra'";
                    
                    $result = $conexion->query($query);
                   
                    $_SESSION['User'] = $usu;
		            if ($result->num_rows >= 1)
		                header("Location: menu.php");
					else
					
					echo'<script type="text/javascript">
					alert("Correo / Password incorrectos");
					window.location.href="index.php";
					</script>';
		        }
		        
		        function mysql_fix_string($coneccion, $string)
		        {
		            if (get_magic_quotes_gpc())
		                $string = stripcslashes($string);
		            return $coneccion->real_escape_string($string);
		        }

			 ?>
<form class="form-signin" action="" method="post">

  	<img class="mb-4" src="img/user.svg" alt="" width="280" height="200">
  	<h1 class="h3 mb-3 font-weight-normal" style="margin-left:70px;">Inicia Sesion</h1>
 	<label for="inputEmail" class="sr-only">Usuario</label>
  	<input type="text" id="inputEmail" class="form-control" name="usuario" placeholder="Ingrese Usuario" required autofocus>
  	<label for="inputPassword" class="sr-only">Contraseña</label>
  	<input type="password" id="inputPassword" class="form-control" name="contrasena"  placeholder="Ingrese Contraseña" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
  	<div id="foot">
  		<p class="mt-5 mb-3 text-muted" style="margin-left:70px;">&copy; EPIS-UNAJMA</p>
	</div>
</form>
</body>
</html>