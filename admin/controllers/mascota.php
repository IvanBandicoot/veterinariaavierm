<?php

/**
 * 
 */
class Mascota{
	
	#agregar Animal
	public function agregarAnimal(){

		if(isset($_POST["mascota"])){

			$datosController = array("nombrem" => $_POST["mascota"],
									 "cedula" => $_POST["cedula"],
									 "vacuna" => $_POST["vacuna"],
									 "raza" => $_POST["raza"],
									 "fecha" => $_POST["fechaNacimiento"],
									 "sexo" => $_POST["sexo"]);

			$respuesta = mascotaModel::agregarAnimalModel($datosController, "mascota");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Mascota agregada correctamente!",
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
				echo '<div class="alert alert-warning"><b>ERROR !</b>No ingrese caracteres especiales</div>';
			}

		}//fin del isset

	}

	#visualizar mascotas 
	public function visualizarMascotas(){

		$respuesta = mascotaModel::visualizarMascotasModel("mascota");

		foreach ($respuesta as $row => $item) {
			
			echo '<tr>
					<td>'.$item["nombrem"].'</td>
			        <td>'.$item["cedula"].'</td>
			        <td>'.$item["sexo"].'</td>
					<td>'.$item["raza"].'</td>
					<td>'.$item["fecha"].'</td>
			        <td><a href="#historiamedica'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil modificarMascota"></span></a>
			        <a href="index.php?action=historiamedica&idBorrarMascota='.$item["id"].'"><span class="btn btn-danger fa fa-times eliminarrMascota" style="margin-left:10px;"></span></a></td>
	        	</tr>

	        	<div id="historiamedica'.$item["id"].'" class="modal fade">
			      	
			      	<div class="modal-dialog modal-content">
			      		
			      		<div class="modal-header" style="border:1px solid #eee">

			      			<button type="button" class="close" data-dismiss="modal">&times;</button>
			      			
			      			<h3 class="modal-title">Editar Mascota</h3>
			      		
			      		</div>
			      		
			      		<div class="modal-footer" style="border:1px solid #eee">

			      			 <form style="padding: 20px" method="post">
        
						        <input type="hidden" name="idMascota" value="'.$item["id"].'">

						        <div class="form-group">
						          <label style="float:left">Nombre de Mascota:</label>
						          <input type="text" name="editarNombreMascota" value="'.$item["nombrem"].'" class="form-control" required>
						        </div>

						       <div class="form-group">
						       <label style="float:left">Vacuna:</label>
						          <input type="text" name="editarVacuna" value="'.$item["vacuna"].'" class="form-control" required>
						       </div>

   						       <div class="form-group">
   						       <label style="float:left">Fecha de nacimiento:</label>
						          <input type="text" name="editarfecha" value="'.$item["fecha"].'" class="form-control" required>
						       </div>

						       <div class="form-group">
						          <select name="editarSexo" class="form-control" required>
						            <option value="">Seleccione el Sexo</option>
						            <option value="m">Macho</option>
						            <option value="h">Hembra</option>
						          </select>
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
	}// fin de visualizar

	#editar mascota
	public function editarMascota(){

		if(isset($_POST["editarNombreMascota"])){

			$datosController = array("id" => $_POST["idMascota"],
									 "nombrem" => $_POST["editarNombreMascota"],
									 "vacuna" => $_POST["editarVacuna"],
									 "fecha" => $_POST["editarfecha"],
									 "sexo" => $_POST["editarSexo"]
									);

			$respuesta = mascotaModel::editarMascotaModel($datosController, "mascota");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Mascota Editada correctamente!",
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

	#borrar mascota

	public function borrarMascotas(){

		if(isset($_GET["idBorrarMascota"])){

			$datos = $_GET["idBorrarMascota"];

			$respuesta = mascotaModel::borrarMascotaModel($datos, "mascota");

			if($respuesta == "ok"){
				echo '<script>
						swal({
						title: "¡OK!",
						text: "¡Mascota borrada correctamente!",
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
				echo 'ha ocurrido algo';
			}

		}
	}

}