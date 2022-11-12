


function session() {

	$.ajax({
	
		url: '../controlador/session.php',
		success: function (response) {
			

			var data = $.parseJSON(response);

			let text = '';

			console.log(data.tipousuario)

			if (data.tipousuario == '1') {

				document.getElementById('ads').style.display = 'none';

			}
			
			if (data.tipousuario == '1' || data.tipousuario == '0' ){

				document.getElementById('reg2').style.display = 'none';
				
				text += '<li class="nav-item navhov">'+
				'<a class="nav-link">'+ data.email +'</a>'+
			  '</li>'+
			  '<li class="nav-item navhov">'+
				'<a class="nav-link" href="../users/logout.php?logout=true">Logout</a>'+
			 '</li>';
			  

			} else {

				document.getElementById('reg2').style.display = 'none';
				text += '<li class="nav-item navhov">'+
				  '<a class="nav-link" href="../users/login.html">Iniciar sesion</a>'+
				 '</li>'+
				 '<li class="nav-item navhov">'+
				   '<a class="nav-link" href="../sers/registration.html">Registrarse</a>'+
				    '</li>';

					
			}

			document.getElementById("registrado").innerHTML = text;
			// Insert the HTML Template and display all employee records	
		}
	});


}




$(document).ready(function () {

	// Get all employee records
	session();


});
