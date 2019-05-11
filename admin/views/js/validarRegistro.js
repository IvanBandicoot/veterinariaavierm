/*=============================================
VALIDAR USUARIO EXISTENTE AJAX
=============================================*/

var usuarioExistente = false;
var correoExistente = false;

$("#usuarioRegistro").change(function(){

	var usuario = $("#usuarioRegistro").val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);
	
	$.ajax({
		url:"views/ajax/registro.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == 0){

				$("label[for='usuarioR'] span").html('<p style="color:white;">Este usuario ya existe en la base de datos</p>');

				usuarioExistente = true;
			}

			else{

				$("label[for='usuarioR'] span").html("");
				usuarioExistente = false;

			}
		
		}

	});

});

/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/

/*=============================================
VALIDAR EMAIL EXISTENTE AJAX
=============================================*/

$("#correoRegistro").change(function(){

	var email = $("#correoRegistro").val();

	var datos = new FormData();

	datos.append("validarEmail", email);
	
	$.ajax({
		url:"views/ajax/registro.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == 0){

				$("label[for='correoR'] span").html('<p>Este correo ya existe en la base de datos</p>');

				correoExistente = true;
			}

			else{

				$("label[for='correoR'] span").html("");

				correoExistente = false;

			}
		
		}

	});

});

/*=====  FIN VALIDAR USUARIO EXISTENTE AJAX  ======*/

/*=============================================
VALIDAR REGISTRO
=============================================*/
function validarRegistro(){

	var nombre = $("#nombreRegistro").val();

	var apellido = $("#apellidoRegistro").val();

	var usuario = $("#usuarioRegistro").val();

	var password = $("#passwordRegistro").val();

	var email = $("#correoRegistro").val();

	var cedula = $("#cedulaRegistro").val();

	var respuesta = $("#rRegistro").val();

	/* VALIDAR NOMBRE */
		console.log('correo', correoExistente, Date.now());
		if(correoExistente){

			document.querySelector("label[for='correoR'] span").innerHTML = "<p>Este email ya existe en la base de datos</p>";

			return false;
		}

	if(nombre != ""){

		var caracteres = nombre.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 10){

			document.querySelector("label[for='nombreR'] span").innerHTML += "<br>Escriba por favor menos de 10 caracteres.";

			return false;
		}

		if(!expresion.test(nombre)){

			document.querySelector("label[for='nombreR'] span").innerHTML += "<br>No escriba caracteres especiales.";

			return false;

		}

		if(usuarioExistente){

			document.querySelector("label[for='usuarioR'] span").innerHTML = "<p>Este usuario ya existe en la base de datos</p>";

			return false;
		}

	}

	/*VALIDAR APELLIDO*/

	if (apellido != ""){

		var caracteres = apellido.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 10){
			document.querySelector("label[for='apellidoR'] span").innerHTML += "<br> Escribe por favor menos de 10 caracteres";
			return false;
		}

		if(!expresion.test(apellido)){
			document.querySelector("label[for='apellidoR'] span").innerHTML += "<br> No escriba caracteres especiales";
			return false;
		}
	}

	/*VALIDAR USUARIO*/

	if(usuario != ""){

		var caracteres = usuario.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 10){
			document.querySelector("label[for='usuarioR'] span").innerHTML += "<br> Escriba por favor menos de 10 caracteres";
			return false;
		}

		if(!expresion.test(usuario)){
			document.querySelector("label[for='usuarioR'] span").innerHTML += "<br> No escriba caracteres especiales";
			return false;
		}
	}
	/* VALIDAR EMAIL*/

	if(email != ""){

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expresion.test(email)){

			document.querySelector("label[for='emailRegistro'] span").innerHTML += "<br>Escriba correctamente el Email.";

			return false;

		}

	}

	/*VALIDAR CEDULA*/

	if(cedula != ""){

		var caracteres = cedula.length;
		var expresion = /^[0-9]*$/;

		if(caracteres > 8){
			document.querySelector("label[for='cedulaR'] span").innerHTML += "<br> Longitud minima de 8 caracteres";
			return false;
		}
 span
		if(!expresion.test(cedula)){
			document.querySelector("label[for='cedulaR'] span").innerHTML += "<br> Escriba solo numeros por favor";
			return false;
		}
	}

	/* VALIDAR PASSWORD */

	if(password != ""){

		var caracteres = password.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres < 6){

			document.querySelector("label[for='passwordR'] span").innerHTML += "<br>Escriba por favor más de 6 caracteres.";

			return false;
		}

		if(!expresion.test(password)){

			document.querySelector("label[for='passwordR'] span").innerHTML += "<br>No escriba caracteres especiales.";

			return false;

		}

	}

	console.log('respuesta', respuesta);

	if(respuesta != ""){
		var caracteres = respuesta.length;
		var expresion = /^[a-zA-Z0-9]*$/;

		if(caracteres > 10){
			document.querySelector("label[for='respuestaR']").innerHTML += "<br> No escriba mas de 10 caracteres";
			return false;
		}

		if(!expresion.test(respuesta)){
			document.querySelector("label[for='respuestaR']").innerHTML += "<br> No escriba caracteres especiales";
			return false;
		}
	}
	
return true;

}