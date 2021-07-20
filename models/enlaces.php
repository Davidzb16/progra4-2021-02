<?php

class Paginas{

	static public function enlacesPaginasModel($enlaces){

		switch ($enlaces){
			case "ingresar":
				$module =  "views/modules/".$enlaces.".php";
				break;
			case "usuarios":
			$module =  "views/modules/".$enlaces.".php";
			break;
			case "editar":
			$module =  "views/modules/".$enlaces.".php";
			break;
			case "salir":
				$module =  "views/modules/".$enlaces.".php";
				break;

			case "registro_ok":
				$module = "views/modules/ingresar.php";
				break;
			case "registro_error":
				$module =  "views/modules/registro.php";
				break;
            case "eliminado_ok":
                $module = "views/modules/usuarios.php";
                break;
            case "eliminado_error":
                $module =  "views/modules/usuarios.php";
                break;
            case "actualizado_ok":
                $module = "views/modules/usuarios.php";
                break;
            case "actualizado_error":
                $module =  "views/modules/usuarios.php";
                break;
            case "ingresar_ok":
                $module = "views/modules/dashboard.php";
                break;
            case "ingresar_error":
                $module =  "views/modules/ingresar.php";
                break;
            case "ingresar_error_invalido":
                $module =  "views/modules/ingresar.php";
                break;
            case "ingresar_error_vacio":
                $module =  "views/modules/ingresar.php";
                break;

            default:
				$module =  "views/modules/registro.php";
		}



		return $module;

	}

}




