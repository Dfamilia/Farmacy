<?php
session_start();
include("../../conexion.php");
?>

<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar Producto</title>
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
         if('.$isNotLogin.'){	alert("Debes iniciar sesión para acceder..."); window.location= "../../index.php"; };
        });
        </script>';
    ?>
</head>

<body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <a id="HOME_LOGO" class="navbar-brand" href="../../index.php">PokeFarm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
                aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link section active" href="inventario.php">Inventario</a></li>
                    <li class="nav-item"><a class="nav-link section"
                            href="../vencimientos/vencimientos.php">Vencimientos</a></li>
                    <li class="nav-item"><a class="nav-link section" href="Registros/Menu principal.php">Registros</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0" style="margin-right: 25px">
                    <li class="nav-item dropdown"
                        style="display:<?php echo (isset($_SESSION['username'])) ? 'block' : 'none' ?>;">
                        <a class="nav-link dropdown-toggle section" href="#" id="dropdown05" data-bs-toggle="dropdown"
                            aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
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

    <div class="container actualizarInventario">

        <h2 style="text-align: center;">Actualizar Datos</h2>

        <?php
          include("../../conexion.php");
          $id = $_GET['id'];
          $editar = "SELECT * FROM datos WHERE id = '$id'";
          $edit = mysqli_query($conn,$editar);
          while($datos = mysqli_fetch_row($edit)){
        ?>
        <form class="row gx-3 mx-auto mt-5" action="database.php" method="POST">
            <div class="col-md-3">
                <label for="codigo" class="form-label">Codigo:</label>
                <input class="form-control" type="text" id="codigo" name="codigo" value="<?php echo $datos['0'] ?>"
                    required>
            </div>
            <div class="col-md-9">
                <label for="nombre" class="form-label">Nombre:</label>
                <input class="form-control" type="text" id="nombre" name="nombre" value="<?php echo $datos['1'] ?>"
                    required><br>
            </div>
            <div class="col-md-12">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input class="form-control" type="text" id="descripcion" name="descripcion"
                    value="<?php echo $datos['2'] ?>" required><br>
            </div>
            <div class="col-md-8">
                <label for="suplidor" class="form-label">Suplidor:</label>
                <input class="form-control" type="text" id="suplidor" name="suplidor" value="<?php echo $datos['3'] ?>"
                    required><br>
            </div>
            <div class="col-md-2">
                <label for="cantidad" class="form-label">Cantidad:</label>
                <input class="form-control" type="number" id="cantidad" name="cantidad"
                    value="<?php echo $datos['4'] ?>" required><br>
            </div>
            <div class="col-md-2">
                <label for="costo" class="form-label">Costo:</label>
                <input class="form-control" type="number" id="costo" name="costo" value="<?php echo $datos['5'] ?>"
                    required><br>
            </div>
            <div class="col-md-4">
                <label for="entrada" class="form-label">Entrada:</label>
                <input class="form-control" type="date" id="entrada" name="entrada" value="<?php echo $datos['6'] ?>"
                    required><br>
            </div>
            <div class="col-md-4">
                <label for="salida" class="form-label">Salida:</label>
                <input class="form-control" type="date" id="salida" name="salida" value="<?php echo $datos['7'] ?>"
                    required><br>
            </div>
            <div class="col-md-4">
                <label for="expiracion" class="form-label">Expiración:</label>
                <input class="form-control" type="date" id="expiracion" name="expiracion"
                    value="<?php echo $datos['8'] ?>" required><br>
            </div>
            <input type="hidden" name="id" value="<?php echo $datos['9'] ?>">

            <div class="d-flex justify-content-evenly mt-4">
                <a class="btn btn-danger col-md-4" href="Inventario.php">Salir</a>
                <button class="btn btn-success col-md-4" name="actualizarProducto" type="submit">
                    Actualizar Producto
                </button>
            </div>
        </form>

        <?php } ?>
    </div>
</body>

</html>