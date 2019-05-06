<?php

require_once "conexion.php";

/**
 * 
 */
class mascotaModel{
	
	#agregar mascota
	public function agregarAnimalModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombrem, cedula, vacuna, raza, fecha, sexo) VALUES (:nombrem, :cedula, :vacuna, :raza, :fecha, :sexo)");

		$stmt -> bindParam(":nombrem",$datos["nombrem"], PDO::PARAM_STR);
		$stmt -> bindParam("cedula",$datos["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam("vacuna",$datos["vacuna"], PDO::PARAM_STR);
		$stmt -> bindParam("raza",$datos["raza"], PDO::PARAM_STR);
		$stmt -> bindParam("fecha",$datos["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam("sexo",$datos["sexo"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#mostrar mascotas
	public function visualizarMascotasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombrem, cedula, sexo, raza, fecha, vacuna FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#editar mascota
	public function editarMascotaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombrem = :nombrem, vacuna = :vacuna, fecha = :fecha, sexo = :sexo WHERE id = :id");

		$stmt -> bindParam(":nombrem", $datos["nombrem"], PDO::PARAM_STR);
		$stmt -> bindParam(":vacuna", $datos["vacuna"], PDO::PARAM_STR);
		$stmt -> bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt -> bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#borrar mascota
	public function borrarMascotaModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

}