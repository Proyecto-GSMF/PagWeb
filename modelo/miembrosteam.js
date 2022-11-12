function miembrosteam() {

    $.ajax({
        type: "GET",
        url: '../../controlador/miembrosteam.php',
        success: function (response) {
            console.log(response);

            response = $.parseJSON(response);

            let num = document.querySelector('#numPlay');



            let x = num.valueAsNumber;

            console.log(x)

            let text = "";




            for (let i = 0; i < x; i++) {
                    var miembro = 'miembro'+i;
                    console.log(miembro);
                    

               text += '<select class="form-select mb-3" name="'+ miembro +'" aria-label="Default select example" required>';
                console.log(text);
                if (response.length) {
                    $.each(response, function (key, value) {

                        
                    text += '<option value="'+ value.idJugador +'">'+  value.nJugador +" "+ value.aJugador +'</option>';
                       

                    });
                    
                } else {
                  
                }

              text +=  '</select>';

            }
            // Insert the HTML Template and display all employee records

            document.getElementById("test").innerHTML = text;
        }
    });


}

function miembrosteam2() {

    $.ajax({
        type: "GET",
        url: '../../controlador/miembrosteam.php',
        success: function (response) {
            console.log(response);

            response = $.parseJSON(response);

            let num = document.querySelector('#numPlay2');



            let x = num.valueAsNumber;

            console.log(x)

            let text = "";




            for (let i = 0; i < x; i++) {
                    var miembro = 'miembro'+i;
                    console.log(miembro);
                    

               text += '<select class="form-select mb-3" name="'+ miembro +'" aria-label="Default select example" required>';
                console.log(text);
                if (response.length) {
                    $.each(response, function (key, value) {

                        
                    text += '<option value="'+ value.idJugador +'">'+  value.nJugador +" "+ value.aJugador +'</option>';
                       

                    });
                    
                } else {
                  
                }

              text +=  '</select>';

            }
            // Insert the HTML Template and display all employee records

            document.getElementById("test2").innerHTML = text;
        }
    });


}






