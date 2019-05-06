<div id="backIngreso" style="margin-top: -100px;">
			<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

				<h1 id="tituloFormIngreso">RECUPERAR CONTRASEÑA</h1>
				
				<input class="form-control formIngreso" type="text" placeholder="Cédula" id="usuarioIngreso" name="usuarioCedula">
				<input class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Enviar">
				<div style="margin-top: 10px;"><a id="forget" href="ingreso">Sé mi contraseña</a></div>
				<div style="margin:15px 0 15px;"><a id="forget" href="registro">¿Está registrado?</a></div>
				<?php

					$password = new Usuario();
					$password -> recuperarContrasena();
					$password -> seleccionarRespuesta();
				?>
			</form>
		</div>