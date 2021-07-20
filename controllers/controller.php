<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	static public function pagina(){	

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------

	static public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
	#REGISTRO DE USUARIOS
	public static function  registroUsuarioController()
	{
		if (
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset ($_POST["email"])
		) {
			if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
				if (preg_match('/^[A-Za-z0-9\_\-\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $_POST["email"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"])){
					$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$datos = array(
						"nombre" => $_POST["nombre"],
						"password" => $password,
						"email" => $_POST["email"]


					);
					$respuesta = Datos::registroUsuarioModel($datos, "usuarios");

					if ($respuesta == "success"){
						header("location:registro_ok");

					}else{
						header("location:registro_error");
					}
				}
			}
		}
	}
	#Vista Usuario

	public static function vistaUsuariosController()
	{
		$respuesta = Datos::vistaUsuariosModel("usuarios");

		foreach ($respuesta as $key => $value){
			echo ' <tr>
				<td>'.$value["nombre"].'</td>
				<td>*****************</td>
				<td>'.$value["email"].'</td>
				<td>
					<a href="index.php?action=editar&idEditar='.$value["id"].'">
					<button>
						Editar
					</button>
					</a>
				</td>
				<td>
					<a href="index.php?action=usuarios&idBorrar='.$value["id"].'">
					<button>
						Borrar
					</button>
					</a>
				</td>
			</tr>
			';
		}
	}
	#borrar usuarios
	public static function borrarUsuarioController(){
		if (isset($_GET["idBorrar"]) ){
			$datos = $_GET["idBorrar"];
			$respuesta = Datos::borrarUsuarioModel ($datos, "usuarios");
			if ( $respuesta=="success"){
				header("location:eliminado_ok");
			}else{
				header("location:eliminado_error");
			}


		}
	}
	#editar usuarios
	public static function editarUsuarioController()
	{
		if (isset($_GET["idEditar"])) {
			$datos = $_GET["idEditar"];
			$respuesta = Datos::editarUsuarioModel($datos, "usuarios");
			echo '
			
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
    	background-image: url("215112.jpg");
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

    <form class="splash-container" method="post">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Actualizar Datos</h3>
                <p>Ingrese la nueva informacion</p>
            </div>
            <input class="card-body" type="hidden" name="id" value="'.$respuesta["id"].'" required>
            <div class="card-body">
                <input class="form-control form-control-lg" type="text" placeholder="Usuario" name="nombre" value="'.$respuesta["nombre"].'" required>
            </div>
            <div class="card-body">
                <input class="form-control form-control-lg" type="email" placeholder="Email" name="email" value="'.$respuesta["email"].'" required>
            </div>
            <div class="card-body">
                <input class="form-control form-control-lg"  type="password" placeholder="Contraseña" name="password" required>
            </div>

	<input href="editar" type="submit" value="Enviar">';
		}
	}

	#ACTUALIZAR USUARIO
	public static function actualizarUsuarioController(){
		if (
			isset($_POST["id"]) &&
			isset($_POST["nombre"]) &&
			isset($_POST["password"]) &&
			isset ($_POST["email"])
		) {
			//$password = crypt($_POST['password'], '$2a$07assxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$datos = array(
				"id" => $_POST["id"],
				"nombre" => $_POST["nombre"],
				"password" => $password,
				"email" => $_POST["email"]

			);
			$respuesta = Datos::actualizarUsuarioModel($datos, "usuarios");

			if ($respuesta == "success"){
				header("location:actualizado_ok");

			}else{
				header("location:actualizado_error");
			}

		}
	}
	#INGRESO DE USUARIOS
	public static function ingresarUsuarioController(){
		if  (

			isset($_POST["nombre"]) &&
			isset($_POST["password"])
		){
			if( !empty($_POST["nombre"]) && !empty($_POST["password"])) {
				if (preg_match('/^[A-Za-z0-9\_\-\.]{3,20}$/', $_POST["nombre"]) &&
					preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST["password"])) {


					//$password = crypt($_POST['password'], '$2a$07assxx54ahjppf45sd87a5a4dDDGsystemdev$');
					//$password = password_hash($_POST["password"], PASSWORD_DEFAULT);

					$password = $_POST["password"];
					$datos = array(

						"nombre" => $_POST["nombre"],
						"password" => $password
					);
					$respuesta = Datos::ingresarUsuarioModel($datos, "usuarios");


					if ($respuesta["nombre"] == $datos["nombre"] && password_verify($_POST["password"], $respuesta["password"])) {
						$_SESSION["usuarioActivo"] = true;
						header("location:index.php?action=ingresar_ok");

					}else{
						header("location:index.php?action=ingresar_error");
					}
				}else{
					header("location:index.php?action=ingresar_error_invalido");
				}
			}else{
				header("location:index.php?action=ingresar_error_vacio");
			}
		}
	}


	public static function validarUsuarioController($datos){
		$respuesta = 0;
		if( !empty($datos)){
			if (preg_match('/^[A-Za-z0-9\_\-\.]{3,20}$/', $datos) )  {
				$respuesta = Datos::validarUsuarioModel($datos);
				if($respuesta[0] > 0){
					$respuesta = 1;
				}else{
					$respuesta = 0;
				}
			}
		}
		return $respuesta;
	}
	public static function validarEmailController($datos){
		$respuesta = 0;
		if( !empty($datos)){
			if (preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $datos) )  {
				$respuesta = Datos::validarEmailModel($datos);
				if($respuesta[0] > 0){
					$respuesta = 1;
				}else{
					$respuesta = 0;
				}
			}
		}
		return $respuesta;
	}
}

?>
