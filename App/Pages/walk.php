<html>
    <head>
        <title>FitiBit</title></colspan="2"d >
        <meta charset="utf-8"/>
        <link rel="stylesheet" media="screen" type="text/css" href="../css/Pages/style.css"><script   src="../js/zepto.min.js"></script> 
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="../js/callAPI.js"></script>
    </head>
    <body>
    <?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: ../index.html');
    }
    ?>

        <header class="walkB">
            <a href="Dashboard.php"><img src="../maquettes/sprite/back.png" class="img-back"></a>
            <h1>Activité</h1>
            <img src="../maquettes/sprite/footsteps-silhouette-variantW.png" class="img-moon">
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
                <a href="test.html"><div id="container_walk" style="min-width: 310px; height: 400px; margin: 0 auto"></div></a>
                
            <h2 class="walkC">Activité</h2>

                <div>
                    <button id ="4" class="button-activity active-activity" onclick="changeActivityLocation('activity', 4)">Jours</button>
                    <button id ="5" class="button-activity" onclick="changeActivityLocation('activity/week', 5)">Semaines</button>
                    <button id ="6" class="button-activity" onclick="changeActivityLocation('activity/month', 6)">Mois</button>
                </div>
                <a href="test.html"><div id="container_activity" style="min-width: 310px; height: 400px; margin: 0 auto"></div></a>
        </div>
        <script type="text/javascript">
        var walk = {'steps' : '', 'distance' : ''};
        changeWalkLocation('walk', 1);
        //console.log(walk['steps']);

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

        function renderChart(location) {
            if(location == "steps" || location == "steps/week" || location == "steps/month"){
                walk['steps'] = location;
            }
            else if(location == "distance" || location == "distance/week" || location == "distance/month"){
                walk['distance'] = location;
                renderWalk(walk);
            }
        }

        function renderWalk(walk_array){
            var steps = JSON.parse(localStorage[''+walk_array['steps']+'']);
            var steps_length = Object.keys(steps).length - 1;
            var distance = JSON.parse(localStorage[''+walk_array['distance']+'']);
            var distance_length = Object.keys(distance).length - 1;

            var myCategories = [];
            for (var i = 0; i <= steps_length; i++) {
                myCategories[i] = steps[''+steps_length-i+''].date;
            };
            
            var stepsData = [];
            for (var i = 0; i <= steps_length; i++) {
                stepsData[i] = steps[''+steps_length-i+''].steps;
            };

            var distanceData = [];
            for (var i = 0; i <= distance_length; i++) {
                distanceData[i] = distance[''+distance_length-i+''].distance;
            };

            new Highcharts.Chart({
                chart: {
                    renderTo: 'container_walk'
                },
                title: {
                    text: 'Nombre de pas / Distance parcouru'
                },
                xAxis: [{
                    categories: myCategories,
                crosshair: true
                }],
                yAxis: [{ // Primary yAxis
                    labels: {
                        format: '{value}',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Nombre de pas',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }, { // Secondary yAxis
                    title: {
                        text: 'Distance parcouru',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    labels: {
                        format: '{value} Km',
                        style: {
                            color: Highcharts.getOptions().colors[0]
                        }
                    },
                    opposite: true
                }],
                tooltip: {
                    shared: true
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    x: 120,
                    verticalAlign: 'top',
                    y: 100,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                },
                series: [{
                    name: 'Distance parcouru',
                    type: 'column',
                    yAxis: 1,
                    data: distanceData,
                    tooltip: {
                        valueSuffix: ' Km'
                    },

                }, {
                    name: 'Nombre de pas',
                    type: 'spline',
                    data: stepsData
                }]
            });
        }
        </script>
    </body>
</html>