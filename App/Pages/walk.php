<html>
    <head>
        <title>FitiBit</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="../js/highcharts.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user']))
        header('Location: ../index.php');
    ?>
        <div class="chart-page-container">
            <header class="header-chart walkB">
                <a href="dashboard.php"><img src="../img/backW.png" class="img-back" alt="Retour" title="Retour"></a>
                <h1>Activité</h1>
                <img src="../img/footW.png" class="img-moon" alt="Activité" title="Activité">
            </header>

            <div class="conteneur">

                <h2 class="walkC"> Aujourd'hui </h2>

                    <p>Nombre de pas : <span class="space"></span> <span id="steps_value">Chargement...</span></p>
                    <p>Évolution (hier) : <span class="space"></span> <span id="steps_variation">Chargement...</span></p>

                <h2 class="walkC">Distance / Pas</h2>

                    <div>
                        <button id ="1" class="button-walk active-walk" onclick="changeWalkLocation('walk', 1)">Jours</button>
                        <button id ="2" class="button-walk" onclick="changeWalkLocation('walk/week', 2)">Semaines</button>
                        <button id ="3" class="button-walk" onclick="changeWalkLocation('walk/month', 3)">Mois</button>
                    </div>
                    <div id="container_walk" style="min-width: 310px; height: 400px; margin: 0 auto">Chargement...</div>
                    
                <h2 class="walkC">Activité</h2>

                    <div>
                        <button id ="4" class="button-activity active-activity" onclick="changeActivityLocation('activity', 4)">Jours</button>
                        <button id ="5" class="button-activity" onclick="changeActivityLocation('activity/week', 5)">Semaines</button>
                        <button id ="6" class="button-activity" onclick="changeActivityLocation('activity/month', 6)">Mois</button>
                    </div>
                    <div id="container_activity" style="min-width: 310px; height: 400px; margin: 0 auto">Chargement...</div>
            </div>
        </div>
        <script type="text/javascript">
        var walk = {'steps' : '', 'distance' : ''};
        var location_activity = "";
        changeWalkLocation('walk', 1);
        changeActivityLocation('activity', 4);
        setHeaderInfos();

        function changeWalkLocation(newLocation, id){
            $("#container_walk").text("Chargement...");
            $('button').removeClass("active-walk");
            $('#'+id).addClass("active-walk");
            if(newLocation == 'walk'){
                getData('steps');
                getData('distance');
            }
            else if(newLocation == 'walk/week'){
                getData('steps/week');
                getData('distance/week');
            }
            else if(newLocation == 'walk/month'){
                getData('steps/month');
                getData('distance/month');
            }
        }

        function changeActivityLocation(newLocation, id){
            $("#container_activity").text("Chargement...");
            $('button').removeClass("active-activity");
            $('#'+id).addClass("active-activity");
            getData(newLocation)
            location_activity = newLocation;
        }

        function renderChart(location) {
            if(location == "steps" || location == "steps/week" || location == "steps/month")
                walk['steps'] = location;
            else if(location == "distance" || location == "distance/week" || location == "distance/month"){
                walk['distance'] = location;
                renderWalk(walk, "container_walk");
            }
            else if(location == "activity" || location == "activity/week" || location == "activity/month" )
                renderActivity(location, "container_activity");
        }

        function setHeaderInfos(){
            var steps_today = JSON.parse(localStorage['steps'])[0].steps;
            var steps_yesterday = JSON.parse(localStorage['steps'])[1].steps;
            var steps_variation = ((steps_today-steps_yesterday)/steps_yesterday)*100;

            $("#steps_value").text(steps_today);
            $("#steps_variation").text((steps_variation >= 0 ? "+ " : "") + steps_variation.toFixed(1) + " %");
        }

        $("#container_walk").on('click', function(e){
            fullScreenChart(walk, e);
        });

        $("#container_activity").on('click', function(e){
            fullScreenChart(location_activity, e);
        });

        
        </script>
    </body>
</html>