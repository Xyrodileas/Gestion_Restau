$(document).ready(function() {
    $('select.restaurant').change(function(){
        $.ajax({
                type: 'POST',
                url: 'get_restaurant.php',
                data: {idrestau: $('select.restau').val()},
                dataType: 'json',
                success: function(json) {
                    document.forms["modification_restaurant"].elements["descriptionmodif"].value=json.idproprietaire;

                }
         });
    });
});