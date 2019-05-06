<div id="backIngreso">
			<form method="post" id="formIngreso">

				<h1 id="tituloFormIngreso">INGRESE NUEVA CONTRASEÑA</h1>
				<input class="form-control formIngreso" type="password" placeholder="Nueva contraseña" name="nuevaContrasena">
				<input class="form-control formIngreso" type="password" placeholder="Confirmar usuario" name="Usuario">
				<input class="form-control formIngreso btn btn-warning" id="btn-ingreso" type="submit" value="Enviar">
				<div style="margin-top: 20px;"><a id="forget" href="ingreso">Sé mi contraseña</a></div>
				<div style="margin-top:15px;"><a id="forget" href="registro">¿Está registrado?</a></div>

				<?php

					$nueva = new Usuario();
					$nueva -> nuevaContrasenaController();
				?>

			</form>
</div>