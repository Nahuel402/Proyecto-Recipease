$(document).ready(function() {

        $('#btn-search').click(function (){

            const Nombre = $('#input-search').val();
            const ID = $('ID').val();
            console.log(Nombre);

            $.ajax({
                url : 'ajaxData.php',
                type : "POST",
                async : true,
                data: {
                        nombre : Nombre,
                        id : ID
                    },
                beforeSend: function(){

                },
                success: function(response)
                {
                    if (response == "NoData") {
                        const messageR = "No hay recetas llamadas así.";
                        $('#Indicación').value(false);
                    }else{               
                        const recetas = JSON.parseJSON(response);
                        console.log(recetas);
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    
    
});