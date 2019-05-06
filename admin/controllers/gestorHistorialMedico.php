<?php 

/**
 * 
 */
class historiaMedica{
	
	#agregar historial medico
	public function agregarHistorial(){

		if(isset($_POST["animal"])){

			$datosController = array("nombre" => $_POST["animal"],
									 "cedula" => $_POST["cedulaD"],
									 "fechaconsula" => $_POST["fechaConsulta"],
									 "sintomas" => $_POST["sintomas"],
									 "iniciosintomas" => $_POST["inicioSintomas"],
									 "ultimavisita" => $_POST["ultimaVisita"],
									 "enfermedad" => $_POST["enfermedades"]);

			$respuesta = historiaMedicaModel::agregarHistorialModel($datosController, "historial");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Historia medica registrada!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "historiamedica";
							}
						});
					    </script>';
			}else{
				echo '<div class="alert alert-warning"><b>ERROR</div>';
			}
		}

	}

	#visualizar historiales
	public function visualizarHistorial(){

		$respuesta = historiaMedicaModel::visualizarHistorialMedica("historial");

		foreach ($respuesta as $row => $item) {
			echo '<tr>
			        <td>'.$item["iniciosintomas"].'</td>
			        <td>'.$item["cedula"].'</td>
					<td>'.$item["ultimavisita"].'</td>
					<td>'.$item["sintomas"].'</td>
					<td>'.$item["enfermedad"].'</td>
			        <td>
			        <a href="#historiamedica'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil modificarMascota"></span></a>
			        <a href=index.php?action=historiamedica&id='.$item["id"].'><span class="btn btn-danger fa fa-times eliminarrMascota" style="margin-left:10px;"></span></a></td>
			      </tr>

			      <div id="historiamedica'.$item["id"].'" class="modal fade">
			      	
			      	<div class="modal-dialog modal-content">
			      		
			      		<div class="modal-header" style="border:1px solid #eee">

			      			<button type="button" class="close" data-dismiss="modal">&times;</button>
			      			
			      			<h3 class="modal-title">Editar Historial Medico</h3>
			      		
			      		</div>
			      		
			      		<div class="modal-footer" style="border:1px solid #eee">

			      			 <form style="padding: 20px" method="post">
        
						        <input type="hidden" name="idMascota" value="'.$item["id"].'">

						        <div class="form-group">
						          <input type="text" value="'.$item["nombrea"].'" class="form-control" readonly>
						        </div>

						        <div class="form-group">
						          <label style="float:left">Comienzo de los sintomas:</label>
						          <input type="text" name="inicioSintomas" value="'.$item["iniciosintomas"].'" class="form-control" required>
						        </div>

						       <div class="form-group">
						       <label style="float:left">Fecha de consulta:</label>
						          <input type="text" name="editarFechaConsulta" value="'.$item["ultimavisita"].'" class="form-control" required>
						       </div>

   						       <div class="form-group">
   						       <label style="float:left">Sintomas:</label>
						          <input type="text" name="sintomas" value="'.$item["sintomas"].'" class="form-control" required>
						       </div>

						       <div class="form-group">
   						       <label style="float:left">Enfermedad:</label>
						          <input type="text" name="editarEnfermedad" value="'.$item["enfermedad"].'" class="form-control" required>
						       </div>

						       <div class="form-group text-center">
						       		<input type="submit" id="guardarMascota" value="Actualizar Mascota" class="btn btn-primary">
						       </div>
						      
						      </form>

			      		</div>
			      	
			      	</div>
			      
			      </div>
			      ';
		}

	}

	#borrar historial
	public function borrarHistorial(){

		if(isset($_GET["id"])){
			$datos = $_GET["id"];

			$respuesta = historiaMedicaModel::borrarHistorialModel($datos, "historial");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "!Historial Medico borrada correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "historiamedica";
							}
						});
					    </script>';
			}
		}
	}

	#editar historial
	public function editarHistorial(){

		if(isset($_POST["inicioSintomas"])){

			$datos = array("iniciosintomas" => $_POST["inicioSintomas"],
									 "enfermedad" => $_POST["editarEnfermedad"],
									 "sintomas" => $_POST["sintomas"],
									 "ultimavisita" => $_POST["editarFechaConsulta"],
									 "id" => $_POST["idMascota"]);

			$respuesta = historiaMedicaModel::editarHistorialMedico($datos, "historial");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "!Historial Medico editado correctamente!",
						type: "success",
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						},
						function(isConfirm){
							if (isConfirm){
								window.location = "historiamedica";
							}
						});
					    </script>';
			}
			
		}

	}

}