<?php 

/**
 * 
 */
class historiaMedicaModel{
	
	#agregar historial
	public function agregarHistorialModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombrea, cedula, fechaconsula, sintomas, iniciosintomas, ultimavisita, enfermedad) VALUES (:nombrea, :cedula, :fechaconsula, :sintomas, :iniciosintomas, :ultimavisita, :enfermedad)");

		$stmt -> bindParam(":nombrea", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":cedula", $datos["cedula"], PDO::PARAM_INT);
		$stmt -> bindParam(":fechaconsula", $datos["fechaconsula"], PDO::PARAM_STR);
		$stmt -> bindParam(":sintomas", $datos["sintomas"], PDO::PARAM_STR);
		$stmt -> bindParam(":iniciosintomas", $datos["iniciosintomas"], PDO::PARAM_STR);
		$stmt -> bindParam(":ultimavisita", $datos["ultimavisita"], PDO::PARAM_STR);
		$stmt -> bindParam(":enfermedad", $datos["enfermedad"], PDO::PARAM_STR);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#visualizar historial medico
	public function visualizarHistorialMedica($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombrea, iniciosintomas, cedula, ultimavisita, fechaconsula, sintomas, enfermedad FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#borrar historial medico
	public function borrarHistorialModel($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt -> close();
	}

	#editar historial medico
	public function editarHistorialMedico($datos, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET iniciosintomas = :iniciosintomas, enfermedad = :enfermedad, sintomas = :sintomas, ultimavisita = :ultimavisita WHERE id = :id");

		$stmt -> bindParam(":iniciosintomas", $datos["iniciosintomas"], PDO::PARAM_STR);
		$stmt -> bindParam(":sintomas", $datos["sintomas"], PDO::PARAM_STR);
		$stmt -> bindParam(":enfermedad", $datos["ultimavisita"], PDO::PARAM_STR);
		$stmt -> bindParam(":ultimavisita", $datos["ultimavisita"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}

	}

}