<html>
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script type="text/javascript" src="../js/callAPI.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.img-menu').click(function(e){
            $("#faded").css("display", "block");
            $("#menu").toggle("slow");
            e.stopPropagation(); // Prevent bubbling
        });
        $('#content').click(function(e){
            $("#menu").toggle("hide").promise().done(function(){
                $("#menu").css("display", "none");
                $("#faded").css("display", "none");
            });
        });
    });
    </script>
    
    </head>
    <body>
    <?php
        session_start();
        if (!isset($_SESSION['user'])){
            header('Location: ../index.php');
        }
    ?>
        <div id="content">
            <div id="faded"></div>
            <header>
                <img src="../img/hamburgerW.png" class="img-menu" title="menu_image" alt="image pour accèder au menu">
                <h1>Tableau de bord</h1>
            </header>
            <div class="date"> <script type="text/javascript" src="../js/time.js"></script> </div>

            <div class="tile-container">
                <a href="weight.php">
                    <div class="small-tile-weight">
                        <img src="../img/weightW.png" class="img-tile" 
                            title="icon-weight" alt="icone du poids">
                        <p> <span id="dashboard-weight" class="large-text" >90</span> <span class="small-text">Kg</span></p>
                        <p> <span id="dashboard-imc" class="large-text" >25</span> <span class="small-text">IMC</span></p>
                    </div>
                </a>
                <a href="walk.php">
                    <div class="small-tile-walk">
                        <img src="../img/footW.png" class="img-tile" 
                            title="icon-walk" alt="icone de l'activité">
                        <p> <span id="dashboard-steps" class="large-text" >852</span> <span class="small-text"> Pas</span></p>
                        <p> <span id="dashboard-steps-variation" class="small-text">+ 8.5 %</span></p>
                    </div>
                </a>
                <div style="clear:both"></div>

                <a href="sleep.php">
                    <div class="large-tile-sleep">
                        <img src="../img/nightW.png" class="img-tile" 
                            title="icon-sleep" alt="icone du sommeil">
                        <div class="large-tile-bottom">
                            <div class="left">
                                <p class="large-text"> <span id="dashboard-sleep">6h 52min</span> </p>
                                <p class="small-text"> Heures de sommeil </p>
                            </div>
                            <div class="right">
                                <p class="large-text"> +8% </p>
                                <p class="small-text"> Qualité de sommeil </p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </a>
            </div>
            <div id="menu">
                <div class="part-name">
                    <img src="../img/avatar.png" class="img-profil">
                    <div class="nom-prenom">
                        <h2>Prenom</h2>
                        <h3>Nom</h3>
                    </div>
                </div>
                <div class="part-profil">
                    <h4>Profil</h4>
                    <ul>
                        <li class="line-1">Date de naissance</li>
                        <li class="line-2">24 Août 1960</li>
                        <li class="line-1">Taille</li>
                        <li class="line-2">1m 80</li>
                    </ul>
                    <ul>
                        <li class="line-1">Sexe</li>
                        <li class="line-2">Homme</li>
                        <li class="line-1">Poids</li>
                        <li class="line-2">80Kg</li>
                    </ul>
                </div>
                <div class="part-parametre">
                    <h4>Paramètre</h4>
                    <div class="aide-deconnexion"><img src="../img/infoB.png" class="img-parametre" alt="Information" title="Information"><span class="span-aide-deco"> <a href="#">Aide</a> </span></div>
                    <div class="aide-deconnexion"><img src="../img/logoutB.png" class="img-parametre" alt="Déconnexion" title="Déconnexion" ><span class="span-aide-deco"> <a href="../deconnexion.php">Déconnexion</a> </span></div>
                </div>
            </div>  
        </div>     
        
        <script type="text/javascript">
            getData("weight");
            getData("steps");
            getData("sleep");

            function renderChart (location) {
                if(location == 'weight'){
                    $("#dashboard-weight").text(JSON.parse(localStorage[''+location+''])[0].weight);
                }
                else if(location == 'steps'){
                    var steps_today = JSON.parse(localStorage[''+location+''])[0].steps;
                    var steps_yesterday = JSON.parse(localStorage[''+location+''])[1].steps;
                    var steps_variation = ((steps_today-steps_yesterday)/steps_yesterday)*100;

                    $("#dashboard-steps").text(steps_today);
                    $("#dashboard-steps-variation").text((steps_variation >= 0 ? "+ " : "") + steps_variation.toFixed(1) + " %");
                }
                else if(location == 'sleep'){
                    data = JSON.parse(localStorage[''+location+''])[0].time;
                    data = Math.round(data*100)/100;
                    minutes = ((data%1)*60).toFixed(0);
                    heures = data-data%1;
                    $("#dashboard-sleep").text(heures+"h "+minutes+"min");
                }
            }
        </script>
    </body>
</html>