function seljugind() {

    $.ajax({
        type: "GET",
        url: '../../controlador/seljugind.php',
        success: function (response) {
            console.log(response);

            response = $.parseJSON(response);

            let num = document.querySelector('#numPlay2');



            let x = num.valueAsNumber;

            console.log(x)

            let text = "";




            for (let i = 0; i < x; i++) {
                    var ind = 'ind'+i;
                    
                    

               text += '<select class="form-select mb-3" name="'+ ind +'" aria-label="Default select example" required>';
                console.log(text);
                if (response.length) {
                    $.each(response, function (key, value) {

                        
                    text += '<option value="'+ value.idJugador +'">'+  value.nJugador +" "+ value.aJugador   +'</option>';

                       

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






