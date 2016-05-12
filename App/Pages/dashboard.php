<html>
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
        <script>
        $(function(){
            $(document.body).click(function(){
                isTheMenu = (jQuery.grep($(event.target).parents(), function( n, i ) {
                                return ( n.id == "menu");
                            }).length != 0);

                isTheMenuContext = ($(event.target).parents()['context'].id == 'menu');

                if (!isTheMenu && !isTheMenuContext && $('#menu').css('display') != 'none') {
                    $("#menu").toggle("hide").promise().done(function(){
                        $("#faded").css("display", "none");
                    });
                }
                else if($('#menu').css('display') == 'none' && event.target.className == 'img-menu'){
                    $("#faded").css("display","block");
                    $("#menu").toggle("slow");
                }
            });
        });
        </script>
    
    </head>
    <body>
    <?php
        session_start();
        if (!isset($_SESSION['user']))
            header('Location: ../index.php');
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
                        <img src="../img/weightW.png" class="img-tile" title="icon-weight" alt="icone du poids">
                        <p> <span id="dashboard-weight" class="large-text" >Chargement...</span> <span class="small-text">Kg</span></p>
                        <p> <span id="dashboard-imc" class="large-text" >Chargement...</span> <span class="small-text">IMC</span></p>
                    </div>
                </a>
                <a href="walk.php">
                    <div class="small-tile-walk">
                        <img src="../img/footW.png" class="img-tile" title="icon-walk" alt="icone de l'activité">
                        <p> <span id="dashboard-steps" class="large-text" >Chargement...</span> <span class="small-text"> Pas</span></p>
                        <p> <span id="dashboard-steps-variation" class="small-text">Chargement...</span></p>
                    </div>
                </a>
                <div style="clear:both"></div>

                <a href="sleep.php">
                    <div class="large-tile-sleep">
                        <img src="../img/nightW.png" class="img-tile" title="icon-sleep" alt="icone du sommeil">
                        <div class="large-tile-bottom">
                            <div class="left">
                                <p class="large-text"> <span id="dashboard-sleep">Chargement...</span> </p>
                                <p class="small-text"> Heures de sommeil </p>
                            </div>
                            <div class="right">
                                <p class="large-text"> <span id="dashboard-sleep-quality">Chargement...</span> </p>
                                <p class="small-text"> Qualité de sommeil </p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </a>

                <div id="records">
                    <h1 class="title">Records</h1>
                    <div class="blocValue">
                        <div class="blockRecord-footValue">
                            <p class="catTitle walkC">Pas</p>
                            <p class="date"> <span id="dashboard-footValue">Chargement...</span></p>
                            <p class="date"> <span id="dashboard-footDate">Chargement...</span></p>
                        </div>
                        <div class="blockRecord-kmValue">
                            <p class="catTitle walkC">Distance</p>
                            <p class="date"> <span id="dashboard-kmValue">Chargement...</span></p>
                            <p class="date"> <span id="dashboard-kmDate">Chargement...</span></p>
                        </div>
                        <div id="lign"></div>
                        <div class="blockRecord-calValue">
                            <p class="catTitle weightC">Calories</p>
                            <p class="date"> <span id="dashboard-calValue">Chargement...</span></p>
                            <p class="date"> <span id="dashboard-calDate">Chargement...</span></p>
                        </div>
                        <div class="blockRecord-floorValue">
                            <p class="catTitle walkC">Étages</p>
                            <p class="date"> <span id="dashboard-floorValue">Chargement...</span></p>
                            <p class="date"> <span id="dashboard-floorDate">Chargement...</span></p>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
            <div id="menu">
                <div class="part-name">
                    <img src="../img/avatar.png" class="img-profil" alt="Avatar" title="Avatar">
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
                    <div class="aide-deconnexion"><img src="../img/infoB.png" class="img-parametre" alt="Information" title="Information"><span class="span-aide-deco"> <a href="help.php">Aide</a> </span></div>
                    <div class="aide-deconnexion"><img src="../img/logoutB.png" class="img-parametre" alt="Déconnexion" title="Déconnexion" ><span class="span-aide-deco"> <a href="../deconnexion.php">Déconnexion</a> </span></div>
                </div>
            </div>  
        </div>     
        
        <script type="text/javascript">
            getData("weight");
            getData("steps");
            getData("sleep");
            getData("imc");
            getData("sleep_quality");
            getData("records");

            function renderChart (location) {
                if(location == 'weight')
                    $("#dashboard-weight").text(JSON.parse(localStorage[''+location+''])[0].weight);
                else if(location == 'imc')
                    $("#dashboard-imc").text(JSON.parse(localStorage[''+location+''])[0].imc);
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
                else if(location == 'sleep_quality'){
                    var quality = JSON.parse(localStorage[''+location+'']).sleep_quality;
                    $("#dashboard-sleep-quality").text((quality >= 0 ? "+ " : "") + quality + " %");
                }
                else if(location == 'records'){
                    var step_record = JSON.parse(localStorage[''+location+''])[5];
                    var distance_record = JSON.parse(localStorage[''+location+''])[6];
                    var calories_record = JSON.parse(localStorage[''+location+''])[4];
                    var floor_record = JSON.parse(localStorage[''+location+''])[7];
                    
                    $("#dashboard-footValue").text(step_record.record);
                    if(step_record.nbr_record == 1)
                        $("#dashboard-footDate").text("le "+step_record.date);
                    else
                        $("#dashboard-footDate").text(step_record.nbr_record+ " fois");

                    $("#dashboard-kmValue").text(distance_record.record+" Km");
                    if(distance_record.nbr_record == 1)
                        $("#dashboard-kmDate").text("le "+distance_record.date);
                    else
                        $("#dashboard-kmDate").text(distance_record.nbr_record+ " fois");

                    $("#dashboard-calValue").text(calories_record.record+" Kj");
                    if(calories_record.nbr_record == 1)
                        $("#dashboard-calDate").text("le "+calories_record.date);
                    else
                        $("#dashboard-calDate").text(calories_record.nbr_record+ " fois");

                    $("#dashboard-floorValue").text(floor_record.record);
                    if(floor_record.nbr_record == 1)
                        $("#dashboard-floorDate").text("le "+floor_record.date);
                    else
                        $("#dashboard-floorDate").text(floor_record.nbr_record+ " fois");
                }
            }
        </script>
    </body>
</html>