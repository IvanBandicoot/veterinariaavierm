<?php

	session_start();

	if(!$_SESSION["validar"]){

		header("location:ingreso");
		exit();

	}

	include "views/modules/botonera.php";
	include "views/modules/cabezote.php";

?>

<!--=====================================
			Animal     
			======================================-->
			
	<div id="editarPerfil" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<form method="post">
			<h1 style="margin-bottom:30px; text-align:center">Registrar un animal</h1>
			<label for="">Nombre Animal</label>
			<input type="text" class="form form-control" style="margin-bottom:20px;" placeholder="Nombre del animal" name="mascota">
			<label for="">Cédula Dueño</label>
			<input type="text" class="form form-control" style="margin-bottom:20px;" placeholder="Cédula del dueño" name="cedula">
			<label for="">Tipo de vacunas</label>
			<input type="text" class="form form-control" style="margin-bottom:20px;" placeholder="Tipo del animal" name="vacuna">
			<label for="">Raza</label>
			<input type="text" class="form form-control" style="margin-bottom:20px;" placeholder="Raza del animal" name="raza">
			<label for="">Fecha de Nacimiento</label>
			<input type="date" class="form form-control" style="margin-bottom:20px;" placeholder="Fecha de Nacimiento" name="fechaNacimiento">
			<label for="">Sexo</label>
			<select class="form form-control" name="sexo">
				<option value="m">Macho</option>
				<option value="h">Hembra</option>
			</select>
			<input class="form-control formIngreso btn btn-warning pt-2" id="btn-ingreso" type="submit" value="Registrar mascota" style="margin-top:30px; margin-bottom:70px;">
			<?php 

				$animal = new Mascota();
				$animal -> agregarAnimal();

			?>
		</form>

		<form method="post">
			<h1 style="text-align:center; margin-bottom:30px;">Historial Médico</h1>
			<label for="">Nombre Animal</label>
			<input type="text" class="form form-control" name="animal" style="margin-bottom:20px;" placeholder="Nombre del animal">
			<label for="">Cédula Dueño</label>
			<input type="text" class="form form-control" name="cedulaD" style="margin-bottom:20px;" placeholder="Cédula del dueño">
			<label for="">Fecha de Consulta</label>
			<input type="date" class="form form-control" name="fechaConsulta" style="margin-bottom:20px;" placeholder="Fecha de Nacimiento">
			<label for="">Síntomas que prenseta</label>
			<textarea type="text" class="form form-control" name="sintomas" style="margin-bottom:20px;" placeholder="Síntomas que presenta"></textarea>
			<label for="">Desde cuando presenta los síntomas</label>
			<textarea type="text" class="form form-control" name="inicioSintomas" style="margin-bottom:20px;" placeholder="Desde cuando presenta los síntomas"></textarea>
			<label for="">Ultima visita al veterinario</label>
			<textarea type="text" class="form form-control" name="ultimaVisita" style="margin-bottom:20px;" placeholder="Ultima visita al veterinario"></textarea>
			<label for="">Enfermedades diagnosticada</label>
			<textarea type="text" class="form form-control" name="enfermedades" style="margin-bottom:20px;" placeholder="Enfermedades diagnosticada"></textarea>
			<input class="form-control formIngreso btn btn-warning" style="margin-top:30px;" id="btn-ingreso" type="submit" value="Registrar historia médica">

			<?php

				$historial = new historiaMedica();
				$historial -> agregarHistorial();

			?>

		</form>

</div>

    	<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	

				<hr>
				<div class="table-responsive">

				<table id="tablaSuscriptores" class="table table-striped display">
			    <thead>
			      <tr>
			        <th>Nombre Animal</th>
			        <th>Cédula</th>
							<th>Sexo</th>
							<th>Tipo Animal</th>
			        <th>Fecha de Nacimiento</th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody>
			        <?php 
			        	$lista = new Mascota();
			        	$lista -> visualizarMascotas();
			        	$lista -> borrarMascotas();
    					$lista -> editarMascota();
			        ?>
			    </tbody>
			  </table>

			  </div>
    		</div>

                <!--segunda tabla-->
				<div id="crearPerfil" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	

				
				<div class="space"></div>
				<div class="table-responsive">

				<table id="tablaSuscriptores2" class="table table-striped display">
			    <thead>
			      <tr>
			        <th>Inicio de los Sintomas</th>
			        <th>Cédula</th>
					<th>Ulltima Fecha Consulta</th>
					<th>Sintomas</th>
					<th>Enfermedad</th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php 
			    		$historialMedicas = new historiaMedica();
			    		$historialMedicas -> visualizarHistorial();
			    		$historialMedicas -> borrarHistorial();
			    		$historialMedicas -> editarHistorial();
			    	?>
			    </tbody>
			  </table>

			  </div>
    		</div>

			<!--====  Fin de PERFIL  ====-->

		<!--====  Fin de COLUMNA CONTENIDO  ====-->