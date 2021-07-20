<?php
$registro = new MvcController();
$registro -> registroUsuarioController();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href=" assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href=" assets/libs/css/style.css">
    <link rel="stylesheet" href=" assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-image: url("29366.jpg");
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- login page  -->
<!-- ============================================================== -->
<div class="splash-container">
    <div class="card ">
        <div class="card-header text-center"><a ><img class="logo-img" src=" assets/images/logo.png" alt="logo"></a><span class="splash-description">Ingrese datos de inicio.</span></div>
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <input class="form-control form-control-lg"  type="text" placeholder="Usuario" name="nombre" >
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg"  type="password" placeholder="Contraseña" name="password">
                </div>

                <button type="submit" href="dashboard" class="btn btn-primary btn-lg btn-block">Ingresar</button>


            </form>
            <?php

            $ingresar = new MvcController();
            $ingresar -> ingresarUsuarioController();

            if (isset($_GET["action"])){
                if($_GET["action"]=="registro_ok"){
                    echo "Usuario correctamente ingresado";

                }else if ($_GET["action"]=="registro_error"){
                    echo "Usuario erroneamente Correctamente";
                }

            }

            if (isset($_GET["action"])){
                if($_GET["action"] == "ingresar_ok"){
                    echo "Usuario registrado correctamente";
                }else if ($_GET["action"]=="ingresar_error"){
                    echo "Error al ingresar";
                }else if ($_GET["action"] == "ingresar_error_invalido"){
                    echo "Error al ingresar, su usuario o  contraseña no cumple con los requisitos minimos";
                }else if ($_GET["action"] == "ingresar_error_vacio"){
                    echo "Error al ingresar, debe de ingresar un usuario o una contraseña";
                }
            }



            ?>


    </div>
</div>

<!-- ============================================================== -->
<!-- end login page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src=" assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src=" assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
