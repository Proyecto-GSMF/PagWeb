$(function() {
    $('#id').change(function(e) {

   

            var id = document.getElementById("id").value;

            console.log(id)

            window.location.href = 'actualizarpartido.php?id='+id;

            console.log(id)
    });


});

$(function() {
    $('#idEq').change(function(e) {

   

            var id = document.getElementById("id").value;

            console.log(id)

            var eq = document.getElementById("idEq").value;

            window.location.href = 'actualizarpartido.php?id='+id+'&eq='+eq;

            console.log(id)
    });


});


