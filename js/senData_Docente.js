/* Obtenemos el Id del cuestionario en la URL 
*  Si encuentra el Id lo retorna
*  Si no lo encuenrtra retorna -1 */
            function getId() {
                var paramstr = window.location.search.substr(1);
				var paramarr = paramstr.split("&");
				var params = {};
				for (var i = 0; i < paramarr.length; i++) {
					var tmparr = paramarr[i].split("=");
					params[tmparr[0]] = tmparr[1];
				}
				if (params['n']) {
					return params['n'];
				} else {
					return -1;
				}				
            }

			/* Accedemos al boton guardar y le asignamos el evento click */
			document.getElementById("guardarBtn").addEventListener("click", guardarCuestionario);
			/* Le asignamos la fincion al dar click */
			function guardarCuestionario() {
				/* Mandamos las respuestas obtenidas de los input text */
				getInput_Questions();
				/* Mandamos las respuestas obtenidas de los radio button */
				getSelect_Questions();
				/* Mandamos las respuestas obtenidas de los select */
				getRadio_Questions();
				/* Mandamos las respuestas obtenidas de los check box */
				getCheckBox_Questions();
				/* Notificamos la operacion al usuario */
				notify();
			}

			/* Funciones para obtener y mandar los datos del formulario */
			function getInput_Questions() {
				var txtRespuesta = document.querySelectorAll('[name="respuestaInputText"]');
				for (var i = 0; i < txtRespuesta.length; i++) {
					/* Verificamos que el Id del cuestionario sea valido */
					if (getId() > 0) {
						/* Obtenemos los datos */
						var cuestionarioId = getId();
						var id = txtRespuesta[i].id;
						var respuesta = txtRespuesta[i].value;
                        if(respuesta != ""){
                            /* Mandamos los datos al servidor */
						    $.ajax({
							    type: "POST",
							    url: "insertions_docente/insertInputText.php",
							    data: {
								    id_cuestionario: cuestionarioId,
								    id_Pregunta: id,
								    respuesta: respuesta,
							    }
						    });
                        }
					}
				}
			}

			function getSelect_Questions() {
				var selectRespuesta = document.querySelectorAll('[name="respuestaSelect"]');
				for (var i = 0; i < selectRespuesta.length; i++) {
					var cuestionarioId = getId();
					var id = selectRespuesta[i].id;
					var respuesta = selectRespuesta[i].options[selectRespuesta[i].selectedIndex].text;
					/* Mandamos los datos al servidor */
					$.ajax({
						type: "POST",
						url: "insertions_docente/insertSelect.php",
						data: {
							id_cuestionario: cuestionarioId,
							id_Pregunta: id,
							respuesta: respuesta,
						}
					});
				}
			}

			function getRadio_Questions() {
				var radioButton = document.querySelectorAll('[name="radioForm"]');
				for (var i = 0; i < radioButton.length; i++) {
					if(radioButton[i].checked){
						var cuestionarioId = getId();
						var id = radioButton[i].id;
						var respuesta = radioButton[i].value;
						/* Mandamos los datos al servidor */
						$.ajax({
							type: "POST",
							url: "insertions_docente/insertRadio.php",
							data: {
								id_cuestionario: cuestionarioId,
								id_Pregunta: id,
								respuesta: respuesta,
							}
						});
					}
				}
			}

			function getCheckBox_Questions() {
				var checkboxList = document.querySelectorAll('[name="CheckForm"]');
				for (var i = 0; i < checkboxList.length; i++) {
					if(checkboxList[i].checked){
						var cuestionarioId = getId();
						var id = checkboxList[i].id;
						var respuesta = checkboxList[i].value;
						/* Mandamos los datos al servidor */
						$.ajax({
							type: "POST",
							url: "insertions_docente/insertCheckBox.php",
							data: {
								id_cuestionario: cuestionarioId,
								id_Pregunta: id,
								respuesta: respuesta,
							}
						});
					}
				}
			}

			function notify() {
				Swal.fire({
					icon: 'success',
					title: 'Datos guardados correctamente',
					showCancelButton: false,
					confirmButtonText: 'Ok'
				});
			}
 			