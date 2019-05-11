<?php

require_once "../../controllers/usuario.php";
require_once "../../models/usuario.php";

class Ajax{

	public $validarUsuario;
	public $validarEmail;

	public function validarUsuarioAjax(){

		$datos = $this->validarUsuario;
		
		$respuesta = Usuario::validarUsuarioAjaxController($datos);

		echo $respuesta;

	}

	public function validarEmailAjax(){

		$datos = $this->validarEmail;

		$respuesta = Usuario::validarEmailController($datos);

		echo $respuesta;
	}

}

//usuario
if(isset($_POST["validarUsuario"])){

	$a = new Ajax();
	$a -> validarUsuario = $_POST["validarUsuario"];
	$a -> validarUsuarioAjax();

}

if(isset($_POST["validarEmail"])){

	$b = new Ajax();
	$b -> validarEmail = $_POST["validarEmail"];
	$b -> validarEmailAjax();
}

