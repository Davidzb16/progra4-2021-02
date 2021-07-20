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
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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
            background-image: url("FondosHD.MX_fondos-de-pantalla-rick-and-morty-hd_1920x1080.jpg");
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->
<form class="splash-container" method="post">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Registro de usuario</h3>
            <p>Ingresar la informacion del usuario</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" placeholder="Usuario" name="nombre" required>
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg"  type="password" placeholder="Contraseña" name="password" required>
            </div>

            <div class="form-group pt-2">
                <button href="ingresar" class="btn btn-block btn-primary" type="submit">Registrar</button>
            </div>
            <?php



            if (isset($_GET["action"])){
                if($_GET["action"]=="registro_ok"){
                    echo "Usuario correctamente ingresado";

                }else if ($_GET["action"]=="registro_error"){
                    echo "Usuario erroneamente ingresado";
                }

            }
            ?>

        </div>





    </div>
</form>
</body>


</html>

