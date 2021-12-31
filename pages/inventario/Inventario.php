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
    <div class="content">
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
                        <li class="nav-item"><a class="nav-link section active" href="">Inventario</a></li>
                        <li class="nav-item"><a class="nav-link section"
                                href="../vencimientos/vencimientos.php">Vencimientos</a></li>
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
        <section class="container">
            <h2 style="text-align: center;">Lista De Inventario</h2>

            <br>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewElement">
                Nuevo Articulo
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addNewElement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Agregar nuevo articulo</h5>
                        </div>
                        <form action="database.php" class="inventario" id="inventario" name="inventario" method="POST">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="codigo" placeholder="Codigo" required>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="descripcion" placeholder="Descripcion"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="suplidor" placeholder="Suplidor"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="number" name="cantidad" placeholder="Cantidad"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="text" name="costo" placeholder="Costo" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaEntrada" class="form-label">Fecha de Entrada</label>
                                    <input class="form-control" type="date" name="entrada" id="fechaEntrada" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaSalida" class="form-label">Fecha de Salida</label>
                                    <input class="form-control" type="date" name="salida" id="fechaSalida" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fechaExpiracion" class="form-label">Fecha de Expiración</label>
                                    <input class="form-control" type="date" name="expiracion" id="fechaExpiracion"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="cancelAddToInventory" type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <input class="btn btn-success" name="agregarAlInventario" type="submit"
                                    value="Agregar" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end Modal -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Suplidor</th>
                        <th>Cantidad</th>
                        <th>Costo</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Expiración</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
				$sum = 0;
				$sql = "SELECT * FROM datos";
				$consulta = mysqli_query($conn, $sql);
				$alert = mysqli_num_rows($consulta);
				if ($alert < 1) {
					echo "<tr><td>Sin registros</td></tr>";
				} else {
					while ($datos = mysqli_fetch_row($consulta)) {
			?>
                    <tr>
                        <td><?php echo $datos['0'] ?></td>
                        <td><?php echo $datos['1'] ?></td>
                        <td><?php echo $datos['2'] ?></td>
                        <td><?php echo $datos['3'] ?></td>
                        <td><?php echo $datos['4'] ?></td>
                        <td><?php echo $datos['5'] ?></td>
                        <td><?php echo $datos['6'] ?></td>
                        <td><?php echo $datos['7'] ?></td>
                        <td><?php echo $datos['8'] ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $datos['9'] ?>" <button
                                class="btn btn-outline-success">Editar</a></button>
                            <a href="eliminar.php?id=<?php echo $datos['9'] ?>" <button
                                class="btn btn-outline-danger">Eliminar</a></button>
                        </td>
                    </tr>

                    <?php }} ?>
                </tbody>
            </table>
            <table>
                <tr>
                    <th><?php echo "Cantidad de Productos: " . $alert;
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harison Suarez Contreras 100480485" ?></th>
            </table>
        </section>
        <!-- end container -->
        <footer class="footer">
            @UASD - Laboratorio de programacion III
        </footer>
    </div>
    </div>
    <script>
    function abrir() {
        document.getElementById("vent").style.display = "block";
    }

    function cerrar() {
        document.getElementById("vent").style.display = "none";
    }
    </script>
</body>

</html>