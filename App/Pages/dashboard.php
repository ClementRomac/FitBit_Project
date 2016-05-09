<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/dashboard.css">
        <script   src="../js/zepto.min.js"></script> 
        <script type="text/javascript" src="../js/callAPI.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js">        </script>
    <script>
    $(document).ready(function(){
        $(".img-menu").click(function(){
            $("#menu").toggle("slow");
        });
    });
    </script>
    
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>
        <div id="header">
            <img src="../maquettes/sprite/line.png" class="img-menu">
            <h1>Tableau de bord</h1>
        </div>
        <div class="date"> <script type="text/javascript" src="../js/time.js"></script> </div>
        <div id="small-tile">
            <a href="weight.php">
                <div class="squarre-1"><img src="../maquettes/sprite/icon.png" class="img-squarre">
                    <div class="text-1"> <span id="dashboard-weight">90</span> Kg </div>
                    <div class="text-1-2"> Poids </div>
                </div>
            </a>
            <a href="walk.php">
                <div class="squarre-2"><img src="../maquettes/sprite/footsteps-silhouette-variant.png" class="img-squarre">
                    <div class="text-2"> <span id="dashboard-steps">852</span> Pas </div>
                    <div class="text-2-2"> <span id="dashboard-steps-variation">+ 8.5 %</span> </div>
                </div>
            </a>
        </div>
        <a href="Sleep.php">
            <div id="large-tile">
                <div class="rectangle"><img src="../maquettes/sprite/night.png" class="img-rectangle">
                <div class="text-3"> Sommeil </div>
                <div class="text-3-2"> <span id="dashboard-sleep">852</span> </div>  
                <div class="text-3-3"> 8.5/10 </div>
                </div>
            </div>
        </a>
        
        <div id="menu">
            <div class="part-name">
                <img src="../maquettes/sprite/businessman.png" class="img-profil">
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
                <div class="aide-deconnexion"><img src="../maquettes/sprite/information-button.png" class="img-parametre"><span class="span-aide-deco"> Aide </span></div>
                <div class="aide-deconnexion"><img src="../maquettes/sprite/logout-sign.png" class="img-parametre" ><span class="span-aide-deco"> Déconnexion </span></div>
                <div class="aide-deconnexion"><img src="../maquettes/sprite/logout-sign.png" class="img-parametre"><span class="span-aide-deco"> Retour </span></div>
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
                    $("#dashboard-sleep").text(JSON.parse(localStorage[''+location+''])[0].label);
                }
            }
        </script>
    </body>
</html>