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
             isset($_POST['ape']) &&
             isset($_POST['dni']) &&
             isset($_POST['dir'])&&
             isset($_POST['tel']))
         {
             
             $nom = $_POST['nombre'];
             $ape = $_POST['ape'];
             $dni = $_POST['dni'];
             $dir = $_POST['dir'];
             $tel = $_POST['tel'];

             $query = "INSERT INTO cliente VALUES" .
                 "(null, '$nom', '$ape', '$dni', '$dir','$tel')";
             $result = $conexion->query($query);
             if (!$result) echo "INSERT falló <br><br>";
             header("location:cliente.php");
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
        <h1>Pedidos</h1>
        <form class="form-signin" action="" method="post">
            <div class="row">
            <div class="col-12 col-md-6">
         	<label for="id" class="text-info">ID</label>
  	        <input type="text"  class="form-control" name="id" autofocus readonly width="100px">
            </div>
            <div class="col-12 col-md-6">
  	        <label for="fecha" class="text-info">Fecha</label>
  	        <input type="date" class="form-control" name="fecha" required>
            </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-12">
            <label for="cli" class="text-info">Cliente</label>
  	         <select name="cli" class="form-control" required>
               <?php 
            $consulta="SELECT * FROM cliente";
            $ejecutar=mysqli_query($conexion,$consulta);
            ?>
            <?php foreach ($ejecutar as $opciones):?>
            <option value="<?php echo $opciones['IDCLI']?>"><?php echo $opciones['NOMCLI']?></option>
            <?php endforeach ?>
            </select>
            </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-12">
            <h3>Detalles de pedido</h3>
            </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-6">
            <label for="iddt" class="text-info">Id Detalle</label>
            <input type="text" class="form-control" name="iddt" readonly>
            </div>
            <div class="col-12 col-md-6">
            <label for="prod" class="text-info">Producto</label>
  	         <select name="prod" class="form-control" required>
               <?php 
            $consulta="SELECT * FROM producto";
            $ejecutar=mysqli_query($conexion,$consulta);
            ?>
            <?php foreach ($ejecutar as $opciones):?>
            <option value="<?php echo $opciones['IDPRODUCTO']?>"><?php echo $opciones['NOMBREPROD']?></option>
            <?php endforeach ?>
            </select>
            </div>
            </div>
            <div class="row">
            <div class="col-12 col-md-6">
            <label for="cant" class="text-info">Cantidad</label>
            <input type="text" class="form-control" name="dir"  placeholder="Ingrese Cantidad" required>
            </div>
            <div class="col-12 col-md-6">
            <button class="btn btn-lg btn-primary btn-block" style="margin-top:30px;">Agregar Producto</button>
            </div>
            </div>
        </form>
        <div id="tabla">
        <table class="table table-hover">
		<tr>
            <td>CANTIDAD</td>
            <td>UNIDAD</td>
			<td>PRODUCTO</td>
			<td>P. UNIT</td>
            <td>IMPORTE</td>
		</tr>
	</table>
    </div>
    <div class="row">
        <div class="col-12 col-md-4">      
            <h5>-</h5>
        </div> 
        <div class="col-12 col-md-4">      
            <h5>Total</h5>
        </div> 
        <div class="col-12 col-md-4">      
        <input type="text" class="form-control" name="total" required>   
        </div> 
        </div>
        <div class="row">
        <div class="col-12 col-md-4">      
            <h5>-</h5>
        </div> 
        <div class="col-12 col-md-4">      
            <h5>-</h5>
        </div> 
        <div class="col-12 col-md-4">      
        <button class="btn btn-lg btn-primary btn-block" style="margin-top:30px;">Generar Nota de Pedido</button>   
        </div> 
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