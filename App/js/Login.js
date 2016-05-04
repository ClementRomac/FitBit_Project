
$(document).ready(function(){
    $("#submit").click(function(e){
        console.log("ebuft")
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
                    // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                    document.location.href="Pages/Dashboard.html"
                }
                else{
                    // Le membre n'a pas été connecté. (data vaut ici "failed")
                    $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }
            }
        );

    });

});
