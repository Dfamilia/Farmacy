<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mod-usuario</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- estilos -->
    <link rel="stylesheet" href="../../css/MUsuarioStyles.css">
    <link rel="stylesheet" href="../../css/main.css">
    <!-- w3.js -->
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="../../js/Script.js"></script>

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
                        <li class="nav-item"><a class="nav-link section active"
                                href="../accesos/MUsuario.php">Accesos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link section"
                                href="../inventario/inventario.php">Inventario</a></li>
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
            <h2 style="text-align: center;">Lista De Acceso De Usuarios</h2>
            <div class="buscar my-5">
                <input class="form-control mr-sm-2 " type="search" placeholder="Buscar" aria-label="Search"
                    id="txt_buscar" oninput="w3.filterHTML('#table', '.item', this.value)">
                <button type="button" class="btn btn-primary" id="agregar_user">Agregar Nuevo</button>
            </div>

            <table class="table" id="table">
            </table>

            <div class="sombra_ventana_emergente">
                <div class="ventana_emergente">
                    <img src="../../assets/cerrar.png" id="cerrar_form" class="hover cerrar_form">
                    <h2 id="titulo">Nuevo usuario</h2>
                    <br>
                    <form id="form-user">
                        Usuario <input class="input" id="user" name="user" type="text" placeholder="Ingrese el nombre"
                            required>
                        Contraseña <input id="pass" name="pass" type="password" placeholder="Ingrese una contraseña"
                            required>
                        Roles
                        <Select class="lista" name="rol" id="rol">
                            <option value="Administrador">Administrador</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Inventario">Inventario</option>
                        </Select>
                        <button type="button" id="form_btn_guardar" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>