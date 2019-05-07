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
			PERFIL       
			======================================-->
			
			<div id="editarPerfil" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			 <div style="margin-right: 70px;">
			 	<h1><?php echo $_SESSION["usuario"]; ?> 
				<span id="btnEditarPerfil" class="btn btn-info fa fa-pencil pull-left" style="font-size:10px; margin-right:10px"></span></h1>
			  </div>
				<div style="position:relative">
				<img src="views/images/photo.jpg" class="img-circle pull-right">
				
				</div>

				<hr>

				<h4>Nombre: <?php echo $_SESSION["nombre"];?></h4>

				<h4>Apellido: <?php echo $_SESSION["apellido"];?></h4>

				<h4>Email: <?php echo $_SESSION["correo"];?></h4>
	
				<h4>Contraseña: *******</ph4>
			 </div>

			 <!--Editar perfil-->

     <div id="formEditarPerfil" style="display: none" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

     	<span id="cancelarEditarPerfil" class="btn btn-danger fa fa-times quitarSuscriptor" style="margin: 10px 0 0 10px;"></span>
      
      <form style="padding: 20px" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="idPerfil" value="<?php echo $_SESSION["id"];?>">

        <input type="hidden" name="actualizarSesion" value="ok">

        <div class="form-group">
          <input type="text" name="editarNombre" value="<?php echo $_SESSION["nombre"];?>" class="form-control" required>
        </div>

        <div class="form-group">
          <input type="text" name="editarApellido" value="<?php echo $_SESSION["apellido"];?>" class="form-control" required>
        </div>

       <div class="form-group">
          <input type="email" name="editarEmail" value="<?php echo $_SESSION["correo"];?>" class="form-control" required>
       </div>

       <div class="form-group">
          <select name="EditarPreguntaSeguridad" class="form-control" required>
            <option value="">Seleccione una Pregunta de seguridad</option>
			<option value="">-Escoga pregunta de seguridad-</option>
			<option value="¿Comida Favorita?">¿Comida Favorita?</option>
			<option value="¿Deporte Favorito?">¿Deporte Favorito?</option>
			<option value="¿Serie de Televisión Favorita?">¿Serie de Televisión Favorita?</option>
			<option value="¿Familiar Querido?">¿Familiar Querido?</option>
			<option value="¿Color Favorito?">¿Color Favorito?</option>
          </select>
       </div>

       <div class="form-group">
          <input type="text" name="editarRespuesta" placeholder="Nueva respuesta de seguridad" class="form-control" required>
        </div>

       <input type="submit" id="guardarPerfil" value="Actualizar Perfil" class="btn btn-primary">

       <?php
       	$editar = new Perfil();
       	$editar -> editarPerfil();
       ?>

      </form>

    </div>

    	</div>

				<hr>
<?php

	if($_SESSION["usuario"] == "admin"){

		echo '
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="float:right; margin-top:-1120px">
			<div class="table-responsive">';

				echo '<!--ADMIN-->';

				echo '<table id="tablaSuscriptores" class="table table-striped display">
			    <thead>';
			      echo '<tr>
			      	<th>Nombre</th>
			      	<th>Apellido</th>
			        <th>Usuario</th>
			        <th>Cédula</th>
			        <th>Correo</th>
			        <th></th>
			      </tr>';
			    echo '</thead>
			    <tbody>';
			    
			    $lista = new Perfil();
			    $lista -> visualizarPerfil();
			    $lista -> borrarUsuario();
				echo '</tbody>
				</thead>
			  </table>
			</div>
		</div>';

	}

?>

				<!--USUARIO
				
				<table id="tablaSuscriptores" class="table table-striped display">
			    <thead>
			      <tr>
			        <th>Nombre Mascota</th>
			        <th>Tipo Animal</th>
			        <th>Fecha Nacimiento</th>
			        <th>Consultar y Descargar vacunas</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
			        <td>Toby</td>
			        <td>Perro</td>
			        <td>24/06/2017</td>
							<td><span class="btn btn-info fa fa-search quitarSuscriptor"></span><span class="btn btn-warning fa fa-download descargarVacunas" style="margin-left: 10px;"></span></td>
			      </tr>
			      <tr>
			        <td>Mary</td>
			        <td>Loro</td>
			        <td>05/12/2013</td>
			        <td><span class="btn btn-info fa fa-search quitarSuscriptor"></span><span class="btn btn-warning fa fa-download descargarVacunas" style="margin-left: 10px;"></span></td>
			      </tr>
			      <tr>
			        <td>Misu</td>
			        <td>Gato</td>
			        <td>31/12/2018</td>
			        <td><span class="btn btn-info fa fa-search quitarSuscriptor"></span><span class="btn btn-warning fa fa-download descargarVacunas" style="margin-left: 10px;"></span></td>
			      </tr>
			        <tr>
			        <td>John</td>
			        <td>Lobo</td>
			        <td>13/08/2016</td>
			        <td><span class="btn btn-info fa fa-search quitarSuscriptor"></span><span class="btn btn-warning fa fa-download descargarVacunas" style="margin-left: 10px;"></span></td>
			      </tr>
			    </tbody>
			  </table>

				-->

			  </div>
    		</div>

			<!--====  Fin de PERFIL  ====-->

		<!--====  Fin de COLUMNA CONTENIDO  ====-->