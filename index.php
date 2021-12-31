<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farmacia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link href="css/main.css" rel="stylesheet" />
    <!-- cambiar esto por una funcion js mandandole un booleano php desde aqui -->
    <?php
      $toggleModal = !isset($_SESSION['username']) ? ".show();" : ".hide();";
      echo '<script type="text/Javascript">
        // init project
        $(document).ready(function () {
          // Show Login modal
          var myModal = new bootstrap.Modal($("#myModal"));
          myModal'.$toggleModal.'
        });
        </script>';
    ?>
</head>

<body>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <a id="HOME_LOGO" class="navbar-brand" href="">PokeFarm</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link section" href="pages/accesos/MUsuario.php">Accesos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link section"
                                href="pages/inventario/Inventario.php">Inventario</a></li>
                        <li class="nav-item"><a class="nav-link section"
                                href="pages/vencimientos/vencimientos.php">Vencimientos</a></li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0" style="margin-right: 25px">
                        <li class="nav-item dropdown"
                            style="display:<?php echo (isset($_SESSION['username'])) ? 'block' : 'none'?>;">
                            <a class="nav-link dropdown-toggle section" href="#" id="dropdown05"
                                data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
                            <ul class="dropdown-menu mb-0" aria-labelledby="dropdown05" style="left: -120px;">
                                <li>
                                    <form class="dropdown-item" method="post" action="pages/login/login.php"
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

            <!-- The Modal -->
            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Login</h4>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="login-page">
                                <form class="login-form" method="post" action="pages/login/login.php">
                                    <div class="form-group">
                                        <label for="txtusuario" class="col-form-label">Usuario:</label>
                                        <input type="text" class="form-control" id="txtusuario" placeholder="Username"
                                            name="txtusuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtpassword" class="col-form-label">Password:</label>
                                        <input type="password" class="form-control" id="txtpassword"
                                            placeholder="Password" name="txtpassword">
                                    </div>
                                    <div class="form-group">
                                        <a class="col-form-label" href="">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-success" type="submit">Login</button>
                                        <button class="btn btn-danger" type="button"
                                            onclick="cleanLogin(this);">Limpiar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="homepage"></div>
        <footer class="footer">
            @UASD - Laboratorio de programacion III
        </footer>
    </div>
    <script src="js/main.js"></script>
</body>

</html>