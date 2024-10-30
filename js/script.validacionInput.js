/* 
Por Daniel Ariza
Fecha 18/03/2013
versión 1
Los input tienen que tener data-obligatorio="si" para que valide campo a campo
Los form tienen que tener data-validacion="si" para que valide al enviar
Pongo directamente los id y las clases por que hay hasta 4 formulario dentro de una misma página
*/
jQuery(document).ready(function() {

	// Validaciones campo por campo
	console.log("El script de validación ha cargado correctamente");

	var inputText = jQuery("input[type='text']");
	var inputPasswd = jQuery("input[type='password']");
	var inputTextarea = jQuery("textarea");

	validacionCampos(inputText);
	validacionCampos(inputPasswd);
	validacionCampos(inputTextarea);

	// Enviar Formlario

	// clientes
	var formUpdateCliente = jQuery("form.cookies_pro_wrap");
   	var valClientes = new enviarSubmit(formUpdateCliente);

   	jQuery('.success').hide();

});

function validacionCampos(inputTexto) {

	this.inputTexto = inputTexto;

	inputTexto.each(function() {

		// Entra en el campo obligatorio

		inputTexto.focus(function() {

			// Validaciones
			
			if(jQuery(this).data("obligatorio") == "si") {

				if(jQuery(this).val() == "" ) {

					jQuery(this).val("");
					//jQuery(this).attr("placeholder", "Campo obligatorio");
					jQuery(this).css("border", "1px solid #B94A48");
					jQuery(this).next(".warning").show();

				} else {

					jQuery(this).css("border", "1px solid #a9dc3a");
					jQuery(this).next(".warning").hide();

				}

			} else {

				// console.log("No vale");
			}

		}); 

		// Sale de campo obligatorio

		inputTexto.blur(function() {

			if(jQuery(this).data("obligatorio") == "si") {

				if(jQuery(this).val() == "" ) {

					jQuery(this).val("");
					//jQuery(this).attr("placeholder", "Campo obligatorio");
					jQuery(this).css("border", "1px solid #B94A48");
					jQuery(this).next(".warning").show();

				} else {

					jQuery(this).css("border", "1px solid #a9dc3a");
					jQuery(this).next(".warning").hide();

				}

			} else {

				// console.log("No vale");
			}

		}); 


	});
}

function enviarSubmit(misFormularios) {

	this.misFormularios = misFormularios;

	misFormularios.submit(function(event) {

		console.log(misFormularios);

		// event.preventDefault();

		function customForm() {

			var validaformulario;
			var inputForm = jQuery(misFormularios).find("input, textarea, select");

			jQuery(inputForm).each(function() {

				if( jQuery(this).data("obligatorio") == "si" && jQuery(this).val() == "" ) {

					jQuery(this).val("");
					jQuery(this).attr("placeholder", "Campo obligatorio");
					jQuery(this).css("border", "1px solid #B94A48");
					jQuery(this).next(".warning").show();
					return validaformulario = "false";

				}
			});
			
			return validaformulario;
		}

		if(customForm() == "false") {
			return false;
		} else {
			return true;
		}

	});

}	