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
			INICIO       
			======================================-->
			
			<!--ADMIN-->

			<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
			 
				<div class="jumbotron">
				    <h1>Bienvenido <?php echo $_SESSION["nombre"]." ".$_SESSION["apellido"]; ?> </h1>
				    <p>Bienvenido al panel de control.</p>
				</div>

					<hr>
				
				<ul>

					<li class="botonesInicio">
					
						<a href="inicio">
						<div style="background:#F640DA">
						<span class="fa fa-file-text-o"></span>
						<p>Artículos</p>
						</div>
						</a>

					</li>

					<?php
					if($_SESSION["usuario"] != "admin"){

						echo '<li class="botonesInicio">
			
									<a href="vacunasConsulta">
									<div style="background:#ED3E3E">
									<span class="fa fa-medkit"></span>
									<p>Consultar Vacunas</p>
									</div>
									</a>

								</li>';
					}
					?>

					<?php if($_SESSION["usuario"] == "admin"){
					echo '<li class="botonesInicio">
					
								<a href="inicio">
								<div style="background:#04E6DE">
								<span class="fa fa-image"></span>
								<p>Galería</p>
								</div>
								</a>

							</li>

					<li class="botonesInicio">
					
						<a href="vacunas">
						<div style="background:#FFBD1A">
						<span class="fa fa-medkit"></span>
						<p>Vacuna</p>
						</div>
						</a>

					</li>

					<li class="botonesInicio">
					
						<a href="historiamedica">
						<div style="background:#ED3E3E">
						<span class="fa fa-paw"></span>
						<p>Historia Médica</p>
						</div>
						</a>

					</li>

					<li class="botonesInicio">
					
						<a href="inicio">
						<div style="background:#19FF0E">
						<span class="fa fa-newspaper-o"></span>
						<p>Noticia</p>
						</div>
						</a>

					</li>';
					}
					?>

				</ul>

    		</div>

			<!--USUARIO
			
				<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
			 
				<div class="jumbotron">
				    <h1>Bienvenido</h1>
				    <p>Bienvenido a la página inicial.</p>
				</div>

					<hr>
				
				<ul>


					<li class="botonesInicio">
					
						<a href="inicio">
						<div style="background:#F640DA">
						<span class="fa fa-file-text-o"></span>
						<p>Artículos</p>
						</div>
						</a>

					</li>

				</ul>

    		</div>

			-->

    	
			<!--====  Fin de INICIO  ====-->
