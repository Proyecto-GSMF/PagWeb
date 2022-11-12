function tablaeditarE() {

    $.ajax({
        type: "GET",
        url: '../../controlador/getEqEv.php',
        success: function (response) {
            console.log(response);

            response = $.parseJSON(response);


            let id = document.getElementById("id").value;

            window.location.href = 'editarevento.php?id='+id;

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






