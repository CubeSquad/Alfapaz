/* FORM WIZARD VALIDATION SIGN UP ======================================== */

$('form#custom').attr('action', 'quotation-wizard-send.php');

$(function() {
'use strict';
				$('#custom').stepy({
					backLabel:	'Paso anterior',
					block:		true,
					errorImage:	true,
					nextLabel:	'Siguiente paso',
					titleClick:	true,
					description:	true,
					legend:			false,
					validate:	true
				});


				$('#custom').validate({

					errorPlacement: function(error, element) {

					$('#custom .stepy-error').append(error);
					}, rules: {
						'location':		'required',
						'armored_door':	'required',
						'windows':		'required',
						'zones':		'required',
						'accesses[]':	'required',
						'budget':		'required',
						'firstname_quote':		'required',
						'lastname_quote':		'required',
						'email_quote':		'required',
						'phone_quote':	'required',
						'message_general':		'required',
						'terms':		'required' 	// BE CAREFUL: last has no comma
					}, messages: {
						'location':		{ required: 	 'La ubicación es necesaria' },
						'armored_door':	{ required: 	 'Completa el número de puertas' },
						'windows':		{ required: 	 'Completa el número de ventanas' },
						'zones':		{ required: 	 'Se requiere el número de áreas' },
						'accesses[]':	{ required: 	 'Esta información es necesaria' },
						'budget':		{ required: 	 'Esta información es necesaria' },
						'firstname_quote':		{ required: 	 'Necesitamos tu nombre' },
						'lastname_quote':		{ required: 	 'Necesitamos tu apellido' },
						'email_quote':		{ required: 	 'Necesitamos tu Email' },
						'phone_quote':	{ required:  'Necesitamos tu teléfono' },
						'message_general':		{ required:  'Necesitamos esta descripción' },
						'terms':		{ required:  'Por favor, acepta los términos y condiciones' },
					},
					submitHandler: function(form)
					{
					if($('input#website').val().length == 0)
					{
					form.submit();
					}
					}
				});

			});
