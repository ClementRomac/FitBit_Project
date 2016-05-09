<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/pages/style.css">
        <script   src="../js/zepto.min.js"></script> 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
        <script type="text/javascript" src="../js/renderCharts.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.php');
    }
    ?>

        <header class="walkB">
            <a href="Dashboard.php"><img src="../img/back.png" class="img-back"></a>
            <h1>Activité</h1>
            <img src="../img/footsteps-silhouette-variantW.png" class="img-moon">
        </header>

        <div id="conteneur">

            <h2 class="walkC"> Aujourd'hui </h2>

                <p>Dormir pendant : <span class="space"></span> 6h 52min</p>
                <p>Qualité de sommeil : <span class="space"></span> Bon | 8.5/10</p>

            <h2 class="walkC">Distance / Pas</h2>

                <div>
                    <button id ="1" class="button-walk active-walk" onclick="changeWalkLocation('walk', 1)">Jours</button>
                    <button id ="2" class="button-walk" onclick="changeWalkLocation('walk/week', 2)">Semaines</button>
                    <button id ="3" class="button-walk" onclick="changeWalkLocation('walk/month', 3)">Mois</button>
                </div>
                <div id="container_walk" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                
            <h2 class="walkC">Activité</h2>

                <div>
                    <button id ="4" class="button-activity active-activity" onclick="changeActivityLocation('activity', 4)">Jours</button>
                    <button id ="5" class="button-activity" onclick="changeActivityLocation('activity/week', 5)">Semaines</button>
                    <button id ="6" class="button-activity" onclick="changeActivityLocation('activity/month', 6)">Mois</button>
                </div>
                <div id="container_activity" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
        <script type="text/javascript">
        var walk = {'steps' : '', 'distance' : ''};
        var location_activity = "";
        changeWalkLocation('walk', 1);
        
        changeActivityLocation('activity', 4);

        function changeWalkLocation(newLocation, id){
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

            $('button').removeClass("active-walk");
            $('#'+id).addClass("active-walk")
        }

        function changeActivityLocation(newLocation, id){
            getData(newLocation)
            $('button').removeClass("active-activity");
            $('#'+id).addClass("active-activity");
            location_activity = newLocation;
        }

        function renderChart(location) {
            if(location == "steps" || location == "steps/week" || location == "steps/month"){
                walk['steps'] = location;
            }
            else if(location == "distance" || location == "distance/week" || location == "distance/month"){
                walk['distance'] = location;
                renderWalk(walk, "container_walk");
            }
            else if(location == "activity" || location == "activity/week" || location == "activity/month" ){
                renderActivity(location, "container_activity");
            }
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