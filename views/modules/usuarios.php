<?php
    if(isset($_SESSION)){
        if(!$_SESSION["usuarioActivo"]){
            header("location:index.php?action=ingresar_error");
        }
    }else{
        header("location:index.php?action=ingresar_error");
        exit();
    }
    $usuarios=new MvcController();

?>

    <?php
        $usuarios -> borrarUsuarioController();

    if (isset($_GET["action"])){
    if($_GET["action"]== "eliminado_ok"){
        echo "Usuario eliminado correctamente";

    }elseif ($_GET["action"]=="eliminado_error"){
        echo "Ocurrio un error al eliminar al usuario";
    }
}

$usuarios -> actualizarUsuarioController();

if (isset($_GET["action"])){
    if($_GET["action"]== "actualizado_ok"){
        echo "Usuario actualizado correctamente";

    }elseif ($_GET["action"]=="actualizado_error"){
        echo "Ocurrio un error al actualizar al usuario";
    }
}

$usuarios -> ingresarUsuarioController();
if (isset($_GET["action"])){
    if($_GET["action"]== "ingresar_ok"){
        echo "Bienvenido";

    }elseif ($_GET["action"]=="ingresar_error"){
        echo "Usuario o Contraseña incorrecta";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Tables</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href=" assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href=" assets/libs/css/style.css">
    <link rel="stylesheet" href=" assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href=" assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href=" assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href=" assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href=" assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <?php include "navegacion.php"; ?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Data Tables</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Menu</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Tablas</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Basic Table</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>

                                                <th>Nombre</th>
                                                <th>Contraseña</th>
                                                <th>email</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody>
                                        <?php
                                        $usuarios ->vistaUsuariosController();
                                        ?>


                                        </tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Nombre</th>
                                                <th>Contraseña</th>
                                                <th>email</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->

<?php include "footer.php"; ?>