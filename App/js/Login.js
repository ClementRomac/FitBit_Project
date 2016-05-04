    $(document).ready(function(){

        $("#submit").click(function(){

            $.post(
                'Connexion.php',
                {
                    login : $("#username").val(),
                    password : $("#password").val()
                },

                function(data){ // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard
                    if(data == 'Connexion réussie'){
                        // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                        $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                    }
                    else{
                        // Le membre n'a pas été connecté. (data vaut ici "failed")

                        $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                    }
                },

                'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
            );

        });

    });
