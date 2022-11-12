


 $(function() {
	$('#formC').click(function(e) {

		

		

			$.ajax({
				type: 'POST',
				url: '../controlador/compra.php',
			
				success: function(data) {
				
					let datos = $.parseJSON(data);

					$('#mostrar').html(datos.mensaje);


				},
			
			});


	





	});


});




