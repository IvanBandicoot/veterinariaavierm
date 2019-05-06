		<div id="backIngreso">
			<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

				<h1 id="tituloFormIngreso">INICIO DE SESIÓN</h1>
				
				<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" id="usuarioIngreso" name="usuarioIngreso">
				<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" id="passwordIngreso" name="passwordIngreso">
						<?php

							$ingreso = new Usuario();
							$ingreso -> ingresoController();

						?>
				<input class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Enviar">
				<div style="margin-top: 20px;"><a id="forget" href="registro">¿Está registrado?</a></div>
				<div style="margin-top:15px;"><a id="forget" href="recuperarContrasena">¿Olvidó su contraseña?</a></div>
			</form>
		</div>
