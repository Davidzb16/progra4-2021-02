<?php
require_once "../controllers/controller.php";
require_once "../models/crud.php";

class Ajax{
    public $validar_usuario;
    public $validar_email;

    public function validarUsuarioAjax(){
        $datos = $this->validar_usuario;

        $respuesta = MvcController::validarUsuarioController($datos);

        echo $respuesta;

    }
    public function validarEmailAjax(){
        $datos = $this->validar_email;

        $respuesta = MvcController::validarEmailController($datos);

        echo $respuesta;

    }


}

if(isset ( $_POST["nombre"] ) ){

    $a = new Ajax();
    $a -> validar_usuario = $_POST["nombre"];
    $a -> validarUsuarioAjax();

}

if(isset ( $_POST["email"] ) ){

    $a = new Ajax();
    $a -> validar_email = $_POST["email"];
    $a -> validarEmailAjax();

}