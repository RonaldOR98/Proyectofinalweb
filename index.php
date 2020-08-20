<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
			 
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Inicio de sesion</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="text" name="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Contraseña:</label><br>
                                <input type="password" name="contrasena" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-md" value="Ingresar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>