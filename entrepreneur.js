$(document).ready(function() {
    $('select.restau').change(function(){
        $.ajax({
                type: 'GET',
                url: 'get_restaurant.php',
                data: {idrestau: $('select.restau').val()},
                dataType: 'json',
                success: function(json) {
                    document.forms["modification_restaurant"].elements["descriptionmodif"].value=json.description;
                    var x = "utilisateur";
                    var y = x.concat(json.idrestaurateur);
                    document.getElementById(y).selected = 'selected';
                    document.forms["modification_restaurant"].elements["specialite"].value=json.specialite;

                    

                    

                }
         });
    });
});