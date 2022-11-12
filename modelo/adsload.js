


function adsload() {

	

	$.ajax({
	
		url: '../controlador/adsload.php',
		success: function (response) {
			console.log(response);
            response = $.parseJSON(response);


			let text = '';
            
            if (response.length) {
                $.each(response, function (key, value) {
                    console.log(value.image_url);

                    
                    text += '<img src="../assets/uploads/'+ value.image_url +'"></img>';


                   

                });
                
            } else {
              
            }
         

			document.getElementById("ads").innerHTML = text;
			// Insert the HTML Template and display all employee records	
		}
	});


}




$(document).ready(function () {

	// Get all employee records
	adsload();


});
