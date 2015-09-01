// Procesar formulario para ver si ya se paso del exceso
$(document).ready(function() {	
	$('#numero1').focusout( function(){
		if($('#numero1').val()!= ""){
			$.ajax({
				type: "POST",
				url: "exceso.php",
				data: "numero1="+$('#numero1').val(),
				beforeSend: function(){
				  $('#msgUsuario').html('<i class="fa fa-spinner fa-pulse"></i> verificando');
				},
				success: function( respuesta ){
				  if(respuesta == '2')
					$('#msgUsuario').html("<i class='fa fa-lock' style='color:#dd4814'></i> <label class='text-primary'> N&uacute;mero Bloquedo</label>");
				  else if(respuesta == '1')
					$('#msgUsuario').html("<i class='fa fa-check-circle' style='color:green'></i> <label class='text-success'> Disponible</label>");
				  else
					$('#msgUsuario').html("<i class='fa fa-times' style='color:#b94a48'></i> <label class='text-danger'>Exceso</label>");
				}
			});
		}
	});             
});

// Procesar formulario para ver si ya se paso del exceso
$(document).ready(function() {	
	$('#numero2').focusout( function(){
		if($('#numero2').val()!= ""){
			$.ajax({
				type: "POST",
				url: "exceso.php",
				data: "numero2="+$('#numero2').val(),
				beforeSend: function(){
				  $('#msgUsuario2').html('<i class="fa fa-spinner fa-pulse"></i> verificando');
				},
				success: function( respuesta ){
				  if(respuesta == '2')
					$('#msgUsuario2').html("<i class='fa fa-lock' style='color:#dd4814'></i> <label class='text-primary'> N&uacute;mero Bloquedo</label>");
				  else if(respuesta == '1')
					$('#msgUsuario2').html("<i class='fa fa-check-circle' style='color:green'></i> <label class='text-success'> Disponible</label>");
				  else
					$('#msgUsuario2').html("<i class='fa fa-times' style='color:#b94a48'></i> <label class='text-danger'>Exceso</label>");
				}
			});
		}
	});             
});

// Procesar formulario para ver si ya se paso del exceso
$(document).ready(function() {	
	$('#numero3').focusout( function(){
		if($('#numero3').val()!= ""){
			$.ajax({
				type: "POST",
				url: "exceso.php",
				data: "numero3="+$('#numero3').val(),
				beforeSend: function(){
				  $('#msgUsuario3').html('<i class="fa fa-spinner fa-pulse"></i> verificando');
				},
				success: function( respuesta ){
				  if(respuesta == '2')
					$('#msgUsuario3').html("<i class='fa fa-lock' style='color:#dd4814'></i> <label class='text-primary'> N&uacute;mero Bloquedo</label>");
				  else if(respuesta == '1')
					$('#msgUsuario3').html("<i class='fa fa-check-circle' style='color:green'></i> <label class='text-success'> Disponible</label>");
				  else
					$('#msgUsuario3').html("<i class='fa fa-times' style='color:#b94a48'></i> <label class='text-danger'>Exceso</label>");
				}
			});
		}
	});             
});

// Procesar formulario para ver si ya se paso del exceso
$(document).ready(function() {	
	$('#numero4').focusout( function(){
		if($('#numero4').val()!= ""){
			$.ajax({
				type: "POST",
				url: "exceso.php",
				data: "numero4="+$('#numero4').val(),
				beforeSend: function(){
				  $('#msgUsuario4').html('<i class="fa fa-spinner fa-pulse"></i> verificando');
				},
				success: function( respuesta ){
				  if(respuesta == '2')
					$('#msgUsuario4').html("<i class='fa fa-lock' style='color:#dd4814'></i> <label class='text-primary'> N&uacute;mero Bloquedo</label>");
				  else if(respuesta == '1')
					$('#msgUsuario4').html("<i class='fa fa-check-circle' style='color:green'></i> <label class='text-success'> Disponible</label>");
				  else
					$('#msgUsuario4').html("<i class='fa fa-times' style='color:#b94a48'></i> <label class='text-danger'>Exceso</label>");
				}
			});
		}
	});             
});

// Procesar formulario para ver si ya se paso del exceso
$(document).ready(function() {	
	$('#numero5').focusout( function(){
		if($('#numero5').val()!= ""){
			$.ajax({
				type: "POST",
				url: "exceso.php",
				data: "numero5="+$('#numero5').val(),
				beforeSend: function(){
				  $('#msgUsuario5').html('<i class="fa fa-spinner fa-pulse"></i> verificando');
				},
				success: function( respuesta ){
				  if(respuesta == '2')
					$('#msgUsuario5').html("<i class='fa fa-lock' style='color:#dd4814'></i> <label class='text-primary'> N&uacute;mero Bloquedo</label>");
				  else if(respuesta == '1')
					$('#msgUsuario5').html("<i class='fa fa-check-circle' style='color:green'></i> <label class='text-success'> Disponible</label>");
				  else
					$('#msgUsuario5').html("<i class='fa fa-times' style='color:#b94a48'></i> <label class='text-danger'>Exceso</label>");
				}
			});
		}
	});             
});
