/*//---------------------------------------------Viene la parte del calendario---------------------------------------------

// Poner el calendario en español
$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '< Ant',
	nextText: 'Sig >',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	weekHeader: 'Sm',
	dateFormat: 'dd/MM/yy',
	//firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};

$.datepicker.setDefaults($.datepicker.regional['es']);  //definimos los datos regionales en español

/*$(function(){
	$("#fecha_mes").focus(function () {
        //$(".ui-datepicker-calendar").show();
    });
	
	$("#fecha_elegida").datepicker({
		//yearRange: "-100:+0", // last hundred years
		todayHighLight: true,
		maxDate: 0,
		daysOfWeekHighlighted: "0,6",
		showButtonPanel: true
	});
	
	
});*/
/*
$(function(){ $("#fecha_mes").datepicker({
		maxDate: 0,
		changeMonth: true,
		changeYear: true,
		dateFormat: 'MM/yy',
		currentText: "Mes actual",
		showButtonPanel: true,
		onClose: function(dateText, inst) {
			//$(this).datepicker('hide');
			$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
		}
	});
	$("#fecha_mes").focus(function () {
        $(".ui-datepicker-calendar").hide();
    });
});
*/
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

//Función para desaparecer los botones al pulsarlos una sola vez
function ocultarBoton( idSubmit, idText ){
	var submit = document.getElementById( idSubmit );
	var text = document.getElementById( idText );
	
	var tagElemento = text.tagName;
	var tipoElemento = text.name;
	alert (tagElemento);
	alert (tipoElemento);
	alert ('Has pulsado el boton ' + text.value );
	
	if( text.value != "" ){
		submit.hidden = true;
	}
}

function ocultarBoton( idSubmit ){
	var submit = document.getElementById( idSubmit );
	
	//alert ('Has pulsado el boton ' + text.value );
	submit.hidden = true;
}

//Función para convertir las letras en mayúsculas
function ConvertirMayusculasSinEspacios(e){
	e.value = e.value.replace( / /g, "" );
	e.value = e.value.toUpperCase();
	
	var submit = document.getElementById( 'submit_index' );
	
	//Codigo para leer que clase de tecla se presiona obteniendo su codigo ASCII  Teo 240322
	var inpuText = document.getElementById( 'input_reg' );
	if( inpuText ){
		inpuText.addEventListener( 'keyup', function(e) {
			var keycode = e.keyCode || e.which;
			var count = 0;
			if (keycode == 13){
				count = count + 1;
				//alert ('Has pulsado super enter  ' + count );
				//e.preventDefault();
				submit.disabled = true;
				inpuText.disabled = true;
				submit.hidden = true;
			}
		});
	}
	//Codigo para desactivar el enter en todos los input text de un for y no mande nada   Teo 240322
	/*document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('input[type=text]').forEach( node => node.addEventListener('keypress', e => {
        if(e.keyCode == 13) {
          e.preventDefault();
        }
      }))
    });
	*/
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
	e.value = e.value.replace( / /g, "" );
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
			boton_alta.classList.add( "evento_alta_gris" );
			boton_alta.classList.remove( "evento_alta" );
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
			boton_alta.classList.add( "evento_alta" );
			boton_alta.classList.remove( "evento_alta_gris" );
		}
	}
}

function ValidarCURP( e, arr_matriculas ){
	e.value = e.value.replace( / /g, "" );
	e.value = e.value.toUpperCase();
	var curp = e.value;
	var len_matriculas = arr_matriculas.length;
	
	var boton_alta = document.getElementById( 'evento_alta' );
	var entrada = document.getElementById( 'curp' );
	var text_comment = document.getElementById( 'text_comment' );
	
	//alert( matricula );
	
	//alert( (e.charCode).String );
	
	if( curp == "" ){
		entrada.style.background = "none";
	}else{
		
		if( arr_matriculas.includes(curp) ){
			text_comment.innerHTML =  "El usuario  <strong>"+entrada.value+"</strong>  ya está dado de alta";
			text_comment.hidden = false;
			text_comment.className = "error";
			entrada.style.background = "url(images/invalid_19x19.png) no-repeat 98% center";
			boton_alta.disabled = true;
			boton_alta.classList.add( "evento_alta_gris" );
			boton_alta.classList.remove( "evento_alta" );
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
			boton_alta.classList.add( "evento_alta" );
			boton_alta.classList.remove( "evento_alta_gris" );
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

function nombre(fic) {
  fic = fic.split('\\');
  alert(fic[fic.length-1]);
}

function mantener_mes(fecha){
	document.getElementById( "fecha_mes" ).value = fecha;
}

/*<!-- ************************************** -->
<!-- FUNCION QUE USA EL BOTON QUE ABRE EL PDF -->
<!-- **************************************** -->*/
function validarCampoFecha(){
	var textFecha = document.getElementById( "fecha_mes" );
	var textFechaPDF = document.getElementById( "fecha_pdf" );
	var submitFechaPDF01 = document.getElementById( "evento_F01" );
	var submitFechaPDF02 = document.getElementById( "evento_F02" );
	var submitFechaPDF03 = document.getElementById( "evento_F03" );

	/*alert (""+textFecha.value);
	alert (""+textFecha);
	alert (""+textFecha.value.length);/*
	/*--------Codigo para imprimir texto adicional-----------------------------------*/
	var address1 = document.getElementById("fecha_mes");
	//address1.parentNode.innerHTML = address1.parentNode.innerHTML + "<p style='color:red'>No hay texto</p>";
	var Max_Length = 50;
	var length = document.getElementById("fecha_mes").value.length;
	if (length > Max_Length) {
		address1.parentNode.innerHTML = address1.parentNode.innerHTML + "<p style='color:red'>the max length of "+Max_Length + " characters is reached, you typed in  " + length + "characters</p>";
	}
	/*-------------------------------------------------------------------------*/
	if( textFecha.value == "" || textFecha == null || textFecha.value.length == 0 ){
		submitFechaPDF01.event.preventDefault();
		submitFechaPDF02.event.preventDefault();
		submitFechaPDF03.event.preventDefault();
		alert ("Selecciona una fecha");
		event.preventDefault();
		return false;
	}else{
		textFechaPDF.value = textFecha.value;
	}
}


function ValidarTextoVacio(){
	var textFecha = document.getElementById( "fecha_mes" );
	var submitFechaPDF01 = document.getElementById( "evento_F01" );
	var submitFechaPDF02 = document.getElementById( "evento_F02" );
	var submitFechaPDF02B = document.getElementById( "evento_F02B" );
	var submitFechaPDF03 = document.getElementById( "evento_F03" );
	if( textFecha.value == "" || textFecha == null || textFecha.value.length == 0 ){
		submitFechaPDF01.disabled = true;
		submitFechaPDF02.disabled = true;
		submitFechaPDF02B.disabled = true;
		submitFechaPDF03.disabled = true;
	}else{
		submitFechaPDF01.disabled = false;
		submitFechaPDF02.disabled = false;
		submitFechaPDF02B.disabled = false;
		submitFechaPDF03.disabled = false;
	}
}

function ponerPorcentaje( idObject, TotalParcial, TotalTabla){
	var text_comment = document.getElementById( idObject );
	
	var porcentajeParcial = (TotalParcial/TotalTabla)*100;
	text_comment.innerHTML =  ""+porcentajeParcial.toFixed(2)+"%";
}

//Función para verificar que un Checkbox fue seleccionado del form de servicio.php 051121 TeoOM 30/05/2023
function verificar_uno( event ){
	event.preventDefault(); // Evita el envío del formulario
	var alMenosUnoSeleccionado = false;
	var opcionOtroVacia = false;
	var checks = document.querySelectorAll( '.table_design input[type="checkbox"]' );
	var SubmitBoton = document.getElementById( 'submit_servicio' );
	
	//alert (''+checks.length);
	
	//Primero evaluaremos que si una de los opciones marcadas no sea la opción 'Otro' 31/05/2023 TeoOM
	for (var i = 0; i < checks.length; i++){
		if(checks[i].checked){
			if( checks[i].value == 'Otro' ){
				var text = document.getElementById( 'input_otro' );
				if( text.value == '' ){
					opcionOtroVacia = true;
					break;
				}else{
					checks[i].value = 'Otro_'+text.value;
				}
			}
		}
	}
	
	//Si la opción de otro no es marcada seguimos con evaluar si al menos una fue marcada
	if( !opcionOtroVacia ){
	for (var i = 0; i < checks.length; i++){
			if(checks[i].checked){
				SubmitBoton.hidden = true;
				alMenosUnoSeleccionado = true;
				break;
			}
		}
	}
	
	if( opcionOtroVacia ){
		alert('Escribe el otro servicio que vienes a visitar');
	}else if(!alMenosUnoSeleccionado){
		alert('Debes seleccionar al menos un servicio');
	}else{
		event.target.submit(); // Envía el formulario si la validación es exitosa
	}
}

//Creación del evento, se liga a un form y a la función verificar_uno
document.addEventListener( 'DOMContentLoaded', function(){
	var form = document.getElementById('form_serv');
	if( form ){
		form.addEventListener( 'submit', function(event) {
			verificar_uno(event);
        });
	}
});

//Función para activar el textbox de la opción "Otro" en servicios
function activarText( idText, idCheck ){
	var text = document.getElementById( idText );
	var check = document.getElementById( idCheck );
	
	//alert ('Se activo el evento');
	
	if( check.checked ){
		text.disabled = false;
	}else{
		text.disabled = true;
	}
}

function validarNumero(event) {
	if(event.charCode >= 48 && event.charCode <= 57){
		return true;
	}
		return false;   
}

//Función para ejecutar scripts una vez cargado la pagina y sus elementos DOM   Teo 280923
document.addEventListener("DOMContentLoaded", function() {
	//alert ('Pagina cargada');
	var internoRadio = document.getElementById('internoRadio');
	var externoRadio = document.getElementById('externoRadio');
	var internoDiv = document.getElementById('OpcInterna');
	var externoDiv = document.getElementById('OpcExterna');
	var selectInterno = document.getElementById('uni_aca_guia');
	var textExterno = document.getElementById('input_dep');
	if( internoDiv )
		internoDiv.hidden = true;
	if( externoDiv )
		externoDiv.hidden = true;

	if( internoRadio ){
		internoRadio.addEventListener('change', function () {
			if (internoRadio.checked) {
			//internoDiv.style.display = "block";
			//externoDiv.style.display = "none";
			internoDiv.hidden = false;
			selectInterno.required = true;
			externoDiv.hidden = true;
			textExterno.required = false;
		  }
		});
	}

	if( externoRadio ){
		externoRadio.addEventListener("change", function () {
		  if (externoRadio.checked) {
			//externoDiv.style.display = "block";
			//internoDiv.style.display = "none";
			internoDiv.hidden = true;
			selectInterno.required = false;
			externoDiv.hidden = false;
			textExterno.required = true;
		  }
		});
	}
	
	//-------Opciones para entrada y salida de externos Teo 071223
	var entradaRadio = document.getElementById('entradaRadio');
	var salidaRadio = document.getElementById('salidaRadio');
	var entradaDiv = document.getElementById('OpcEntrada');
	var salidaDiv = document.getElementById('OpcSalida');
	var textAreaSalida = document.getElementById('registro_ext');
	if( salidaDiv )
		salidaDiv.hidden = true;
	
	
	if( entradaRadio){
		entradaRadio.addEventListener('change', function () {
			if (entradaRadio.checked) {
				entradaDiv.style.display = 'flex';
				//entradaDiv.hidden = false;
				salidaDiv.hidden = true;
		  }
		});
	}
	
	if( salidaRadio ){
		salidaRadio.addEventListener("change", function () {
			if (salidaRadio.checked) {
				entradaDiv.style.display = 'none';
				//entradaDiv.hidden = true;
				salidaDiv.hidden = false;
				textAreaSalida.focus();
		  }
		});
	}
	
	//-------Opciones para entrada y salida del centro de computo Teo 210223
	//Menu entrada internos y externos
	var internoC_Radio = document.getElementById('internoComputo');
	var externoC_Radio = document.getElementById('externoComputo');
	var internoComputoDiv = document.getElementById('computoInterno');
	var externoComputoDiv = document.getElementById('computoExterno');
	var NumberAreaMatricula = document.getElementById('compu_matricula');
	var txtAreaNombre = document.getElementById('compu_nombre');
	
	if( externoComputoDiv )
		externoComputoDiv.hidden = true;
	
	if( internoC_Radio ){
		internoC_Radio.addEventListener('change', function () {
			if (internoC_Radio.checked) {
				//entrada_Div.style.display = 'flex';
				internoComputoDiv.hidden = false;
				externoComputoDiv.hidden = true;
				NumberAreaMatricula.focus();
		  }
		});
	}
	
	if( externoC_Radio ){
		externoC_Radio.addEventListener("change", function () {
			if (externoC_Radio.checked) {
				//entrada_Div.style.display = 'none';
				internoComputoDiv.hidden = true;
				externoComputoDiv.hidden = false;
				txtAreaNombre.focus();
		  }
		});
	}

	//Area de Impresiones
	var Si_Radio = document.getElementById('SiRadio');
	var No_Radio = document.getElementById('NoRadio');
	var impresion_Div = document.getElementById('Opc_SiImpresion');
	var NumberAreaImpresiones = document.getElementById('num_impresiones');
	if( impresion_Div )
		impresion_Div.hidden = true;
	
	if( Si_Radio ){
		Si_Radio.addEventListener('change', function () {
			if (Si_Radio.checked) {
				//entrada_Div.style.display = 'flex';
				impresion_Div.hidden = false;
				NumberAreaImpresiones.focus();
		  }
		});
	}
	
	if( No_Radio ){
		No_Radio.addEventListener("change", function () {
			if (No_Radio.checked) {
				//entrada_Div.style.display = 'none';
				impresion_Div.hidden = true;
		  }
		});
	}
})


function revisarFormulario(idFormulario, idBotonEnviar){
	var formulario = document.getElementById(idFormulario);
	// Obtenemos todos los elementos del formulario
    var elementos = formulario.elements;
    var formularioValido = true;
	
	if( document.getElementById('internoRadio') !== null )
		var internoRadio = document.getElementById('internoRadio');
	if( document.getElementById('externoRadio') !== null )
		var externoRadio = document.getElementById('externoRadio');
	if( document.getElementById("OpcInterna") !== null )
		var divInterno = document.getElementById("OpcInterna"); 
	if( document.getElementById("OpcExterna") !== null )
		var divExterno = document.getElementById("OpcExterna");
	
    for (var i = 0; i < elementos.length; i++) {
        var elemento = elementos[i];
		
		var tagElemento = elemento.tagName;
		var tipoElemento = elemento.name;
		
		/*if ( divInterno && divInterno.contains(elemento)) {
			alert ('Este elemento está en el div para internos')
		}
		
		if ( divExterno && divExterno.contains(elemento)) {
			alert ('Este elemento está en el div para externos')
		}*/
		
        // Validamos solo los elementos que requieran validación
        if (elemento.hasAttribute("required")) {
            if (elemento.type === "text" || elemento.type === "textarea" || elemento.type === "number") {
				if ( divInterno &&divInterno.contains(elemento) && internoRadio.checked){
					alert ('Debería de revisarlo en interno');
				}else if( divExterno && divExterno.contains(elemento) && externoRadio.checked){
					if (elemento.value.trim() === "") {
						alert("Por favor, defina el instituto o ciudad de dónde nos visita.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}else if( divInterno && divInterno.contains(elemento) && !internoRadio.checked){
					alert ('No se revisa y se brinca el elemento en div interno');
				}else if( divExterno && divExterno.contains(elemento) && !externoRadio.checked){
					alert ('No se revisa y se brinca el elemento en div externo');
				}else{
					// Para campos de texto y áreas de texto
					if (elemento.value.trim() === "") {
						alert("Por favor, complete todos los campos obligatorios.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}
            } else if (elemento.type === "select-one") {
				/*alert (tagElemento);
				alert (tipoElemento);*/
				elemento.required = true;
				if ( divInterno && divInterno.contains(elemento) && internoRadio.checked){
					// Para elementos select (opciones únicas)
					if (elemento.selectedIndex === 0) {
						alert("Por favor, seleccione una opción válida en la Unidad Acádemica.");
						formularioValido = false;
						break; // Detenemos la validación en el primer select sin opción seleccionada
					}
				}else if( divExterno && divExterno.contains(elemento) && externoRadio.checked){
					alert ('Debería de revisar este select en externo');
				}else if( divInterno && divInterno.contains(elemento) && !internoRadio.checked){
					alert ('No se revisa y se brinca el elemento en div interno');
				}else if( divExterno && divExterno.contains(elemento) && !externoRadio.checked){
					alert ('No se revisa y se brinca el elemento en div externo');
				}else{
					// Para elementos select (opciones únicas)
					if (elemento.selectedIndex === 0) {
						alert("Por favor, seleccione una opción válida.");
						formularioValido = false;
						break; // Detenemos la validación en el primer select sin opción seleccionada
					}
				}
            } else if (elemento.type === "radio") {
				elemento.required = true;
				if ( divInterno && divInterno.contains(elemento) && internoRadio.checked){
					alert ('Debería de revisarlo en interno');
				}else if( divExterno && divExterno.contains(elemento) && externoRadio.checked){
					alert ('Debería de revisarlo en externo');
				}else if( divInterno && divInterno.contains(elemento) && !internoRadio.checked){
					alert ('No se revisa y se brinca el elemento en div interno');
				}else if( divExterno && divExterno.contains(elemento) && !externoRadio.checked){
					alert ('No se revisa y se brinca el elemento en div externo');
				}else{
					// Para radio buttons
					var nombreRadio = elemento.name;
					var radios = formulario.querySelectorAll('input[name="' + nombreRadio + '"]:checked');
					if (radios.length === 0) {
						alert("Por favor, seleccione una opción válida.");
						formularioValido = false;
						break; // Detenemos la validación en el primer grupo de radio buttons sin opción seleccionada
					}
				}
            }
        }
    }

    if (formularioValido) {
        // Aquí puedes agregar código para enviar el formulario si es válido
		document.getElementById(idBotonEnviar).style.display = "none";
        formulario.submit();
    }
}

function esVisible(elemento) {
    // Verifica si un elemento es visible en la página
    return elemento.offsetWidth > 0 && elemento.offsetHeight > 0;
}

function revisarFormularioGeneral(idFormulario, idBotonEnviar){
	var formulario = document.getElementById(idFormulario);
	// Obtenemos todos los elementos del formulario
    var elementos = formulario.elements;
    var formularioValido = true;
	
	if( document.getElementById('entradaRadio') !== null )
		var entradaRadio = document.getElementById('entradaRadio');
	if( document.getElementById('salidaRadio') !== null )
		var salidaRadio = document.getElementById('salidaRadio');
	if( document.getElementById("OpcEntrada") !== null )
		var divEntrada = document.getElementById("OpcEntrada"); 
	if( document.getElementById("OpcSalida") !== null )
		var divSalida = document.getElementById("OpcSalida");
	
    for (var i = 0; i < elementos.length; i++) {
        var elemento = elementos[i];
		
		var tagElemento = elemento.tagName;
		var tipoElemento = elemento.name;
		
		
		/*if ( divEntrada && divEntrada.contains(elemento)) {
			alert ('Este elemento está en el div para internos');
		}
		
		if ( divSalida && divSalida.contains(elemento)) {
			alert ('Este elemento está en el div para externos');
		}*/
		
        // Validamos solo los elementos que requieran validación
        if (elemento.hasAttribute("required")) {
			//alert (tagElemento);
			//alert (tipoElemento);
            if (elemento.type === "text" || elemento.type === "textarea"){
				if ( divEntrada && divEntrada.contains(elemento) && entradaRadio.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, llene el campo de texto de manera correcta");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}else if( divSalida && divSalida.contains(elemento) && salidaRadio.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, defina el instituto o ciudad de dónde nos visita.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}else if( divEntrada && divEntrada.contains(elemento) && !entradaRadio.checked){
					//alert ('No se revisa y se brinca el elemento en div entrada');
				}else if( divSalida && divSalida.contains(elemento) && !salidaRadio.checked){
					//alert ('No se revisa y se brinca el elemento en div salida');
				}else{
					// Para campos de texto y áreas de texto
					if (elemento.value.trim() === "") {
						alert("Por favor, complete todos los campos obligatorios.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}
            }else if ( elemento.type === "number") {
				if ( divEntrada && divEntrada.contains(elemento) && entradaRadio.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, llene el campo de texto de manera correcta");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}else if( divSalida && divSalida.contains(elemento) && salidaRadio.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, por el número de manera correcta.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}else if( divEntrada && divEntrada.contains(elemento) && !entradaRadio.checked){
					//alert ('No se revisa y se brinca el elemento en div entrada');
				}else if( divSalida && divSalida.contains(elemento) && !salidaRadio.checked){
					//alert ('No se revisa y se brinca el elemento en div salida');
				}else{
					// Para campos de texto y áreas de texto
					if (elemento.value.trim() === "") {
						alert("Por favor, complete todos los campos obligatorios.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}
			}else if (elemento.type === "select-one") {
				/*alert (tagElemento);
				alert (tipoElemento);*/
				elemento.required = true;
				if ( divEntrada && divEntrada.contains(elemento) && entradaRadio.checked){
					// Para elementos select (opciones únicas)
					if (elemento.selectedIndex === 0) {
						alert("Por favor, seleccione una opción válida en la Unidad Acádemica.");
						formularioValido = false;
						break; // Detenemos la validación en el primer select sin opción seleccionada
					}
				}else if( divSalida && divSalida.contains(elemento) && salidaRadio.checked){
					alert ('Debería de revisar este select en  externo');
				}else if( divEntrada && divEntrada.contains(elemento) && !entradaRadio.checked){
					alert ('No se revisa y se brinca el elemento en div interno');
				}else if( divSalida && divSalida.contains(elemento) && !salidaRadio.checked){
					alert ('No se revisa y se brinca el elemento en div externo');
				}else{
					// Para elementos select (opciones únicas)
					if (elemento.selectedIndex === 0) {
						alert("Por favor, seleccione una opción válida.");
						formularioValido = false;
						break; // Detenemos la validación en el primer select sin opción seleccionada
					}
				}
            } else if (elemento.type === "radio") {
				elemento.required = true;
				if ( divEntrada && divEntrada.contains(elemento) && entradaRadio.checked){
					alert ('Debería de revisarlo en interno');
				}else if( divSalida && divSalida.contains(elemento) && salidaRadio.checked){
					alert ('Debería de revisarlo en externo');
				}else if( divEntrada && divEntrada.contains(elemento) && !entradaRadio.checked){
					alert ('No se revisa y se brinca el elemento en div interno');
				}else if( divSalida && divSalida.contains(elemento) && !salidaRadio.checked){
					alert ('No se revisa y se brinca el elemento en div externo');
				}else{
					// Para radio buttons
					var nombreRadio = elemento.name;
					var radios = formulario.querySelectorAll('input[name="' + nombreRadio + '"]:checked');
					if (radios.length === 0) {
						alert("Por favor, seleccione una opción válida.");
						formularioValido = false;
						break; // Detenemos la validación en el primer grupo de radio buttons sin opción seleccionada
					}
				}
            }
        }
    }

    if (formularioValido) {
        // Aquí puedes agregar código para enviar el formulario si es válido
		document.getElementById(idBotonEnviar).style.display = "none";
        formulario.submit();
    }
}

function revisarFormularioComputo(idFormulario, idBotonEnviar){
	var formulario = document.getElementById(idFormulario);
	// Obtenemos todos los elementos del formulario
    var elementos = formulario.elements;
    var formularioValido = true;
	
	//Menu Interno externo
	if( document.getElementById('internoComputo') !== null )
		var internoRadioComputo = document.getElementById('internoComputo');
	if( document.getElementById('externoComputo') !== null )
		var externoRadioComputo = document.getElementById('externoComputo');
	if( document.getElementById("computoInterno") !== null )
		var internoDivComputo = document.getElementById("computoInterno");
	if( document.getElementById("computoExterno") !== null )
		var externoDivComputo = document.getElementById("computoExterno");

	
	//Menu impresiones
	if( document.getElementById('SiRadio') !== null )
		var SiImpresion = document.getElementById('SiRadio');
	if( document.getElementById('NoRadio') !== null )
		var NoImpresion = document.getElementById('NoRadio');
	if( document.getElementById("Opc_SiImpresion") !== null )
		var divSiImpresion = document.getElementById("Opc_SiImpresion"); 
	
    for (var i = 0; i < elementos.length; i++) {
        var elemento = elementos[i];
		
		var tagElemento = elemento.tagName;
		var tipoElemento = elemento.name;
		
        // Validamos solo los elementos que requieran validación
        if (elemento.hasAttribute("required")) {
			//alert (tagElemento);
			//alert (tipoElemento);
			if (elemento.type === "text" || elemento.type === "textarea"){
				if( externoDivComputo && externoDivComputo.contains(elemento) && externoRadioComputo.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, llena el área con tu nombre completo.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}
			}else if ( elemento.type === "number") {
				if ( divSiImpresion && divSiImpresion.contains(elemento) && SiImpresion.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, introduzca la cantidad.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}else if ( internoDivComputo && internoDivComputo.contains(elemento) && internoRadioComputo.checked ){
					if (elemento.value.trim() === "") {
						alert("Por favor, introduce tu matricula.");
						formularioValido = false;
						break; // Detenemos la validación en el primer campo vacío
					}
				}
			}
        }
    }

    if (formularioValido) {
        // Aquí puedes agregar código para enviar el formulario si es válido
		document.getElementById(idBotonEnviar).style.display = "none";
        formulario.submit();
    }
}