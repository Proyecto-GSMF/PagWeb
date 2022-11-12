function tablaeditarEq() {

    $.ajax({
        type: "GET",
        url: '../../controlador/getPlEq.php',
        success: function (response) {
            

            response = $.parseJSON(response);
            console.log(response);

            let id = document.getElementById("id").value;

            console.log(id)


            window.location.href = 'editarequipo.php?id='+id;

            console.log(id)




            if (response.length) {
                $.each(response, function (key, value) {


                });

            } else {

            }



            // Insert the HTML Template and display all employee records

            
        }
    });


}






