
$(document).ready(function(){
    $("#submit").click(function(e){
        e.preventDefault();
        $.post(
            'Connexion.php',
            {
                username : $("#username").val(),
                password : $("#password").val()
            },

            function(data){
                console.log(data + "feqda");
                if(data == 'ok'){
                    document.location.href="pages/dashboard.php"
                }
                else{
                    $("#resultat").html("<p class='erreur'>Erreur lors de la connexion...</p>");
                }
            }
        );

    });

});
