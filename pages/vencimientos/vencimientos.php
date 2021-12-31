<?php
session_start();
include("../../conexion.php");
?>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="../../css/main.css" rel="stylesheet" />
    <script src="../../js/main.js"></script>
    <!-- cambiar esto por una funcion js mandandole un booleano php desde aqui -->
    <?php
	$isNotLogin = !isset($_SESSION['username']) ? 'true' : 'false';
      echo '<script type="text/Javascript">
        // init project
        $(document).ready(function () {
          // Show Login modal
         if('.$isNotLogin.'){
			alert("Debes iniciar sesión para acceder..."); window.location= "../../index.php";
		 }
        });
        </script>';
    ?>
</head>

<body>
    <!-- container -->
    <div class="content">
        <?php	
		// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		date_default_timezone_set('America/Santo_Domingo');        
		$fechaActual= isset($_POST['buscarPorFecha']) ?  new DateTime($_POST['buscarPorFecha']) : new DateTime('now'); 
	?>
        <!-- navbar  -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <a id="HOME_LOGO" class="navbar-brand" href="../../index.php">PokeFarm</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link section" href="../accesos/MUsuario.php">Accesos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link section"
                                href="../inventario/inventario.php">Inventario</a>
                        </li>
                        <li class="nav-item"><a class="nav-link section active" href="">Vencimientos</a></li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0" style="margin-right: 25px">
                        <li class="nav-item dropdown"
                            style="display:<?php echo (isset($_SESSION['username'])) ? 'block' : 'none' ?>;">
                            <a class="nav-link dropdown-toggle section" href="#" id="dropdown05"
                                data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown05" style="left: -120px;">
                                <li>
                                    <form class="dropdown-item mb-0" method="post" action="../login/login.php"
                                        style="border: none;">
                                        <input class="btn btn-outline-danger" type="submit" name="logout"
                                            value="Cerrar Session" />
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar  -->
        <!-- container -->
        <div class="container">
            <h2 style="text-align: center;">Lista De Vencimientos</h2>

            <div class="row justify-content-center my-5">
                <form class="col-4" method="POST">
                    <div class="input-group">
                        <span class="input-group-text bg-secondary fw-bold" style="color:white;"
                            id="dateNow">Fecha</span>
                        <input type="date" name="buscarPorFecha" class="form-control" aria-describedby="dateNow"
                            value="<?php echo $fechaActual->format("Y-m-d"); ?>" />
                        <input class="btn btn-info" name="buscar" type="submit" value="Buscar" />

                    </div>
                </form>
            </div>

            <table class="table">
                <thead>

                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Suplidor</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
				$consulta = "SELECT * FROM datos";
				$ejecutarConsulta = mysqli_query($conn, $consulta);
				$verFilas = mysqli_num_rows($ejecutarConsulta);
				$fila = mysqli_fetch_array($ejecutarConsulta);

				if(!$ejecutarConsulta){echo"Error en la consulta";}	
				else if($verFilas < 1)
				{
					echo"<tr><td>Sin registros</td></tr>";
				}else{					
					for($i=0; $i<=$fila; $i++)
					{
						//calculo de vencimiento
						$fechaDeExpiracion = new DateTime($fila[8]);
						if($fechaActual >= $fechaDeExpiracion)
						{
							$estilo = "class='btn btn-danger fw-bold'";
							$estado="VENCIDO";
						}
						else
						{
							$estilo = "class='btn btn-success fw-bold'";
							$estado="BUENO";
						}

							echo'
							<tr>
								<td>'.$fila[0].'</td>
								<td>'.$fila[1].'</td>
								<td>'.$fila[3].'</td>
								<td>'.$fila[4].'</td>
								<td>'.$fechaDeExpiracion->format("F j, Y").'</td>
								<td ><span '.$estilo.'>'.$estado.'</span></td>
							</tr>
						';

						$fila = mysqli_fetch_array($ejecutarConsulta);
					}
				}	
			?>
                </tbody>
            </table>
        </div>
        <footer class="footer">
            @UASD - Laboratorio de programacion III
        </footer>
    </div>
    <!-- end container -->
</body>

</html>