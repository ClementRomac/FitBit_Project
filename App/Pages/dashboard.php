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
            $("#menu").toggle("slow");
            $("#content").css("background-color", "black");
            $("#content").css("z-index", "3");
            e.stopPropagation(); // Prevent bubbling
        });
        $('#content').click(function(e){
            $("#menu").toggle("hide");
            $("#menu").css("display", "none");
            $("#content").css("background-color", "transparent");
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
        <header>
            <img src="../img/line.png" class="img-menu" title="menu_image" alt="image pour accèder au menu">
            <h1>Tableau de bord</h1>
        </header>
        <div class="date"> <script type="text/javascript" src="../js/time.js"></script> </div>

        <a href="weight.php">
            <div class="small-tile-weight">
                <img src="../img/icon.png" class="img-squarre" title="icon-weight" alt="icone du poids">
                <div class="text-1"> <span id="dashboard-weight">90</span> Kg</div>
                <div class="text-1-2"> Poids </div>
            </div>
        </a>
        <a href="walk.php">
            <div class="small-tile-walk">
                <img src="../img/footsteps-silhouette-variant.png" 
                    class="img-squarre"  title="icon-walk" alt="icone de l'activité">
                <div class="text-2"> <span id="dashboard-steps">852</span> Pas </div>
                <div class="text-2-2"> <span id="dashboard-steps-variation">+ 8.5 %</span> </div>
            </div>
        </a>

        <a href="sleep.php">
            <div id="large-tile">
                <div class="rectangle">
                    <img src="../img/night.png" class="img-rectangle" title="icon-sleep" alt="icone du sommeil">
                    <div class="text-3"> Sommeil </div>
                    <div class="text-3-2"> <span id="dashboard-sleep">852</span> </div>  
                    <div class="text-3-3"> 8.5/10 </div>
                </div>
            </div>
        </a>
    
    </div>     
        <div id="menu">
            <div class="part-name">
                <img src="../img/businessman.png" class="img-profil">
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
                <div class="aide-deconnexion"><img src="../img/information-button.png" class="img-parametre"><span class="span-aide-deco"> <a href="#">Aide</a> </span></div>
                <div class="aide-deconnexion"><img src="../img/logout-sign.png" class="img-parametre" ><span class="span-aide-deco"> <a href="../deconnexion.php">Déconnexion</a> </span></div>
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