function selequipos() {

    $.ajax({
        type: "GET",
        url: '../../controlador/selequipos.php',
        success: function (response) {
            console.log(response);

            response = $.parseJSON(response);

            let num = document.querySelector('#numPlay');



            let x = num.valueAsNumber;

            console.log(x)

            let text = "";




            for (let i = 0; i < x; i++) {
                    var team = 'team'+i;
                    console.log(team);
                    

               text += '<select class="form-select mb-3" name="'+ team +'" aria-label="Default select example" required>';
                console.log(text);
                if (response.length) {
                    $.each(response, function (key, value) {

                        
                    text += '<option value="'+ value.idEquipo +'">'+  value.nEquipo +"("+ value.nDeporte + ")"  +'</option>';

                       

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






