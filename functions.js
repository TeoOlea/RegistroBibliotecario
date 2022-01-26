//Función para deshabilitar el required de alguna opción
function NoValidarRequired(){
	
	formulario = document.getElementById( 'contact_form' );
	if( formulario ){
		//alert ("Validado y Presiono cancelar");
		formulario.noValidate = true;
	}
}

//Función para habilitar el required de alguna opción
function ValidarRequired(){
	//alert ("Presiono alta");
	formulario = document.getElementById( 'contact_form' );
	if( formulario ){
		formulario.noValidate = false;
	}
}

//Función para convertir las letras en mayúsculas
function ConvertirMayusculas(e){
	e.value = e.value.toUpperCase();
}

/*var texto = document.getElementById('nombre');
texto.addEventListener('keydown', function(keyboardEvent) {
    let tecla = keyboardEvent.key;
    
    //Validamos que no sea "Dead", "Shift", "Control", etc.
    if (tecla.length == 1){
        let code = tecla.charCodeAt(0); //Obtenemos el código ASCII
        alert('Tecla '+tecla+' Código '+code);
    }
});
*/
//Función para convertir las letras en mayúsculas
/*function ConvertirMayusculasYLetras(e){
	
	const pattern = new RegExp('[A-Za-zÁÉÍÓÚÑáéíóúñ ]+$');
	
	//var code = (e.which) ? e.which : e.keyCode;
	//code = String.fromCharCode( e.charCode ).charCodeAt(0);
	let code = e.key;
	
	alert (""+code);
	
	if (code.length == 1) {
		if( code > 47 || code < 58 ){
			return false;
			e.preventDefault();
		}else if( pattern.test( e.value ) ){
			e.value = e.value.toUpperCase();
			//alert ("verdadero");
		}else{
			return false;
			//alert (""+e.value);
			//e.value = "";
			//alert ("falso");
			//return false;
			e.preventDefault();
		}
	}
	var regex = new RegExp("^[a-zA-Z ]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
}-----------------------------------------------------------*/


//Función para comparar si una cadena esta dentro de un arreglo
function ValidarExistencia( e, arr_matriculas, arr_codigobarra){
	e.value = e.value.toUpperCase();
	var matricula = e.value;
	var len_matriculas = arr_matriculas.length;
	var len_codigobarras = arr_codigobarra.length;
	
	var boton_alta = document.getElementById( 'evento_alta' );
	var entrada = document.getElementById( 'matricula' );
	var text_comment = document.getElementById( 'text_comment' );
	
	//alert( matricula );

	if( matricula == "" ){
		entrada.style.background = "none";
	}else{
		
		if( arr_matriculas.includes(matricula) || arr_codigobarra.includes(matricula) ){
			text_comment.innerHTML =  "El usuario  <strong>"+entrada.value+"</strong>  ya está dado de alta";
			text_comment.hidden = false;
			text_comment.className = "error";
			entrada.style.background = "url(images/invalid_19x19.png) no-repeat 98% center";
			boton_alta.disabled = true;
			return false;
		}else{
			text_comment.className = "exito";
			text_comment.innerHTML =  "El usuario está disponible";
			text_comment.hidden = true;
			text_comment.style.background = "#ffa07a";
			entrada.style.background = "#fff url(images/adv.png) no-repeat 98% center";
			entrada.style.boxshadow = "0 0 5px #5cd053";
			entrada.style.bordercolor = "blue";
			boton_alta.disabled = false;
		}
	}
}

function ValidarCURP( e, arr_matriculas ){
	e.value = e.value.toUpperCase();
	var curp = e.value;
	var len_matriculas = arr_matriculas.length;
	
	var boton_alta = document.getElementById( 'evento_alta' );
	var entrada = document.getElementById( 'curp' );
	var text_comment = document.getElementById( 'text_comment' );
	
	//alert( matricula );

	if( curp == "" ){
		entrada.style.background = "none";
	}else{
		
		if( arr_matriculas.includes(curp) ){
			text_comment.innerHTML =  "El usuario  <strong>"+entrada.value+"</strong>  ya está dado de alta";
			text_comment.hidden = false;
			text_comment.className = "error";
			entrada.style.background = "url(images/invalid_19x19.png) no-repeat 98% center";
			boton_alta.disabled = true;
			return false;
		}else{
			text_comment.className = "exito";
			text_comment.innerHTML =  "El usuario está disponible";
			text_comment.hidden = true;
			text_comment.style.background = "#ffa07a";
			entrada.style.background = "#fff url(images/adv.png) no-repeat 98% center";
			entrada.style.boxshadow = "0 0 5px #5cd053";
			entrada.style.bordercolor = "blue";
			boton_alta.disabled = false;
		}
	}
}

//Función para verificar que la opcion onblur funciona
function ProbandoBlur(){
	alert( "Llama funcion" );
}

//Función para verificarque un Checkboxfue seleccionado del form de servicio.php 051121 TeoOM
/* Tiene un error
function verificar_uno(){
	var formularioCB = document.getElementById( 'formulario' );
	var al_menos_uno = false;
	
	for( var i = 0; i<formularioCB.choice[i].length; i++ ){
		if( formularioCB.choice[i].checked ){
			al_menos_uno = true;
			break;
		}
	}
	
	if( !al_menos_uno ){
		alert ("Disculpa, debes seleccionar al menos una opción");
		if( e.preventDefault ){
			e.preventDefault();
		}else{
			e.returnValue false;
		}
	}
}*/

function verificar_uno(){
	var suma = 0;
	var checks = document.getElementsByName('checkbox[]');
	for (var i = 0, j = checks.length; i < j; i++){
		if(checks[i].checked == true){
			suma++;
			break;
		}
	}
	if(suma == 0){
		alert('Debes seleccionar al menos un servicio');
		return false;
	}
}

function ObtenerNombre(){
	
	
}

function nombre(fic) {
  fic = fic.split('\\');
  alert(fic[fic.length-1]);
}