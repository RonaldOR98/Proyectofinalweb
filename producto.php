<?php
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion pedidos - Inicio</title>


    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
  <?php
	session_start();
	$now = $_SESSION['User'];
	if ($now  == null || $now = '') {
		echo 'Error Ingrese de nuevo';
        die();
    }	
        require_once 'login.php';
        $conexion = new mysqli($hn, $un, $pw, $db);
        if ($conexion->connect_error) die ("Fatal error");
          $user=$_SESSION['User'];
     
         if (isset($_POST['nombre']) &&
             isset($_POST['uni']) &&
             isset($_POST['pu']) &&
             isset($_POST['cat']))
         {
             
             $nom = $_POST['nombre'];
             $unit = $_POST['uni'];
             $pu = $_POST['pu'];
             $cat = $_POST['cat'];
            
             $query = "INSERT INTO producto VALUES" .
                 "(null, '$nom', '$unit', '$pu', '$cat')";
             $result = $conexion->query($query);
             if (!$result) echo "INSERT falló <br><br>";
             header("location:producto.php");
        }
	
?>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">COMERCIAL PALOMINO</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">CERRAR SESION</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-gradient-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              INICIO <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categoria.php">
              <span data-feather="file"></span>
              CATEGORIAS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="producto.php">
              <span data-feather="shopping-cart"></span>
              PRODUCTOS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cliente.php">
              <span data-feather="users"></span>
              CLIENTES
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pedido.php">
              <span data-feather="bar-chart-2"></span>
              PEDIDOS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              REPORTES
            </a>
          </li>
        </ul>

      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div id="reg">
        <h1>Productos</h1>
        <form class="form-signin" action="" method="post">
         	<label for="id" class="text-info">ID</label>
  	        <input type="text"  class="form-control" name="id" autofocus readonly>
  	        <label for="nombre" class="text-info">Nombre</label>
  	        <input type="text" class="form-control" name="nombre"  placeholder="Ingrese nombre" required>
            <label for="uni" class="text-info">Unidad</label>
  	        <input type="text" class="form-control" name="uni"  placeholder="Ingrese Unidad" required>
            <label for="pu" class="text-info">Precio Unitario</label>
  	        <input type="text" class="form-control" name="pu"  placeholder="Ingrese Precio" required>
            <label for="cat" class="text-info">Categoria</label>
            <input type="text" class="form-control" name="cat"  placeholder="Ingrese Codigo Categoria" required>
            <!--<select name="cat" class="form-control" required>
            <?php /*
            $consulta="SELECT * FROM categoria";
            $ejecutar=mysqli_query($conexion,$consulta);
            ?>
            <?php foreach ($ejecutar as $opciones):?>
            <option value="<?php echo $opciones['IDPRODUCTO']?>"><?php echo $opciones['NOMBRE']?></option>
            <?php endforeach */?>
            </select>-->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        </form>
        <div id="tabla">
        <table class="table table-hover">
		<tr>
			<td>ID</td>
			<td>NOMBRE</td>
			<td>UNIDAD</td>
            <td>P. UNITARIO</td>
			<td>CATEGORIA</td>
		</tr>

		<?php 
		$sql="SELECT * from producto";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['IDPRODUCTO'] ?></td>
			<td><?php echo $mostrar['NOMBREPROD'] ?></td>
			<td><?php echo $mostrar['UNIDAD'] ?></td>
            <td><?php echo $mostrar['PREUNIT'] ?></td>
			<td><?php echo $mostrar['PR_IDCAT'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>
    </div>
        </div>
        
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="js/dashboard.js"></script></body>
</html>